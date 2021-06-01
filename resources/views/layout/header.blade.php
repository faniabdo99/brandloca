<!DOCTYPE html>
<html lang="ar">
<head>
	<title>Brandloca - {{$PageTitle ?? ' Think Different Act Local'}}</title>
	<meta charset="UTF-8">
	<meta name="description" content="{{$PageDescription ?? 'شركة Arte Kids لملابس الأطفال من عمر 6 أشهر و حتى عمر 16 سنة, نخفيضات و عروض يومية و موديلات متجددة و مميزة'}}">
	<meta name="keywords" content="{{$PageKeywords ?? 'arte, أرتي, ملابس أطفال, بيجاما, تجارة الكترونية, شراء ملابس , arte kids wear, arte kids'}}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="canonical" href="{{url()->current()}}" />
	<!-- Open Graph data -->
	<meta property="og:title" content="{{$PageTitle ?? 'أرتي للملابس الجاهزة - الموقع الرسمي'}}" >
	<meta property="og:type" content="website" >
	<meta property="og:url" content="{{url()->current()}}" >
	<meta property="og:image" content="{{$PageImage ?? url('public/img/arte-logo.png')}}">
	<meta property="og:description" content="{{$PageDescription ?? 'شركة Arte Kids لملابس الأطفال من عمر 6 أشهر و حتى عمر 16 سنة, نخفيضات و عروض يومية و موديلات متجددة و مميزة'}}" >
	<meta property="og:site_name" content="أرتي للملابس الجاهزة" >
	<!-- Pointless But Needed Twitter Codes -->
	<meta name="twitter:card" content="{{$PageDescription ?? 'شركة Arte Kids لملابس الأطفال من عمر 6 أشهر و حتى عمر 16 سنة, نخفيضات و عروض يومية و موديلات متجددة و مميزة'}}" >
	<meta name="twitter:site" content="@artekidswear" >
	<meta name="twitter:creator" content="@artekidswear" >
	<meta name="twitter:image" content="{{$PageImage ?? url('public/img/arte-logo.png')}}" >
	<meta name="twitter:title" content="{{$PageTitle ?? 'أرتي للملابس الجاهزة - الموقع الرسمي'}}" />
	<meta name="twitter:description" content="{{$PageDescription ?? 'شركة Arte Kids لملابس الأطفال من عمر 6 أشهر و حتى عمر 16 سنة, نخفيضات و عروض يومية و موديلات متجددة و مميزة'}}" >
	<meta name="application-name" content="أرتي للملابس الجاهزة">
	<meta name="msapplication-TileImage" content="{{config('global.icon')}}/img/favicon.ico">
	<meta name="msapplication-TileColor" content="#FEC906">
	<!-- Favicon -->
	<link href="{{url('public')}}/img/favicon.png" rel="shortcut icon"/>
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Tajawal:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{url('public/css')}}/bootstrap.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/slicknav.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/jquery-ui.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/owl.carousel.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/style.css"/>
	@if(isset($Printable) && $Printable)
		<link rel="stylesheet" type="text/css" href="{{url('public/css')}}/print.css" media="print">
	@endif
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188412177-1"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SEKVJMCZNN"></script>
	<script type="text/javascript">
		if (document.location.hostname.search("myproductiondomainname.com") !== -1) {
			//Old Google Analytics
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-188412177-1');
			//New Google Analytics
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-SEKVJMCZNN');
			//Google Tags Manager
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KV5C5BT');
		}
	</script>
	<!-- PWA Related -->
	@laravelPWA
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '288297639315703');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=288297639315703&ev=PageView&noscript=1"/></noscript>
	<!-- End Facebook Pixel Code -->
</head>
