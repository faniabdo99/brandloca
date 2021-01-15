@include('admin.layout.header')
<body>
    <div class="dashboard-main-wrapper">
        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @include('admin.layout.errors')
                        <div class="card">
                            <h5 class="card-header">Edit: {{$Category->title}}</h5>
                            <div class="card-body">
                              <form action="{{route('admin.categories.postEdit' , $Category->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label>Fallback Title</label>
                                      <input type="text" class="form-control" name="title" value="{{$Category->title}}" placeholder="Enter Title Here">
                                  </div>
                                  <div class="form-group">
                                      <label>Category Image (UnChanged)</label>
                                      <input type="file" class="form-control" name="image">
                                  </div>
                                  <div class="form-group">
                                      <label>Fallback Description</label>
                                      <textarea class="form-control" name="description" rows="6" placeholder="Enter Description Here">{{$Category->description}}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-success btn-rounded">Edit</button>
                                </form>
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
        //Auto Create Clean Slug...
        var SlugValue;
        $('input[name="title"]').keyup(function() {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-").toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });
    </script>
</body>

</html>
