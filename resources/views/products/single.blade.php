@include('layout.header')
<body>
    @include('layout.navbar')
    <!-- product section -->
    <section class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-pic-zoom">
                        <img class="product-big-img" src="{{$TheProduct->MainImage}}" alt="{{$TheProduct->title}}">
                    </div>
                    <div class="product-thumbs" tabindex="1">
                        <div class="product-thumbs-track ml-auto">
                            <div class="pt active" data-imgbigurl="{{$TheProduct->MainImage}}"><img src="{{$TheProduct->MainImage}}" alt="{{$TheProduct->title}}"></div>
                            @forelse($TheProduct->GalleryImages as $Image)
                                <div class="pt active" data-imgbigurl="{{$Image->ImagePath}}"><img src="{{$Image->ImagePath}}" alt="{{$TheProduct->title}}"></div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 product-details text-right">
                    <h2 class="p-title">{{$TheProduct->title}}</h2>
                    @if($TheProduct->HasDiscount()['HasDiscount'])
                        <h3 class="p-old-price">{{$TheProduct->price}} L.E</h3>
                        <h3 class="p-discount-price">{{$TheProduct->HasDiscount()['NewPrice']}} L.E مدة محدودة</h3>
                        @else
                        <h3 class="p-price">{{$TheProduct->price}} L.E</h3>
                        @endif
                        <h4 class="p-stock">{{$TheProduct->StatusValue}} | <a href="{{route('shop.category' , $TheProduct->Category->slug)}}">{{$TheProduct->Category->title}}</a></h4>
                        <div class="p-rating mb-5">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o fa-fade"></i>
                        </div>
                        <p class="font-weight-bold">الحجم</p>
                        <form action="javascript:;" id="product-cart-form" method="post">
                            <div class="fw-size-choose mb-5">
                                @forelse ($TheProduct->AvailableVariations()['sizes'] as $Size)
                                @php
                                  //Check if this size available
                                  $CheckSize = App\Product_Variation::where('product_id' , $TheProduct->id)->where('size' , $Size)->where('inventory' , '>' , 0)->where('status' ,'Available')->count();
                                @endphp
                                <div class="sc-item @if(!$CheckSize) disable @endif"  >
                                    <input type="radio" name="size" id="size-{{$Size}}" value="{{$Size}}"  @if(!$CheckSize) disabled title="تم بيع هذا المقاس بالكامل" @endif>
                                    <label for="size-{{$Size}}">{{$Size}}</label>
                                </div>
                                @empty
                                <p class="text-right">هذا المنتج غير متوفر للبيع حالياً</p>
                                @endforelse
                            </div>
                            <p class="font-weight-bold">اللون</p>
                            <div class="fw-size-choose mb-5">
                                @forelse ($TheProduct->AvailableVariations()['color_codes'] as $key => $Color)
                                @php
                                  //Check if this size available
                                  $CheckColor = App\Product_Variation::where('product_id' , $TheProduct->id)->where('color_code' , $Color)->where('inventory' , '>' , 0)->where('status' ,'Available')->count();
                                @endphp
                                <div class="sc-item @if(!$CheckColor) disable @endif">
                                    <input type="radio" name="color" id="color-{{$key}}" value="{{$Color}}"  @if(!$CheckColor) disabled title="تم بيع هذا اللون بالكامل" @endif>
                                    <label for="color-{{$key}}" style="background:{{$Color}};"></label>
                                </div>
                                @empty
                                <p class="text-right">هذا المنتج غير متوفر للبيع حالياً</p>
                                @endforelse
                            </div>
                            <p class="font-weight-bold">الكمية المطلوبة</p>
                            <div class="quantity">
                                <div class="pro-qty"><input name="qty" type="text" value="1"></div>
                            </div>
                            @auth
                            @if($TheProduct->AvailableVariations()['inventory'] > 0)
                                <button id="add-to-cart" type="submit" data-product="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}" data-action="{{route('cart.add')}}" class="d-inline-block site-btn"><i class="flaticon-bag"></i> اضف الى السلة</button>
                            @else
                              <p class="text-danger">تم البيع بالكامل</p>
                            @endif
                          @endauth
                          @guest
                            <p>يرجى <a href="{{route('login.get')}}">تسجيل الدخول</a> لاضافة المنتج الى سلة المشتريات</p>
                          @endguest
                          @auth
                            @if($TheProduct->LikedByUser())
                                <a href="javascript:;" id="product-add-to-wishlist-btn" data-action="{{route('favourite.toggle')}}" data-id="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}"
                                  class="site-btn sb-white liked add-to-wishlist-btn" title="ازالة من المفضلة"><i class="flaticon-heart"></i> أحببته</a>
                                @else
                                <a href="javascript:;" id="product-add-to-wishlist-btn" data-action="{{route('favourite.toggle')}}" data-id="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}" class="site-btn sb-white add-to-wishlist-btn"><i
                                      class="flaticon-heart"></i> اضافة الى المفضلة</a>
                                @endif
                              @endauth
                        </form>
                        <div id="accordion" class="accordion-area">
                            <div class="panel">
                                <div class="panel-header" id="headingOne">
                                    <button class="panel-link active text-center" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">معلومات المنتج</button>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="panel-body">
                                        {!! $TheProduct->body !!}
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingTwo">
                                    <button class="panel-link text-center" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">معلومات الدفع</button>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="panel-body">
                                        <img src="{{url('public/img')}}/cards.png" alt="">
                                        <p>نقبل الدفع بجميع الأدوات السابقة</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingThree">
                                    <button class="panel-link text-center" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">الشحن و الاسترجاع</button>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="panel-body">
                                        <h4>يمكن الاسترجاع خلال 7 أيام من البيع</h4>
                                        <p>دفع عند الإسترجاع</p>
                                        <p>لا يقبل استرجاع المنتجات التالفة أو بحالتها غير الأصلية , تنطبق <a href="#">شروط الإسترجاع</a> على جميع المنتجات</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingThree">
                                    <button class="panel-link text-center" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">شارك المنتج</button>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="panel-body">
                                        <div class="social-sharing text-center">
                                            <a href=""><i class="fa fa-google-plus"></i></a>
                                            <a href=""><i class="fa fa-pinterest"></i></a>
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-header" id="headingFive">
                                    <button class="panel-link text-center" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse4">المراجعات</button>
                                </div>
                                <div id="collapse5" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                    <div class="panel-body reviews-panel-body">
                                        <div class="reviews-overall-text row mb-5">
                                            <div class="col-6">
                                                <ul class="detailed-reviws-list text-left mb-0">
                                                    <li><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',5)->count()}})</span></li>
                                                    <li><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',4)->count()}})</span></li>
                                                    <li><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',3)->count()}})</span></li>
                                                    <li><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',2)->count()}})</span></li>
                                                    <li><i class="fas fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',1)->count()}})</span></li>
                                                </ul>
                                            </div>
                                            <div class="col-6 star-and-number">
                                                <i class="fas fa-star"></i>
                                                <p class="mb-0">5 / {{$TheProduct->Rate}}</p>
                                            </div>
                                        </div>
                                        <ul class="reviews-list mb-5">
                                            @forelse ($TheProduct->Reviews as $Review)
                                            <li class="d-flex">
                                                <span class="review-image">
                                                    <img src="{{$Review->User->ProfileImage}}" alt="{{$Review->User->name}}">
                                                </span>
                                                <span class="review-text">
                                                    <b>{{$Review->User->name}}</b>
                                                    <ul>
                                                        @for ($i = 0; $i < $Review->rate ; $i++)
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                        @endfor
                                                        @for ($i = 0; $i < (5-$Review->rate) ; $i++)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                    <p>{{$Review->review}}</p>
                                                </span>
                                            </li>
                                            @empty
                                                
                                            @endforelse
                                          
                                        </ul>
                                        @auth
                                            @if(auth()->user()->Bought($TheProduct->id))
                                                <form class="review-form mb-5" action="{{route('review.post')}}" method="post">
                                                    @csrf
                                                    <input hidden name="product_id" value="{{$TheProduct->id}}">
                                                    <label for="review">أخبرنا برأيك عن : {{$TheProduct->title}}</label>
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rate" value="5" required />
                                                        <label for="star5" title="5 نجوم"></label>
                                                        <input type="radio" id="star4" name="rate" value="4" required />
                                                        <label for="star4" title="4 نجوم"></label>
                                                        <input type="radio" id="star3" name="rate" value="3" required />
                                                        <label for="star3" title="3 نجوم"></label>
                                                        <input type="radio" id="star2" name="rate" value="2" required />
                                                        <label for="star2" title="2 نجوم"></label>
                                                        <input type="radio" id="star1" name="rate" value="1" required />
                                                        <label for="star1" title="1 نجمة"></label>
                                                    </div>
                                                    <textarea class="mb-2" name="review" id="review" placeholder="ما هو رأيك بهذا المنتج؟" rows="6" required></textarea>
                                                    <button class="site-btn" type="submit">نشر</button>
                                                </form>
                                            @else
                                                <p>يمكنك تقييم المنتج بعد أن تقوم بعملية الشراء</p>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->
    <!-- RELATED PRODUCTS section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title">
                <h2>منتجات مشابهة</h2>
            </div>
            <div class="product-slider owl-carousel">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{url('public/img')}}/product/1.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>150 L.E</h6>
                        <p>بيجاما تصميم فيل</p>
                    </div>
                </div>
                <div class="product-item">
                    <div class="pi-pic">
                        <div class="tag-new">جديد</div>
                        <img src="{{url('public/img')}}/product/2.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>150 L.E</h6>
                        <p>بيجاما تصميم قطة</p>
                    </div>
                </div>
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{url('public/img')}}/product/3.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>150 L.E</h6>
                        <p>بيجاما تصميم فيل</p>
                    </div>
                </div>
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{url('public/img')}}/product/4.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>150 L.E</h6>
                        <p>بيجاما تصميم فيل</p>
                    </div>
                </div>
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{url('public/img')}}/product/6.jpg" alt="">
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>150 L.E</h6>
                        <p>بيجاما تصميم فيل</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- RELATED PRODUCTS section end -->
    @include('layout.footer')
    @include('layout.scripts')
    @include('layout.errors')
</body>

</html>
