@include('layout.header' , [
    'PageTitle' => 'اتصل بنا',
    'PageDescription' => 'يقدم موقع أرتي للملابس الجاهزة خدمة دعم فني طوال أيام الأسبوع , يسعدنا الرد على استفساراتكم و الاجابة على أسئلتكم'
])

<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right contact-info">
                    <h3>تواصل معنا</h3>
                    <p dir="ltr"><a href="tel:00201151411867">0115 1411 867</a></p>
                    <p><a href="mailto:arteonline50@gmail.com">arteonline50@gmail.com</a></p>
                    <div class="contact-social">
                        <a href="https://instagram.com/artekidswear" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="https://facebook.com/arte0kids" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/artekidswear" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                    </div>
                    <form action="{{route('contact.post')}}" method="post" class="contact-form">
                        @csrf
                        <input required type="text" name="name" placeholder="الاسم">
                        <input required type="email" name="email" placeholder="البريد الإلكتروني">
                        <input required type="text" name="subject" placeholder="عنوان الرسالة">
                        <textarea required name="message" placeholder="الرسالة"></textarea>
                        <button type="submit" class="site-btn">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section end -->
    <!-- Related product section -->
    <section class="related-product-section spad">
        <div class="container">
            <div class="section-title">
                <h2>منتجات مميزة</h2>
            </div>
            <div class="row">
                @forelse(getLatestProducts() as $Product)
                <div class="col-lg-3 col-sm-6">
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
										<a href="javascript:;" class="wishlist-btn @if($Product->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$Product->id}}" data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
									@endauth
								</div>
							</div>
							<a href="{{route('product' , [$Product->slug , $Product->id])}}">
								<div class="pi-text">
									<h6>{{$Product->FinalPrice()}} L.E</h6>
									<p>{{$Product->title}}</p>
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
    <!-- Related product section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
