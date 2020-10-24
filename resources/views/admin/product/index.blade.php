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
                          <h5 class="mb-0">Products ({{$Products->count()}})</h5>
                        </div>
                        <div class="card-body">
                          <a class="btn btn-success btn-rounded btn-xs" href="{{route('admin.products.getNew')}}">Add New Product</a>
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Category</th>
                                  <th>Price</th>
                                  <th>Inventory</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse($Products as $Single)
                                  <tr>
                                    <td>{{$Single->title}}</td>
                                    <td>{{$Single->Category->title}}</td>
                                    <td>{{$Single->price}} L.E</td>
                                    <td>25</td>
                                    <td>
                                      <a class="btn btn-brand btn-sm btn-rounded" href="{{route('admin.products.getEdit' , $Single->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                      <a class="btn btn-success btn-sm btn-rounded" href="{{route('admin.products.variations' , $Single->id)}}"><i class="fas fa-edit"></i> Variations</a>
                                      <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{ route('admin.product.delete') }}" class="btn btn-danger btn-sm btn-rounded delete-btn"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                  </tr>
                                @empty
                                  <p>No Categories in The System Yet</p>
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
    <script type="text/javascript">
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
