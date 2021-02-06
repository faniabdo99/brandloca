@include('layout.header')
<body>
    @include('layout.navbar')
    	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
        @include('products.filters-sidebar' , ['Categories' => $Categories])
        <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
            <form class="all-products-filters-form" action="javascript:;">
              <input hidden name="category" value="{{request()->route('category')}}">
              <input hidden name="routeName" value="{{url()->current()}}">
                <div class="row mb-5">
                    <div class="col-lg-3 col-6 mb-lg-0 mb-3 text-right">
                        <label class="font-weight-bold" for="size">الموسم</label>
                        <select class="form-control" id="season" name="season">
                            <option value="">جميع المواسم</option>
                            @forelse ($AvailableSeasons as $Season)
                            <option value="{{$Season}}">{{getSeasonText($Season)}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-3 col-6 mb-lg-0 mb-3 text-right">
                        <label class="font-weight-bold" for="category_id">القسم</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">جميع الأقسام</option>
                            @forelse ($AvailableCategories as $Category)
                            <option value="{{$Category}}">{{getCategoryFromId($Category)['title']}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-3 col-6 mb-lg-0 mb-3 text-right">
                        <label class="font-weight-bold" for="type">نوع المنتج</label>
                        <select class="form-control" id="type" name="type">
                            <option value="">جميع الأنواع</option>
                            @forelse ($AvailableTypes as $Type)
                            <option value="{{$Type}}">{{getTypeText($Type)}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-3 col-6 mb-lg-0 mb-3 text-right">
                        <label class="d-block">&nbsp;</label>
                        <button id="filter-products" data-action="{{route('shop.filter')}}" type="submit" class="site-btn site-btn-sm">فلترة</button>
                    </div>
                </div>
            </form>
            <div class="row" id="products-list">
                @forelse ($Products as $Product)
                <div data-id="{{$Product->id}}" class="col-lg-4 col-12">
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
                                    <a href="{{route('product' , [$Product->slug , $Product->id])}}" class="add-card"><i class="flaticon-bag"></i><span>عرض المنتج</span></a>
                                    @auth
                                    <a href="javascript:;" class="wishlist-btn @if($Product->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$Product->id}}"
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
                @if($Products->count() > 9)
                    <div class="text-center w-100 pt-3">
                        <button class="site-btn sb-line sb-dark">تحميل المزيد</button>
                    </div>
                    @endif
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
