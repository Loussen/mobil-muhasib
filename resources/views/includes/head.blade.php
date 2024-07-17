<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{$metaDescription ?? config('data.meta_tags.description')}}">
<meta name="keywords" content="{{$metaKeywords ?? config('data.meta_tags.keywords')}}">
<meta property="og:title" content="{{$metaTitle ?? config('data.meta_tags.title')}}">
<meta property="og:description" content="{{$metaDescription ?? config('data.meta_tags.description')}}">
<meta property="og:image" content="{{isset($metaImage) ? my_asset($metaImage) : my_asset('uploads/images/static/ini_main_logo.jpg')}}">
<meta name="twitter:title" content="{{ $metaTitle ?? config('data.meta_tags.title') }}">
<meta name="twitter:description" content="{{ $metaDescription  ?? config('data.meta_tags.description')}}">
<meta name="twitter:image" content="{{ isset($metaImage) ? my_asset($metaImage) : my_asset('uploads/images/static/ini_main_logo.jpg') }}">



<title>.INI company</title>

<!-- Fav Icon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ my_asset('uploads/images/static/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ my_asset('uploads/images/static/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ my_asset('uploads/images/static/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ my_asset('uploads/images/static/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="{{ my_asset('uploads/images/static/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- All CSS files -->
<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/progressbar.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/meanmenu.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/master.css') }}">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
