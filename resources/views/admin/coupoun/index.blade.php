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
                          <h5 class="mb-0">Coupons ({{$Coupouns->count()}})</h5>
                        </div>
                        <div class="card-body">
                          <a class="btn btn-success btn-rounded btn-xs" href="{{route('admin.coupoun.getNew')}}">Add New Coupons</a>
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Coupoun Code</th>
                                        <th>Discount Amount</th>
                                        <th>Active on # Products</th>
                                        <th>Available Coupons Left</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Coupouns as $Single)
                                    <tr>
                                        <td>{{$Single->coupoun_code}}</td>
                                        <td>{{$Single->discount_amount}} @if($Single->discount_type == 'percent') % @else ‏€ @endif</td>
                                        <td>25</td>
                                        <td>@if($Single->amount == 0) Infinite @else {{$Single->amount}} @endif</td>
                                        <td>
                                            <a href="{{route('admin.coupoun.getEdit' , $Single->id)}}" class="btn btn-brand btn-rounded">Edit</a>
                                            <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{ route('admin.coupoun.delete') }}" class="btn btn-danger delete-btn btn-rounded">Delete</a>
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
