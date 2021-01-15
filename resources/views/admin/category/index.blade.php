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
                          <h5 class="mb-0">Categories ({{$Categories->count()}})</h5>
                        </div>
                        <div class="card-body">
                          <a class="btn btn-success btn-rounded btn-xs" href="{{route('admin.categories.getNew')}}">Add New Category</a>
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Slug</th>
                                  <th>Description</th>
                                  <th>Products</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse($Categories as $Single)
                                  <tr>
                                    <td>{{$Single->title}}</td>
                                    <td>{{$Single->slug}}</td>
                                    <td>{{$Single->ShortDescription}}</td>
                                    <td>25</td>
                                    <td>
                                      <a class="btn btn-brand btn-sm btn-rounded" href="{{route('admin.categories.getEdit' , $Single->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                      <a href="javascript:;" item-id="{{$Single->id}}" action-route="{{ route('admin.category.delete') }}" class="btn btn-danger btn-sm btn-rounded delete-btn"><i class="fas fa-trash"></i> Delete</a>
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
