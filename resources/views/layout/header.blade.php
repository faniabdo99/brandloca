<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>آرتي - {{$PageTitle ?? ' متجر الملابس الأفضل'}}</title>
	<meta charset="UTF-8">
	<meta name="description" content="آرتي - {{$PageTitle ?? ' متجر الملابس الأفضل'}}">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{url('public')}}/img/favicon.png" rel="shortcut icon"/>
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Tajawal:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{url('public/css')}}/bootstrap.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/font-awesome.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/flaticon.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/slicknav.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/jquery-ui.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/owl.carousel.min.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/animate.css"/>
	<link rel="stylesheet" href="{{url('public/css')}}/style.css"/>
	@if(isset($Printable) && $Printable)
		<link rel="stylesheet" type="text/css" href="{{url('public/css')}}/print.css" media="print">
	@endif
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Old Google Analyitcs -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188412177-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-188412177-1');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SEKVJMCZNN"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'G-SEKVJMCZNN');
	</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KV5C5BT');</script>
	<!-- End Google Tag Manager -->
	<!-- PWA Related -->
	{{-- @laravelPWA --}}
</head>
