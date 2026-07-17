<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$app_profile->name}} | Cute & Kawaii Finds for Smart Minds</title>

	<meta name="description" content="Zuky by Vidhya Mart — Shop cute kawaii stationery, gifts, accessories & more. Free shipping on orders above ₹499.">
	<meta name="author" content="{{$app_profile->name}}">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="{{$app_profile->name}} — Cute & Kawaii Finds">
	<meta property="og:description" content="Shop cute kawaii stationery, gifts & accessories at Zuky by Vidhya Mart.">

	<link rel="icon" type="image/png" href="{{asset('public/uploads/profile/'.$app_profile->logo)}}">

	{{-- Bootstrap --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	{{-- Google Fonts: Nunito (kawaii-friendly rounded font) --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

	{{-- Icons --}}
	<link rel="stylesheet" type="text/css" href="{{asset('public/web/css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/web/icomoon/icomoon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/web/css/vendor.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/web/style.css?v=2')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<style>
	/* ── Global resets & font override for Zuky brand ── */
	html { scroll-behavior: smooth; }
	body {
	    font-family: 'Nunito', 'Poppins', sans-serif !important;
	    scroll-behavior: smooth;
	    -webkit-overflow-scrolling: touch;
	    background: #fff !important;
	    color: #3d3d3d;
	}
	h1,h2,h3,h4,h5,h6 {
	    font-family: 'Poppins', 'Nunito', sans-serif !important;
	    font-weight: 700 !important;
	}

	/* ── Search dropdown ── */
	.search-wrapper {
	    position: relative;
	    width: 300px;
	}
	.search-input {
	    width: 100%;
	    padding: 8px 12px;
	}
	.dropdown-box {
	    position: absolute;
	    top: 100%;
	    left: 0;
	    width: 100%;
	    background: #fff;
	    border: 1px solid #f0d6e8;
	    border-radius: 14px;
	    max-height: 280px;
	    overflow-y: auto;
	    display: none;
	    z-index: 99999;
	    box-shadow: 0 8px 30px rgba(233,30,140,0.12);
	}
	.dropdown-item {
	    padding: 11px 18px;
	    cursor: pointer;
	    color: #3d3d3d;
	    font-size: 13px;
	    transition: background .15s;
	}
	.dropdown-item:hover {
	    background: #fff0f8;
	    color: #e91e8c;
	}

	/* ── Scrollbar styling ── */
	::-webkit-scrollbar { width: 5px; height: 5px; }
	::-webkit-scrollbar-track { background: #fff0f8; }
	::-webkit-scrollbar-thumb { background: #e91e8c; border-radius: 10px; }
	::selection { background: #fce4ec; color: #e91e8c; }
	body, html { margin: 0 !important; padding: 0 !important; }
	#header-wrap { padding: 0 !important; margin: 0 !important; }
	.top-content { display: none; }
	.header.header { display: none; }

	/* ── Footer adjustments ── */
	#footer { background: #1a1a2e !important; padding: 48px 0 24px; }
	#footer .footer-item p,
	#footer .footer-menu ul li a,
	#footer .footer-menu h5,
	#footer .copyright p { color: rgba(255,255,255,0.75) !important; }
	#footer .footer-menu h5 { color: #fff !important; font-size: 15px; font-weight: 700 !important; margin-bottom: 14px; }
	#footer .footer-menu ul li a:hover { color: #e91e8c !important; }
	#footer-bottom { background: #111120 !important; padding: 14px 0; }
	#footer-bottom .copyright p { font-size: 12.5px; color: rgba(255,255,255,0.5) !important; }
	#footer-bottom .social-links a { color: rgba(255,255,255,0.6); transition: color .2s; }
	#footer-bottom .social-links a:hover { color: #e91e8c; }
	.footer-logo { max-height: 52px; width: auto; margin-bottom: 12px; filter: brightness(1.1); }
	</style>

</head>
