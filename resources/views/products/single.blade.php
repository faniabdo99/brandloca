@include('layout.header' , ['PageTitle' => $TheProduct->title, 'PageDescription' => $TheProduct->description])
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
                    <h1 class="p-title">{{$TheProduct->title}}</h1>
                    @if($TheProduct->HasDiscount()['HasDiscount'])
                        <h3 class="p-old-price">{{$TheProduct->price}} L.E</h3>
                        <h3 class="p-discount-price">{{$TheProduct->HasDiscount()['NewPrice']}} L.E مدة محدودة</h3>
                        @else
                        <h3 class="p-price">{{$TheProduct->price}} L.E</h3>
                        @endif
                        <h4 class="p-stock">{{$TheProduct->StatusValue}} | <a href="{{route('shop.category' , $TheProduct->Category->slug)}}">{{$TheProduct->Category->title}}</a></h4>
                        <p class="font-weight-bold">اختر المقاس المطلوب</p>
                        <form action="javascript:;" id="product-cart-form" method="post">
                            <div class="mb-5">
                                <select id="product-size-selector" data-action="{{route('cart.checkColors',$TheProduct->id)}}" name="size">
                                    <option value="">اضغط هنا لاختيار المقاس المطلوب</option>
                                    @forelse ($TheProduct->AvailableVariations()['sizes'] as $Size)
                                    @php
                                    //Check if this size available
                                    $CheckSize = App\Product_Variation::where('product_id' , $TheProduct->id)->where('size' , $Size)->where('inventory' , '>' , 0)->where('status' ,'Available')->count();
                                    @endphp
                                    <option value="{{$Size}}">{{$Size}} سنة</option>
                                    @empty
                                    <p class="text-right">هذا المنتج غير متوفر للبيع حالياً</p>
                                    @endforelse
                                </select>
                            </div>
                            <p class="font-weight-bold" id="choose-color-text">يرجى اختيار المقاس أولاً لتحديد اللون</p>
                            <div id="choose-product-color" class="fw-size-choose mb-5 d-none"></div>
                            <p class="font-weight-bold">الكمية المطلوبة</p>
                            <div class="quantity">
                                <div class="pro-qty"><input name="qty" type="text" value="1"></div>
                            </div>
                            @auth
                            @if($TheProduct->AvailableVariations()['inventory'] > 0)
                                <button id="add-to-cart" type="submit" data-product="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}" data-action="{{route('cart.add')}}" class="d-inline-block site-btn"><i class="flaticon-bag"></i> اضف الى السلة</button>
                                <a class="@if(userCart()->count() < 1) d-none @endif site-btn sb-white" id="go-to-cart-button" href="{{route('order.cart')}}"><i class="fas fa-shopping-cart"></i> اكمال عملية الشراء</a>
                            @else
                              <p class="text-danger">تم البيع بالكامل</p>
                            @endif
                          @endauth
                          @guest
                            <p>يرجى <a href="{{route('login.get')}}">تسجيل الدخول</a> لاضافة المنتج الى سلة المشتريات</p>
                          @endguest
                          @auth
                          <div class="mt-4">
                            @if($TheProduct->LikedByUser())
                                <a href="javascript:;" id="product-add-to-wishlist-btn" data-action="{{route('favourite.toggle')}}" data-id="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}"
                                  class="site-btn sb-white liked add-to-wishlist-btn" title="ازالة من المفضلة"><i class="flaticon-heart"></i> أحببته</a>
                                @else
                                <a href="javascript:;" id="product-add-to-wishlist-btn" data-action="{{route('favourite.toggle')}}" data-id="{{$TheProduct->id}}" data-user="{{auth()->user()->id}}" class="site-btn sb-white add-to-wishlist-btn"><i
                                      class="flaticon-heart"></i> اضافة الى المفضلة</a>
                                @endif
                            </div>
                              @endauth
                        </form>
                        <div id="accordion" class="accordion-area">
                            <div class="panel">
                                <div class="panel-header" id="headingOne">
                                    <button class="panel-link active text-center" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">معلومات المنتج</button>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="panel-body">
                                        <h4>شرح عن المنتج</h4>
                                        {!! $TheProduct->body !!}
                                        <br>
                                        <h4>طرق الدفع المتاحة</h4>
                                        <p>يمكنك الدفع عن طريق فودافون كاش, بطاقة الائتمان أو الدفع عن الاستلام</p>
                                        <br>
                                        <h4>شارك المنتج مع أصدقائك!</h4>
                                        <div class="social-sharing text-right">
                                            <a class="ml-3" href="https://api.whatsapp.com/send?text=منتج%20مميز%20من%20Arte%0D%0A{{url()->current()}}" target="_blank"><i class="text-whatsapp fa fa-whatsapp"></i></a>
                                            <a class="ml-3" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="text-facebook fa fa-facebook"></i></a>
                                            <a class="ml-3" href="https://twitter.com/intent/tweet?text=منتج%20مميز%20من%20Arte%0D%0A{{url()->current()}}" target="_blank"><i class="text-twitter fa fa-twitter"></i></a>
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
                                        @if(count($TheProduct->Reviews) > 0)
                                        <div class="reviews-overall-text row mb-5">
                                            <div class="col-6">
                                                <ul class="detailed-reviws-list text-left mb-0">
                                                    <li><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',5)->count()}})</span></li>
                                                    <li><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',4)->count()}})</span></li>
                                                    <li><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',3)->count()}})</span></li>
                                                    <li><i class="far fa-star mr-1"></i><i class="far fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',2)->count()}})</span></li>
                                                    <li><i class="far fa-star mr-1"></i><span class="mr-2">({{$TheProduct->Reviews->where('rate',1)->count()}})</span></li>
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
                                                            <li class="active"><i class="far fa-star"></i></li>
                                                        @endfor
                                                        @for ($i = 0; $i < (5-$Review->rate) ; $i++)
                                                            <li><i class="far fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                    <p>{{$Review->review}}</p>
                                                </span>
                                            </li>
                                            @empty
                                                
                                            @endforelse
                                          
                                        </ul>
                                        @else
                                        <p>كن أول من يقوم بمراجعة هذا المنتج!</p>
                                        @endif
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
                                        @guest
                                        <p>يرجى <a href="{{route('login.get')}}">تسجيل الدخول</a> لاضافة تقييم</p>    
                                        @endguest
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
                @forelse ($RelatedProducts as $RProduct)
                    <div class="product-item">
                        <a href="{{route('product' , [$RProduct->slug , $RProduct->id])}}">
                            <div class="product-item">
                                <div class="pi-pic">
                                    @if($RProduct->hasDiscount())
                                        <div class="tag-sale">فترة محدودة</div>
                                    @endif
                                    <img src="{{$RProduct->MainImage}}" alt="{{$RProduct->title}}">
                                    <div class="pi-links">
                                        <a href="{{route('product' , [$RProduct->slug , $RProduct->id])}}" class="add-card"><i class="flaticon-bag"></i><span>عرض المنتج</span></a>
                                        @auth
                                            <a href="javascript:;" class="wishlist-btn @if($RProduct->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$RProduct->id}}" data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
                                        @endauth
                                    </div>
                                </div>
                                <a href="{{route('product' , [$RProduct->slug , $RProduct->id])}}">
                                    <div class="pi-text">
                                        <h6>{{$RProduct->FinalPrice()}} L.E</h6>
                                        <p>{{$RProduct->title}}</p>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </section>
    <!-- RELATED PRODUCTS section end -->
    @include('layout.footer')
    @include('layout.scripts')
    @include('layout.errors')
</body>
</html>
