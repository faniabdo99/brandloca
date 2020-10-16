@include('admin.layout.header')
<body class="app">
    <div>
        @include('admin.layout.sidebar')
        <div class="page-container">
            @include('admin.layout.navbar')
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2>Add New Product</h2>
                                <div class="bgc-white p-20 bd">
                                    <h6 class="c-grey-900">Main Data</h6>
                                    <div class="mT-30">
                                        <form action="{{route('admin.products.postNew')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input hidden name="id" value={{$NextProductId}}>
                                            <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" class="form-control" name="title" value="{{old('title') ?? ''}}" placeholder="Enter Title Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug *</label>
                                                <input type="text" class="form-control" name="slug" value="{{old('slug') ?? ''}}" placeholder="Enter Slug Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Model Number *</label>
                                                <input type="text" class="form-control" name="model_number" value="{{old('model_number') ?? ''}}" placeholder="Enter Model Number Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Product Main Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                            <div class="form-group">
                                                <label>Fallback Description *</label>
                                                <textarea class="form-control" name="description" rows="6" placeholder="Enter Description Here">{{old('description') ?? ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Fallback Body *</label>
                                                <textarea class="form-control editor" name="body" rows="6" placeholder="Enter Description Here">{{old('body') ?? ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Main Category *</label>
                                                <select class="form-control" name="category_id" required>
                                                    @forelse ($AllCategories as $Single)
                                                    <option value="{{$Single->id}}">{{$Single->title}}</option>
                                                    @empty
                                                    <option>Please Add Categories to The System</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price" value="{{ old('price') ?? ''}}" placeholder="Please Enter The Item Price in L.E" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                        <option selected value="Available">Available</option>
                                                        <option value="SoldOut">Sold out</option>
                                                        <option value="Invisible">Invisible</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sizes</label>
                                                <select class="form-control" name="size" required>
                                                        <option value="mini_bb">Mini Baby (3m - 1y)</option>
                                                        <option value="bb">Baby (1-4 years)</option>
                                                        <option value="medium">Medium (5-9 years)</option>
                                                        <option value="adult">Adults (10-16 years)</option>
                                                        <option value="older">Older (16+ years)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Season</label>
                                                <select class="form-control" name="season" required>
                                                        <option value="summer">Summer</option>
                                                        <option value="winter">Winter</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="type" required>
                                                        <option value="pajama">Pajama</option>
                                                        <option value="tshirt">T-Shirts</option>
                                                        <option value="pants">Pants</option>
                                                        <option value="shoes">Shoes</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <select class="form-control" name="discount_id">
                                                        <option selected value="">No Discount</option>
                                                        @forelse($DiscountsList as $Discount)
                                                          <option value="{{$Discount->id}}">{{$Discount->title}} , {{$Discount->amount}} {{$Discount->type}}</option>
                                                        @empty
                                                        @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Gallery</label>
                                                <div id="drop-zone" class="dropzone"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="is_promoted" id="is_promoted"> <label for="is_promoted">Promote on Homepage ?</label>
                                            </div>
                                            <h6 class="c-grey-900 mT-40 mB-40">Advanced Data</h6>
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <input step="0.1" type="number" class="form-control" value="{{old('weight') ?? ''}}" name="weight" placeholder="Please Enter a Number in KG" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="number" class="form-control" value="{{old('height') ?? ''}}" name="height" placeholder="Please Enter a Number in CM">
                                            </div>
                                            <div class="form-group">
                                                <label>Width</label>
                                                <input type="number" class="form-control" value="{{old('width') ?? ''}}" name="width" placeholder="Please Enter a Number in CM">
                                            </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    @include('admin.layout.scripts')
    <script>
        //Auto Create Clean Slug...
        var SlugValue;
        $('input[name="title"]').keyup(function () {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-").toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });
        //Dropzone For Images
        var myDropzone = new Dropzone("div#drop-zone", {
             url: "{{route('admin.product.uploadGalleryImages')}}",
             paramName: "image",
             params: {'product_id':$('input[name="id"]').val()},
             acceptedFiles: 'image/*',
             maxFiles: 5,
             dictDefaultMessage: "Drag Images or Click to Upload",
     });
    </script>
</body>

</html>
