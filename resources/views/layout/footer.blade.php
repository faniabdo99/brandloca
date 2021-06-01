	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About Brandloca</h2>
						<p>Think Different, Shop Local</p>
						<img src="{{url('public/img')}}/vodafone-cash.png" width="60" height="30" alt="vodafone-cash">
						<img src="{{url('public/img')}}/mastercart.png" width="60" height="30" alt="Master Card">
						<img src="{{url('public/img')}}/visa-card.png" width="60" height="30" alt="Visa Card">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Pages</h2>
						<ul>
							<li><a href="{{route('shop')}}">Products</a></li>
							<li><a href="{{route('about')}}">About Brandloca</a></li>
							<li><a href="{{route('order.trace')}}">Trace Order</a></li>
							<li><a href="{{route('return.policy')}}">Return Policy</a></li>
							<li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>From Our Blog</h2>
						<div class="fw-latest-post-widget">
							@forelse (getImportantArticles(2) as $FArticle)
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="{{url('public/placeholder.png')}}"></div>
								<div class="lp-content">
									<h6>{{$FArticle->title}}</h6>
									<span>{{$FArticle->created_at->format('d, M y')}}</span>
									<a href="{{route('blog.single' , [$FArticle->id,$FArticle->slug])}}" class="readmore">Read More</a>
								</div>
							</div>
							@empty
								
							@endforelse
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Contact Us</h2>
						<div class="con-info">
							<span><i class="fas fa-home"></i></span>
							<p>Brandloca</p>
						</div>
						<div class="con-info">
							<span><i class="fas fa-map-marker-alt"></i></span>
							<p>Brandloca address</p>
						</div>
						<div class="con-info">
							<span><i class="fas fa-phone"></i></span>
							<p dir="ltr"><a href="tel:00201027099000">0102 7099 000</a></p>
						</div>
						<div class="con-info">
							<span><i class="fas fa-envelope"></i></span>
							<p><a href="mailto:sales@brandloca.com">sales@brandloca.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="https://instagram.com/artekidswear" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
					<a href="https://facebook.com/artekidswear" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/artekidswear" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer section end -->