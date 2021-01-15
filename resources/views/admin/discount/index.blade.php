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
                          <h5 class="mb-0">Discounts ({{$Discounts->count()}})</h5>
                        </div>
                        <div class="card-body">
                          <a class="btn btn-success btn-rounded btn-xs" href="{{route('admin.discount.getNew')}}">Add New Discount</a>
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Active on # Products</th>
                                        <th>Valid Until</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Discounts as $Single)
                                    <tr>
                                        <td>{{$Single->title}}</td>
                                        <td>{{$Single->amount}} @if($Single->type == 'percent') % @else ‏L.E @endif</td>
                                        <td>{{$Single->ActiveOnProducts->count()}}</td>
                                        <td>{{$Single->valid_until->format('Y-m-d')}}</td>
                                        <td>
                                            <a href="{{route('admin.discount.getEdit' , $Single->id)}}" class="btn btn-brand btn-rounded">Edit</a>
                                            <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{ route('admin.discount.delete') }}" class="btn btn-danger btn-rounded delete-btn">Delete</a>
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
        $('.delete-btn').dblclick(function(){
            var Elem = $(this);
            var ItemId = $(this).attr('item-id');
            var ActionRoute = $(this).attr('action-route');
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');
            $.ajax({
                method : 'POST',
                url: ActionRoute ,
                data: {item_id : ItemId},
                success: function(response){
                    Elem.parent().parent().fadeOut('fast');
                    ShowNoto('noto-success' , response , 'Success');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    ShowNoto('noto-danger' , errorThrown , 'Error');
                    Elem.html('Delete');
                }
            });
        });
    </script>
</body>

</html>
