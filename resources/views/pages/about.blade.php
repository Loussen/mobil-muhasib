@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- Hero area start -->
    <section class="hero__about">
        <div class="container g-0 line">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="hero__about-content">
                        <h1 class="hero-title animation__word_come">{{ trans('custom.about.title') }}</h1>
                        <div class="hero__about-info">
                            <div class="hero__about-btn">
                                <div class="btn_wrapper">
                                    <a href="{{ route('services', ['locale' => App::getLocale()]) }}"
                                       class="wc-btn-primary btn-hover btn-item"><span></span> {{ trans('custom.about.services') }}
                                        <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="hero__about-text title-anim">
                                <p>{{ trans('custom.about.sub_title') }}</p>
                            </div>
                            <div class="hero__about-award">
                                <img src="{{ my_asset('uploads/images/static/award.png') }}" alt="KOBİA INI">
                            </div>
                            <style>
                                div.hero__about-award img:hover {
                                    transform: scale(1.8);
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row hero__about-row">--}}
{{--                <div class="col-xxl-12">--}}
{{--                    <div class="hero__about-video">--}}
{{--                        <video loop muted autoplay playsinline>--}}
{{--                            <source src="{{ asset('front/video/video.mp4') }}" type="video/mp4">--}}
{{--                        </video>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- Hero area end -->


    <!-- Story area start -->
    <section class="story__area">
        <div class="container g-0 line pt-140">
            <span class="line-3"></span>
            <div class="row" style="margin-bottom: 100px;margin-top: -100px">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                    <div class="story__img-wrapper">
{{--                        <img src="{{ my_asset('uploads/images/static/about-inner1.webp') }}" alt=".INI" class="w-100">--}}
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="story__img-wrapper img-anim">
                        <img src="{{ my_asset('uploads/images/static/kobia.jpg') }}" alt=".INI" data-speed="auto">
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <div class="story__img-wrapper">
                        {{--                        <img src="{{ my_asset('uploads/images/static/about-inner3.webp') }}" alt=".INI">--}}
{{--                        <img src="{{ my_asset('uploads/images/static/about-inner4.webp') }}" alt=".INI">--}}
                    </div>
                </div>
            </div>

            <div class="sec-title-wrapper">
{{--                <div class="from-text">from <span>2019</span></div>--}}

                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                        <h2 class="sec-sub-title title-anim">.INI</h2>
                        <h3 class="sec-title title-anim">{{ trans('custom.about.who_is_us') }}</h3>
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                        <div class="story__text">
                            <p>{!! trans('custom.about.who_is_us_text') !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Story area end -->


    <!-- Counter area start -->
    <section class="counter__area">
        <div class="container g-0 line pb-140 pt-140">
            <span class="line-3"></span>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="counter__wrapper-2 counter_animation">
                        <div class="counter__item-2 counter__anim">
                            <h2 class="counter__number">100+</h2>
                            <p>{!! trans('custom.about.done_projects') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2 counter__anim">
                            <h2 class="counter__number">50+</h2>
                            <p>{!! trans('custom.about.happy_customers') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2 counter__anim">
                            <h2 class="counter__number">15</h2>
                            <p>{!! trans('custom.about.annual_experience') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2 counter__anim">
                            <h2 class="counter__number">20</h2>
                            <p>{!! trans('custom.about.award_achievements') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter area end -->


    <!-- Team area start -->
{{--    <section class="team__area pt-140 pb-140">--}}
{{--        <div class="sec-title-wrapper">--}}
{{--            <h2 class="sec-sub-title title-anim">Bizim komanda</h2>--}}
{{--            <h3 class="sec-title title-anim">How we work</h3>--}}
{{--        </div>--}}


{{--        <div class="swiper team__slider">--}}
{{--            <div class="swiper-wrapper">--}}
{{--                @foreach($team as $member)--}}
{{--                    <div class="swiper-slide team__slide">--}}
{{--                        <a href="{{ route('member', ['slug' => $member->slug, 'locale' => App::getLocale()]) }}">--}}
{{--                            <img src="{{ my_asset($member->image) }}" alt="{{ $member->full_name }}">--}}
{{--                            <div class="team__info">--}}
{{--                                <h4 class="team__member-name-6">{{ $member->full_name }}</h4>--}}
{{--                                <h5 class="team__member-role-6">{{ $member->position }}</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Team area end -->



    <!-- Brand area start -->
{{--    <section class="brand__area">--}}
{{--        <div class="container g-0 line pt-140 pb-140">--}}
{{--            <span class="line-3"></span>--}}
{{--            <div class="row g-0">--}}
{{--                <div class="col-xxl-12">--}}
{{--                    <div class="sec-title-wrapper">--}}
{{--                        <h2 class="sec-sub-title title-anim">Lokal və qlobal partnyorlarımız</h2>--}}
{{--                        <h3 class="sec-title title-anim">Həllərimiz ilə daha da inkişaf edən partnyorlarımız</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="brand__list">--}}
{{--                    <div class="brand__list">--}}
{{--                        @foreach($partners as $partner)--}}
{{--                            <div class="brand__item fade_bottom">--}}
{{--                                <a href="{{ $partner->link }}" target="_blank">--}}
{{--                                    <img src="{{ my_asset($partner->image) }}"--}}
{{--                                         alt="{{ $partner->getTranslation('name',App::getLocale()) }}">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Brand area end -->


    <!-- Testimonial area start -->
{{--    <section class="testimonial__area-2">--}}
{{--        <div class="container g-0 line pb-140">--}}
{{--            <span class="line-3"></span>--}}

{{--            <div class="row g-0">--}}
{{--                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">--}}
{{--                    <div class="testimonial__video">--}}
{{--                        <video autoplay muted loop>--}}
{{--                            <source src="{{ asset('front/video/testimonial.mp4') }}" type="video/mp4">--}}
{{--                        </video>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">--}}
{{--                    <div class="testimonial__slider-wrapper-2">--}}
{{--                        <div class="swiper testimonial__slider">--}}
{{--                            <div class="swiper-wrapper">--}}

{{--                                <div class="swiper-slide testimonial__slide">--}}
{{--                                    <div class="testimonial__inner-2">--}}
{{--                                        <h2 class="testimonial__title-2">Amazing digital service</h2>--}}
{{--                                        <p class="testimonial__text-2">We were there right at the beginning just when--}}
{{--                                            the concept--}}
{{--                                            for--}}
{{--                                            search--}}
{{--                                            engine optimisation taking office and the full of internet. So wewe’ve grown--}}
{{--                                            to employ--}}
{{--                                            than 50--}}
{{--                                            talented specialists with diverse experiences and broad skill sets of huge--}}
{{--                                            markers.</p>--}}
{{--                                        <h3 class="testimonial__author">Adam Syndera</h3>--}}
{{--                                        <h4 class="testimonial__role">CEO, Agency</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="swiper-slide testimonial__slide">--}}
{{--                                    <div class="testimonial__inner-2">--}}
{{--                                        <h2 class="testimonial__title-2">Amazing digital service</h2>--}}
{{--                                        <p class="testimonial__text-2">We were there right at the beginning just when--}}
{{--                                            the concept--}}
{{--                                            for--}}
{{--                                            search--}}
{{--                                            engine optimisation taking office and the full of internet. So wewe’ve grown--}}
{{--                                            to employ--}}
{{--                                            than 50--}}
{{--                                            talented specialists with diverse experiences and broad skill sets of huge--}}
{{--                                            markers.</p>--}}
{{--                                        <h3 class="testimonial__author">Adam Syndera</h3>--}}
{{--                                        <h4 class="testimonial__role">CEO, Agency</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="swiper-slide testimonial__slide">--}}
{{--                                    <div class="testimonial__inner-2">--}}
{{--                                        <h2 class="testimonial__title-2">Amazing digital service</h2>--}}
{{--                                        <p class="testimonial__text-2">We were there right at the beginning just when--}}
{{--                                            the concept--}}
{{--                                            for--}}
{{--                                            search--}}
{{--                                            engine optimisation taking office and the full of internet. So wewe’ve grown--}}
{{--                                            to employ--}}
{{--                                            than 50--}}
{{--                                            talented specialists with diverse experiences and broad skill sets of huge--}}
{{--                                            markers.</p>--}}
{{--                                        <h3 class="testimonial__author">Adam Syndera</h3>--}}
{{--                                        <h4 class="testimonial__role">CEO, Agency</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="testimonial__pagination">--}}
{{--                            <div class="prev-button"><i class="fa-solid fa-arrow-right"></i></div>--}}
{{--                            <div class="next-button"><i class="fa-solid fa-arrow-left"></i></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Testimonial area end -->


    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->

@stop
