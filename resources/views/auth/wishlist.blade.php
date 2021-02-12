@include('layout.header' , ['pageTitle' => 'المفضلة'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	  <section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <div class="user-account-wishlist">
                        <h4 class="mb-4">العناصر المفضلة</h4>
                        <div class="row">
                          @forelse (auth()->user()->LikedProducts() as $Product)
                          <a href="{{route('product' , [$Product->Product->slug , $Product->Product->id])}}">
                            <div class="col-lg-6 col-12 product-item">
                                <div class="pi-pic">
                                    <img src="{{$Product->Product->MainImage}}" alt="{{$Product->Product->title}}">
                                    <div class="pi-links">
                                        <a href="#" class="add-card"><i class="fas fa-eye"></i><span>اضافة الى السلة</span></a>
                                        @auth
                                          <a href="javascript:;" class="wishlist-btn @if($Product->Product->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$Product->Product->id}}" data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
                                        @endauth
                                    </div>
                                </div>
                                <a href="{{route('product' , [$Product->Product->slug , $Product->Product->id])}}">
                                  <div class="pi-text">
                                      <h6>{{$Product->Product->price}} L.E</h6>
                                      <p>{{$Product->Product->title}}</p>
                                  </div>
                                </a>
                            </div>
                          </a>
                          @empty
                            <p>ليس لديك اي منتجات في المفضلة حتى الآن</p>
                          @endforelse
                        </div>
                    </div>
                </div>
            </div>
      </section>
    <!-- Hero section end -->
    @include('layout.footer')
    @include('layout.scripts')
    <script src="{{url('public/js/')}}/auth.js"></script>
</body>
</html>
