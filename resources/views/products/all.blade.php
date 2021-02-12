@include('layout.header' , [
  'PageTitle' => 'المتجر',
  'PageDescription' => 'استمتع بمنتجات مميزة و عروض حصرية من موقع أرتي للملابس الجاهزة'
])

<body>
    <h1 class="d-none">جميع منتجات شركة أرتي</h1>
    @include('layout.navbar')
    <!-- Category section -->
    <section class="category-section spad">
        <div class="container">
            <div class="row">
                @include('products.filters-sidebar' , ['Categories' => $Categories])
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row">
                        @forelse ($Products as $Product)
                        <div class="col-lg-4 col-12">
                            <a href="{{route('product' , [$Product->slug , $Product->id])}}">
                                <div class="product-item">
                                    <div class="pi-pic">
										@if($Product->AvailableVariations()['inventory'] == 0)
											<div class="tag-sold mr-5">تم البيع بالكامل</div>
										@endif
                                        @if($Product->hasDiscount())
                                        <div class="tag-sale">فترة محدودة</div>
                                        @endif
                                        <img src="{{$Product->MainImage}}" alt="{{$Product->title}}">
                                        <div class="pi-links">
                                            <a href="{{route('product' , [$Product->slug , $Product->id])}}" class="add-card"><i class="fas fa-eye"></i><span>عرض المنتج</span></a>
                                            @auth
                                            <a href="javascript:;"
                                                class="wishlist-btn @if($Product->LikedByUser()) liked @endif global-add-to-wishlist"
                                                data-action="{{route('favourite.toggle')}}" data-id="{{$Product->id}}"
                                                data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
                                            @endauth
                                        </div>
                                    </div>
                                    <a href="{{route('product' , [$Product->slug , $Product->id])}}">
                                        <div class="pi-text">
                                            <h6>{{$Product->price}} L.E</h6>
                                            <p>{{$Product->title}}</p>
                                        </div>
                                    </a>
                                </div>
                            </a>
                        </div>
                        @empty
                        <p>لا يوجد منتجات للبيع حالياً</p>
                        @endforelse
                        <div class="text-center w-100 pt-3">
                            <button class="site-btn sb-line sb-dark">تحميل المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
