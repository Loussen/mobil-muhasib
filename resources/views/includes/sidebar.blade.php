@php use Illuminate\Support\Facades\App; @endphp
    <!-- Offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__body">
        <div class="offcanvas__left">
            <div class="offcanvas__logo">
                <a href="{{ route('home', ['locale' => App::getLocale()]) }}"><img src="{{ my_asset('uploads/images/static/ini_logo.png') }}"
                                          alt=".INI"></a>
            </div>
            <div class="offcanvas__social">
                <h3 class="social-title">{{ trans('custom.sidebar.follow_us') }}</h3>
                <ul>
                    @php
                        $socialNetworks = json_decode($contactInfo->social_networks,true);
                    @endphp
                    @foreach ($socialNetworks as $link)
                        @php
                            $parsedUrl = parse_url($link['link']);
                            $host = $parsedUrl['host'];

                            $hostParts = explode('.', $host);
                        @endphp
                        <li>
                            <a target="_blank" href="{{ $link['link'] }}">
                                {{ ucfirst($hostParts[1]) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="offcanvas__links">
                <ul>
                    <li><a href="{{ route('about', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.about') }}</a></li>
                    <li><a href="{{ route('portfolio', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.portfolio') }}</a></li>
                    <li><a href="{{ route('ourProduct', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.ourProduct') }}</a></li>
                    <li><a href="{{ route('services', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.services') }}</a></li>
                    <li><a href="{{ route('blog', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.news') }}</a></li>
                    <li><a href="{{ route('contact', ['locale' => App::getLocale()]) }}">{{ trans('custom.sidebar.contact') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__mid">
            <div class="offcanvas__menu-wrapper">
                <nav class="offcanvas__menu">
                    <ul class="menu-anim">
                        @foreach (\App\Models\MenuItem::getTree() as $item)
                            @if($item->link == 'services')
                                <li><a href="{{ route($item->link, ['locale' => App::getLocale()]) }}">{{ $item->getTranslation('name', App::getLocale()) }}</a>
                                    <ul>
                                        @foreach(\App\Models\Service::get() as $service)
                                            <li>
                                                <a href="{{ route('service', ['slug' => $service->slug, 'locale' => App::getLocale()]) }}">{{ $service->getTranslation('title', App::getLocale()) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route($item->link, ['locale' => App::getLocale()]) }}">{{ $item->getTranslation('name', App::getLocale()) }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="offcanvas__right">
            <div class="offcanvas__search">
{{--                <form action="#">--}}
{{--                    <input type="text" name="search" placeholder="Search keyword">--}}
{{--                    <button><i class="fa-solid fa-magnifying-glass"></i></button>--}}
{{--                </form>--}}
            </div>
            <div class="offcanvas__contact">
                <h3>Əlaqə</h3>
                <ul>
                    <li><a href="tel:{{ $contactInfo->phone }}">{{ $contactInfo->phone }}</a></li>
                    <li><a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></li>
                    <li>{{ $contactInfo->getTranslation('address',App::getLocale()) }}</li>
                </ul>
            </div>
            <img src="{{ asset('front/imgs/shape/11.png') }}" alt="shape" class="shape-1">
            <img src="{{ asset('front/imgs/shape/12.png') }}" alt="shape" class="shape-2">
        </div>
        <div class="offcanvas__close">
            <button type="button" id="close_offcanvas"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</div>
<!-- Offcanvas area end -->
