@php use Illuminate\Support\Facades\App; @endphp
<div class="cursor1"></div>
<div class="cursor2"></div>

<!-- Preloader -->
<div class="preloader">
    <div class="loading" style="display: block">
        <div class="bar bar1">.</div>
        <div class="bar bar2">İ</div>
        <div class="bar bar3">N</div>
        <div class="bar bar4">İ</div>
    </div>
</div>

<div class="switcher__area">
    <div class="switcher__icon">
        <button id="switcher_open"><i class="fa-solid fa-language"></i></button>
        <button id="switcher_close"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <div class="switcher__items">
        <div class="switcher__item_lang">
            <div class="switch__title-wrap">
                <h2 class="switcher__title">language</h2>
            </div>
            <div class="switcher__btn">
                <select name="cursor-style" id="site_language" onchange="changeLanguage();">
                    @foreach(config('data.locales') as $locale => $language)
                        <option value="{{ $locale }}" {{ app()->getLocale() == $locale ? 'selected' : '' }}>
                            {{ $language }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Smoother -->
<div class="has-smooth" id="has_smooth"></div>

<!-- Client Cursor -->
<div class="cursor" id="client_cursor">Play</div>

<!-- Go Top Button -->
<button id="scroll_top" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- Header area start -->
<header class="header__area">
    <div class="header__inner">
        <div class="header__logo">
            <a href="{{ route('home', ['locale' => App::getLocale()]) }}">
                <img class="logo-primary" src="{{ my_asset('uploads/images/static/ini_logo_2.png') }}" alt=".INI">
                <img class="logo-secondary" src="{{ my_asset('uploads/images/static/ini_logo.png') }}" alt=".INI">
            </a>
        </div>
        <div class="header__nav-icon">
            <button id="open_offcanvas"><img src="{{ asset('front/imgs/icon/menu-white.png') }}" alt="Menubar Icon">
            </button>
        </div>
        <div class="header__support" style="margin-bottom:40px">
            <p>{{ trans('custom.header.support_service') }} <a href="tel:{{ $contactInfo->phone }}">{{ $contactInfo->phone }}</a></p>
        </div>
    </div>
</header>
<!-- Header area end -->
