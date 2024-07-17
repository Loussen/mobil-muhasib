@php use Illuminate\Support\Facades\App; @endphp
<footer class="footer__area">
    <div class="footer__top">
        <div class="container footer-line"></div>
        <img src="{{ my_asset('uploads/images/static/footer.jpg') }}" alt=".INI" data-speed="0.75">
    </div>

    <div class="footer__btm">
        <div class="container">
            <div class="row footer__row">
                <div class="col-xxl-12">
                    <div class="footer__inner">
                        <div class="footer__widget">
                            <img class="footer__logo" src="{{ my_asset('uploads/images/static/ini_logo.png') }}"
                                 alt=".INI">
                            <p>{{ trans('custom.footer.slogan') }} </p>
                            <ul class="footer__social">
                                @php
                                    $socialNetworks = json_decode($contactInfo->social_networks,true);
                                @endphp
                                @foreach ($socialNetworks as $link)
                                    <li>
                                        <a target="_blank" href="{{ $link['link'] }}">
                                            <span><i class="{{ $link['icon'] }}"></i></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="footer__widget-2">
                            <h2 class="footer__widget-title">{{ trans('custom.footer.navigation') }}</h2>
                            <ul class="footer__link">
                                <li><a href="{{ route('about', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.about') }}</a></li>
                                <li><a href="{{ route('portfolio', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.portfolio') }}</a></li>
                                <li><a href="{{ route('portfolio', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.ourProduct') }}</a></li>
                                <li><a href="{{ route('services', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.services') }}</a></li>
                                <li><a href="{{ route('blog', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.news') }}</a></li>
                                <li><a href="{{ route('contact', ['locale' => App::getLocale()]) }}">{{ trans('custom.footer.contact') }}</a></li>
                            </ul>
                        </div>

                        <div class="footer__widget-3">
                            <h2 class="footer__widget-title">{{ trans('custom.footer.contact_title') }}</h2>
                            <ul class="footer__contact">
                                <li>{{ $contactInfo->getTranslation('address', App::getLocale()) }}</li>
                                <li><a href="tel:{{ $contactInfo->phone }}" class="phone">{{ $contactInfo->phone }} </a></li>
                                <li><a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></li>
                            </ul>
                        </div>

                        <div class="footer__widget-4">
                            <h2 class="project-title">{{ trans('custom.footer.right_slogan_title') }} </h2>
                            <div class="btn_wrapper">
                                <a href="{{ route('contact', ['locale' => App::getLocale()]) }}"
                                   class="wc-btn-primary btn-hover btn-item"><span></span> {{ trans('custom.footer.contact_us') }} <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <h3 class="contact-time">10 : 00 - 18 : 00</h3>
                            <h4 class="contact-day">{{ trans('custom.footer.work_days') }}</h4>
                        </div>

                        <div class="footer__copyright">
                            <p>© 2022 - 2024 | {{ trans('custom.footer.copyright') }} <a href="{{ env('APP_URL') }}" target="_blank">.INI</a>
                            </p>
                        </div>

                        <div class="footer__subscribe">
{{--                            <form action="#">--}}
{{--                                <input type="email" name="email" placeholder="Email daxil edin">--}}
{{--                                <button type="submit" class="subs-btn"><i class="fa-solid fa-paper-plane"></i></button>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
