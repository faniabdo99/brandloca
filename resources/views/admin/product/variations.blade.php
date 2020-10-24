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
                            <h5 class="card-header">Availabe Variations</h5>
                            <div class="card-body">
                              <table class="table table-striped">
                                <thead>
                                  <th>Code</th>
                                  <th>Size</th>
                                  <th>Color</th>
                                  <th>Color Code</th>
                                  <th>Inventory</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                  @forelse ($CurrentVariations as $Variation)
                                    <tr>
                                      <td>{{$Variation->ref_code}}</td>
                                      <td>{{$Variation->size}}</td>
                                      <td>{{$Variation->color}}</td>
                                      <td>{{$Variation->color_code}}</td>
                                      <td>{{$Variation->inventory}}</td>
                                      <td>{{$Variation->status}}</td>
                                      <td><a class="btn btn-sm btn-danger btn-rounded" href="{{route('admin.products.variation.delete' , $Variation->id)}}">Delete</a></td>
                                    </tr>
                                  @empty

                                  @endforelse
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Add New Variation</h5>
                            <div class="card-body">
                                <form action="{{route('admin.products.postVariations' , $TheProduct->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" class="form-control" name="size" value="{{old('size') ?? ''}}" placeholder="Enter Size Here">
                                    </div>
                                    <div class="form-group">
                                        <label>Color *</label>
                                        <input type="text" class="form-control" name="color" value="{{old('color') ?? ''}}" placeholder="Enter Color Here">
                                    </div>
                                    <div class="form-group">
                                        <label>Color Code *</label>
                                        <input maxlength="7" type="text" class="form-control" name="color_code" value="{{old('color_code') ?? ''}}" placeholder="Enter Color Code Here">
                                    </div>
                                    <div class="form-group">
                                        <label>Count in Inventory</label>
                                        <input type="number" class="form-control" name="inventory" placeholder="Please Enter a Number" value="{{ old('inventory') ?? '0'}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option selected value="Available">Available</option>
                                            <option value="SoldOut">Sold out</option>
                                            <option value="Invisible">Invisible</option>
                                        </select>
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
