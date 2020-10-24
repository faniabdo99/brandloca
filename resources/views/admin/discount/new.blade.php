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
                            <h5 class="card-header">Create New Discount</h5>
                            <div class="card-body">
                              <form action="{{route('admin.discount.postNew')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label>Title</label>
                                      <input type="text" class="form-control" name="title" value="{{old('title') ?? ''}}" placeholder="Enter Title Here" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Type</label>
                                      <select name="type" class="form-control" required>
                                          <option value="percent">Percent</option>
                                          <option value="fixed">Fixed</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Amount</label>
                                      <input type="number" class="form-control" name="amount" value="{{old('amount') ?? ''}}" placeholder="Enter a Number Here ..." required>
                                  </div>
                                  <div class="form-group">
                                      <label>Valid Until</label>
                                      <input type="date" class="form-control" name="valid_until" value="{{old('valid_until') ?? ''}}" required>
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
        $('input[name="title"]').keyup(function() {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-").toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });
    </script>
</body>

</html>
