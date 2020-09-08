	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('home')}}" class="site-logo">
							<img src="{{url('public/img')}}/logo.png" alt="شعار آرتي">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="ابحث عن منتجات ...">
							<button><i class="fas fa-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						@auth
						<div class="user-panel">
							<div class="up-item">
								<i class="fas fa-user"></i>
								<a href="{{route('login.get')}}">مرحباً بك {{auth()->user()->name}}</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="fas fa-shopping-cart"></i>
									<span>0</span>
								</div>
								<a href="#">عربة التسوق</a>
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
					<li><a href="#">منتجات جديدة</a></li>
					<li><a href="#">أحدث العروض
						<span class="new">New</span>
					</a></li>
					<li><a href="#">الأقسام</a>
						<ul class="sub-menu">
							<li><a href="#">بيجامات</a></li>
							<li><a href="#">جينز</a></li>
							<li><a href="#">أحذية</a></li>
							<li><a href="#">ملابس داخلية</a></li>
						</ul>
					</li>
					<li><a href="#">الطلبات</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>
					<li><a href="#">اتصل بنا</a></li>
					<li><a href="#">المدونة</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->