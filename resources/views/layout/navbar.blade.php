	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KV5C5BT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3">
						<div class="user-panel">
							@auth
							<div class="up-item">
								<div class="dropdown">
									<a class="dropdown-toggle" href="#" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">مرحباً بك {{auth()->user()->name}}</a>
									<div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="{{route('profile')}}">Profile</a>
										<a class="dropdown-item" href="{{route('order.trace')}}">Trace Orders</a>
										<a class="dropdown-item" href="{{route('wishlist')}}">Wishlist</a>
										<a class="dropdown-item text-danger" href="{{route('logout')}}">Logout</a>
									</div>
								</div>
							</div>
							@endauth
							@guest
								<div class="up-item">
									<i class="fas fa-user"></i>
									<a href="{{route('login.get')}}">Login</a> Or <a href="{{route('signup.get')}}">Signup</a>
								</div>
							@endguest
							<div class="up-item">
								<a href="{{route('order.cart')}}">
								<div class="shopping-card">
									<i class="fas fa-shopping-cart"></i>
									<span>{{CartItemsCount()}}</span>
								</div>
								Cart</a>
							</div>
						</div>
					</div>
					<div class="col-xl-7 col-lg-7">
						<form class="header-search-form" action="{{route('shop.search')}}" method="get">
							<input id="search_term" type="text" placeholder="Search products ..." name="search_term" value="{{$_GET['search_term'] ?? ''}}">
							<button><i class="fas fa-search"></i></button>
						</form>
					</div>
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('home')}}" class="site-logo"><img src="{{url('public/img')}}/logo.png" alt="شعار آرتي"></a>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{route('home')}}">Home</a></li>
					<li><a href="{{route('about')}}">About</a></li>
					<li><a href="{{route('shop')}}">Products</a></li>
					<li><a href="#">Categories</a>
						<ul class="sub-menu">
							@forelse(CategoriesList() as $Category)
								<li><a href="{{route('shop.category' , $Category->slug)}}">{{$Category->title}}</a></li>
							@empty
							@endforelse
						</ul>
					</li>
					<li><a href="{{route('order.trace')}}">Trace Orders</a></li>
					<li><a href="{{route('contact')}}">Contact</a></li>
					<li><a href="{{route('blog')}}">Blog</a></li>
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