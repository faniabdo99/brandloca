@include('admin.layout.header')

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="mb-0">Users ({{$Users->count()}})</h5>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Active</th>
                                        <th>Code</th>
                                        <th>Country</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Users as $Single)
                                    <tr>
                                        <td>{{$Single->name}}</td>
                                        <td>{{$Single->email}}</td>
                                        <td>@if($Single->active) Active @else Not Active @endif</td>
                                        <td>{{$Single->code}}</td>
                                        <td>{{$Single->country}}</td>
                                        <td>
                                            <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{route('admin.user.toggleActive')}}" class="activate-btn btn btn-brand btn-rounded">@if($Single->confirmed) Deactivate @else Activate @endif</a>
                                            <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{ route('admin.user.delete') }}" class="delete-btn btn btn-danger btn-rounded">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    @include('admin.layout.scripts')
    <script>
        $('.delete-btn').dblclick(function() {
            var Elem = $(this);
            var ItemId = $(this).attr('item-id');
            var ActionRoute = $(this).attr('action-route');
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');
            $.ajax({
                method: 'POST',
                url: ActionRoute,
                data: {
                    item_id: ItemId
                },
                success: function(response) {
                    Elem.parent().parent().fadeOut('fast');
                    ShowNoto('noto-success', response, 'Success');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    ShowNoto('noto-danger', errorThrown, 'Error');
                    Elem.html('Delete');
                }
            });
        });

        $('.activate-btn').click(function() {
            var Elem = $(this);
            var ItemId = $(this).attr('item-id');
            var ActionRoute = $(this).attr('action-route');
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');
            $.ajax({
                method: 'POST',
                url: ActionRoute,
                data: {
                    item_id: ItemId
                },
                success: function(response) {
                    ShowNoto('noto-success', response.successMessage, 'Success');
                    Elem.html(response.btnMessage);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    ShowNoto('noto-danger', errorThrown, 'Error');
                    Elem.html('Activate');
                }
            });
        });
    </script>
</body>

</html>
