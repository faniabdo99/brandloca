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
                            <h5 class="card-header">Create New Article</h5>
                            <div class="card-body">
                                <form action="{{route('admin.blog.postNew')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{old('title') ?? ''}}" placeholder="Enter Title Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{old('slug') ?? ''}}" placeholder="Enter Slug Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description Here" rows="8" required>{{old('description' ?? '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" class="form-control" name="keywords" value="{{old('keywords') ?? ''}}" placeholder="Enter Keywords Here" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control editor" name="content" placeholder="Enter Content Here" rows="8">{{old('content' ?? '')}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-rounded">Submit</button>
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
        $('input[name="title"]').keyup(function () {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-")
        .toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });

    </script>
</body>

</html>
