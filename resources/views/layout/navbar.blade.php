	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KV5C5BT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('home')}}" class="site-logo"><img src="{{url('public/img')}}/logo.png" alt="شعار آرتي"></a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form" action="{{route('shop.search')}}" method="get">
							<input id="search_term" type="text" placeholder="ابحث عن منتجات ..." name="search_term" value="{{$_GET['search_term'] ?? ''}}">
							<button><i class="fas fa-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						@auth
						<div class="user-panel">
							<div class="up-item">
								<div class="dropdown">
									<a class="dropdown-toggle" href="#" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">مرحباً بك {{auth()->user()->name}}</a>
									<div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="{{route('profile')}}">الملف الشخصي</a>
										<a class="dropdown-item" href="{{route('order.trace')}}">تتبع الطلبات</a>
										<a class="dropdown-item" href="{{route('wishlist')}}">العناصر المفضلة</a>
										<a class="dropdown-item text-danger" href="{{route('logout')}}">تسجيل الخروج</a>
									</div>
								</div>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="fas fa-shopping-cart"></i>
									<span>{{CartItemsCount()}}</span>
								</div>
								<a href="{{route('order.cart')}}">عربة التسوق</a>
							</div>
						</div>
						@endauth
						@guest
						<div class="user-panel">
							<div class="up-item">
								<i class="fas fa-user"></i>
								<a href="{{route('login.get')}}">دخول</a> أو <a href="{{route('signup.get')}}">انشاء حساب</a>
							</div>
						</div>
						@endguest
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{route('home')}}">الرئيسية</a></li>
					<li><a href="{{route('about')}}">عن الشركة</a></li>
					<li><a href="{{route('shop')}}">قائمة المنتجات</a></li>
					<li><a href="#">الأقسام</a>
						<ul class="sub-menu">
							@forelse(CategoriesList() as $Category)
								<li><a href="{{route('shop.category' , $Category->slug)}}">{{$Category->title}}</a></li>
							@empty
							@endforelse
						</ul>
					</li>
					<li><a href="{{route('order.trace')}}">تتبع الطلبات</a></li>
					<li><a href="{{route('contact')}}">اتصل بنا</a></li>
					{{-- <li><a href="#">المدونة</a></li> --}}
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
	<!-- PWA Add to home screen -->
	{{-- <div class="add-button pwa-add-to-home">
		<div class="row">
		<div class="col-4">
			<img src="{{url('public')}}/images/pwa-logo/icon-72x72.png" alt="">
		</div>
		<div class="col-8">
			<p class="font-weight-bold">تطبيق Arte Kids</p>
			<p>قم بتنزيل تطبيق Arte على هاتفك لسهولة الوصول!</p>
			<button class="site-btn add-button">تنزيل</button>
			<button id="close-pwa" class="site-btn btn-danger">اغلاق</button>
		</div>
		</div>
	</div> --}}
	<!-- PWA End-->
