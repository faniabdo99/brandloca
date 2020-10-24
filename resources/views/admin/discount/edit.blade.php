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
                            <h5 class="card-header">Edit Discount : {{$TheDiscount->title}}</h5>
                            <div class="card-body">
                              <form action="{{route('admin.discount.postEdit' , $TheDiscount->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                      <label>Title</label>
                                      <input type="text" class="form-control" name="title" value="{{old('title') ?? $TheDiscount->title}}" placeholder="Enter Title Here" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Type</label>
                                      <select name="type" class="form-control" required>
                                          <option value="{{$TheDiscount->type}}">{{$TheDiscount->type}}</option>
                                          <option value="percent">Percent</option>
                                          <option value="fixed">Fixed</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Amount</label>
                                      <input type="number" class="form-control" name="amount"
                                          value="{{old('amount') ?? $TheDiscount->amount}}"
                                          placeholder="Enter a Number Here ..." required>
                                  </div>
                                  <div class="form-group">
                                      <label>Valid Until</label>
                                      <input type="date" class="form-control" name="valid_until"
                                          value="{{old('valid_until') ?? $TheDiscount->valid_until->format('Y-m-d')}}" required>
                                  </div>
                                  <button type="submit" class="btn btn-success btn-rounded">Submit</button>
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
</body>

</html>
