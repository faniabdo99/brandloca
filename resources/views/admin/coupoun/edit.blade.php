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
                            <h5 class="card-header">Create New Category</h5>
                            <div class="card-body">
                              <form action="{{route('admin.coupoun.postEdit' , $TheCoupoun->id)}}" method="post">
                                  @csrf
                                  <div class="form-group">
                                      <label>Coupon Code</label>
                                      <input type="text" class="form-control" name="coupoun_code" value="{{old('coupoun_code') ?? $TheCoupoun->coupoun_code}}" placeholder="Enter Coupon Code Here" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Type</label>
                                      <select name="discount_type" class="form-control" required>
                                          <option value="{{$TheCoupoun->discount_type}}">{{$TheCoupoun->discount_type}}</option>
                                          <option value="percent">Percent</option>
                                          <option value="fixed">Fixed</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Amount</label>
                                      <input type="number" class="form-control" name="discount_amount"
                                          value="{{old('discount_amount') ?? $TheCoupoun->discount_amount}}"
                                          placeholder="Enter a Number Here ..." required>
                                  </div>
                                  <div class="form-group">
                                      <label>Availabe Coupons <small>0 Means Infinite</small></label>
                                      <input type="number" class="form-control" name="amount"
                                          value="{{old('amount') ?? $TheCoupoun->amount}}" required>
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
</body>

</html>
