@php use Carbon\Carbon;use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')
    <!-- Hero area start -->
    <section class="hero__area ">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="hero__content animation__hero_one">
                        <a href="{{ route('services', ['locale' => App::getLocale()]) }}">
                            {{ trans('custom.home.our_services') }}
{{--                            @php $i = 1; @endphp--}}
{{--                            @foreach($services as $service)--}}
{{--                                @if($i == 4)--}}
{{--                                    @break;--}}
{{--                                @endif--}}
{{--                                {{ $service->getTranslation('title',App::getLocale()) }} {{ $i != 3 ? ',' : '' }}--}}
{{--                                @php $i++; @endphp--}}
{{--                            @endforeach--}}
                            <br />
{{--                            <span><i--}}
{{--                                    class="fa-solid fa-arrow-right"></i></span>--}}
                        </a>
                        <div class="hero__title-wrapper">
                            {!! trans('custom.home.slogan') !!}
                        </div>
                        <img src="{{ asset('front/imgs/icon/arrow-down-big.png') }}" alt="Arrow Down Icon">
                        <div class="experience">
                            <h2 class="title">100+</h2>
                            <p>{!! trans('custom.home.done_projects_title') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('front/imgs/hero/1/1-bg.png') }}" alt="image" class="hero1_bg">
    </section>
    <!-- Hero area end -->


    <!-- Roll area start -->
    <section class="roll__area">
        <div class="swiper roll__slider">
            <div class="swiper-wrapper roll__wrapper">
                @foreach($services as $service)
                    <div class="swiper-slide roll__slide">
                        <h2>{{ $service->getTranslation('title',App::getLocale()) }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Roll area end -->


    <!-- About area start -->
    <section class="about__area">
        <div class="container line g-0 pt-140 pb-130">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="about__title-wrapper">
                        <h3 class="sec-title title-anim">{{ trans('custom.home.sub_title') }}</h3>
                    </div>

                    <div class="about__content-wrapper">
                        <div class="about__img">
                            <div class="img-anim">
                                <img style="object-fit: contain;" src="{{ my_asset('uploads/images/static/about.jpg') }}" alt="ini.az"
                                     data-speed="0.3">
                            </div>

                            <div class="about__img-right">
                                <img style="width: 220px;" src="{{ my_asset('uploads/images/static/about-2.jpg') }}" alt="ini.az"
                                     data-speed="0.5">
                                <div class="shape">
                                    <div class="secondary" data-speed="0.9"></div>
                                    <div class="primary"></div>
                                </div>
                            </div>
                        </div>

                        <div class="about__content text-anim">
                            <p>{{ trans('custom.home.sub_text') }}
                            </p>

                            <div class="cursor-btn btn_wrapper">
                                <a class="btn-item wc-btn-primary btn-hover"
                                   href="{{ route('about',['locale' => App::getLocale()]) }}"><span></span> {{ trans('custom.home.who_is_us') }}
                                    <i
                                        class="fa-solid fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- About area end -->


    <!-- Service area start -->
    <section class="service__area pt-110 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <div class="sec-title-wrapper wrap">
                        <h2 class="sec-sub-title title-anim">{{ trans('custom.home.services') }}</h2>
                        <h3 class="sec-title title-anim">{{ trans('custom.home.services_title') }}</h3>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="service__top-text text-anim">
                        <p>{{ trans('custom.home.services_text') }}</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                    <div class="service__top-btn">
                        <div class="btn_wrapper">
                            <a href="{{ route('services', ['locale' => App::getLocale()]) }}"
                               class="btn-item wc-btn-secondary btn-hover"><span></span> {!! trans('custom.home.our_services_link') !!} <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service__list-wrapper">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-0 col-md-0">
                        <div class="service__img-wrapper">
                            @php $i = 1; @endphp
                            @foreach($services as $service)
                                <img src="{{ my_asset($service->image) }}"
                                     alt="{{ $service->getTranslation('title',App::getLocale()) }}"
                                     class="service__img img-{{ $i }} {{ $i == 1 ? 'active' : '' }}">
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12">
                        <div class="service__list">
                            @php $i = 1; @endphp
                            @foreach($services as $service)
                                <a href="{{ route('service', ['slug' => $service->slug, 'locale' => App::getLocale()]) }}">
                                    <div class="service__item animation_home1_service" data-service="{{ $i }}">
                                        <div class="service__number"><span>{{ $i >= 10 ? '' : 0 }}{{ $i }}</span></div>
                                        <div class="service__title-wrapper">
                                            <h4 class="service__title">{{ $service->getTranslation('title',App::getLocale()) }}</h4>
                                        </div>
{{--                                        <div class="service__text">--}}
{{--                                            <p>{{ $service->getTranslation('short_description',App::getLocale()) }}</p>--}}
{{--                                        </div>--}}
                                        <div class="service__link">
                                            <p><i class="fa-solid fa-arrow-right"></i></p>
                                        </div>
                                    </div>
                                </a>
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service area end -->


    <!-- Counter area start -->
    <section class="counter__area">
        <div class="container g-0 line pt-150">
            <span class="line-3"></span>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="counter__wrapper counter_animation">
                        <div class="counter__item counter__anim">
                            <h2 class="counter__number">100+</h2>
                            <p>{!! trans('custom.home.done_projects') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item counter__anim">
                            <h2 class="counter__number">50+</h2>
                            <p>{!! trans('custom.home.happy_customers') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item counter__anim">
                            <h2 class="counter__number">15</h2>
                            <p>{!! trans('custom.home.annual_experience') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item counter__anim">
                            <h2 class="counter__number">20</h2>
                            <p>{!! trans('custom.home.award_achievements') !!}</p>
                            <span class="counter__border"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter area end -->


    <!-- Workflow area start -->
    <section class="workflow__area">
        <div class="container g-0 line pt-140 pb-140">
            <div class="line-3"></div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-sub-title title-anim">{{ trans('custom.home.work_mechanism') }}</h2>
                        <h3 class="sec-title title-anim">{{ trans('custom.home.how_work_us') }}</h3>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="swiper workflow__slider ">
                        <div class="swiper-wrapper">
                            @foreach(range(1, 6) as $index)
                                <div class="swiper-slide workflow__slide fade_left">
                                    <h4 class="workflow__step">{{ trans('custom.home.step_'.$index) }}</h4>
                                    <h5 class="workflow__number">{{ trans('custom.home.number_'.$index) }}</h5>
                                    <h6 class="workflow__title">{{ trans('custom.home.title_'.$index) }}</h6>
                                    <p>{{ trans('custom.home.description_'.$index) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Workflow area end -->


    <!-- Portfolio area start -->
    <section class="portfolio__area pb-140">
        <div class="container">
            <div class="row top_row">

                <h2 class="portfolio__text">{{ trans('custom.home.our_works') }}</h2>
                <div class="portfolio__list-1">
                    @foreach($portfolios as $portfolio)
                        <div class="portfolio__item">
                            <a href="{{route('portDetail',['slug' => $portfolio->slug ?? '', 'locale' => App::getLocale()]) }}"><img class="mover" src="{{ my_asset($portfolio->image) }}"
                                                               alt="{{ $portfolio->getTranslation('name',App::getLocale()) }}">
                            </a>
{{--                            <div class="portfolio-text">--}}
{{--                                <p>{{$portfolio->getTranslation('description',App::getLocale())}}</p>--}}
{{--                            </div>--}}
                            <div class="portfolio__info">
                                <a href="{{route('portDetail',['slug' => $portfolio->slug, 'locale' => App::getLocale()]) }}">
                                    <h3 class="portfolio__title">{{trans('custom.portfolio.button')}}</h3>
                                </a>
{{--                                <p>{{ Carbon::parse($portfolio->work_date)->locale(App::getLocale())->isoFormat('DD MMM YYYY') }}</p>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row row_bottom">
                <div class="col-xxl-12">
                    <div class="portfolio__btn btn_wrapper" data-speed="1" data-lag="0.2">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio area end -->


    <!-- Brand area start -->
    <section class="brand__area">
        <div class="container g-0 line pt-140 pb-130">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-sub-title title-anim">{{ trans('custom.home.partners_title') }}</h2>
                        <h3 class="sec-title title-anim">{{ trans('custom.home.partners_sub_title') }}</h3>
                    </div>
                </div>

                <div class="col-xxl-12">
                    <div class="brand__list">
                        @foreach($partners as $partner)
                            <div class="brand__item fade_bottom">
                                <a href="{{ $partner->link }}" target="_blank">
                                    <img src="{{ my_asset($partner->image) }}"
                                         alt="{{ $partner->getTranslation('name',App::getLocale()) }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand area end -->


    <!-- Testimonial area start -->
{{--    <section class="testimonial__area">--}}
{{--        <div class="container g-0 line">--}}
{{--            <span class="line-3"></span>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">--}}
{{--                    <div class="testimonial__wrapper">--}}
{{--                        <div class="testimonial__item item-1">--}}
{{--                            <div class="button modal-trigger">--}}
{{--                                <div class="testimonial__img b-right">--}}
{{--                                    <img src="{{ asset('front/imgs/testimonial/1/1.png') }}" alt="Testimonial Image">--}}
{{--                                </div>--}}

{{--                                <h2 class="testimonial__title">Jessica Sherlock</h2>--}}
{{--                                <h3 class="testimonial__role">Manager, Oitaka</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sec-title-wrapper text-anim">--}}
{{--                            <h4 class="sec-sub-title">Testimonials</h4>--}}
{{--                            <h5 class="sec-title title-anim">Clients <br>feedback</h5>--}}
{{--                            <p>Our happy customers give us impactfull and positive feedback on our services, customer--}}
{{--                                supports--}}
{{--                                &--}}
{{--                                etc.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="testimonial__item item-2">--}}
{{--                        <div class="button modal-trigger-2">--}}
{{--                            <div class="testimonial__img b-left">--}}
{{--                                <img src="{{ asset('front/imgs/testimonial/1/3.png') }}" alt="Testimonial Image">--}}
{{--                            </div>--}}

{{--                            <h2 class="testimonial__title">Jessica Sherlock</h2>--}}
{{--                            <h3 class="testimonial__role">Manager, Oitaka</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">--}}
{{--                    <div class="testimonial__item item-3 img-">--}}
{{--                        <div class="button modal-trigger-3">--}}
{{--                            <div class="testimonial__img b-left">--}}
{{--                                <img src="{{ asset('front/imgs/testimonial/1/2.png') }}" alt="Testimonial Image">--}}
{{--                            </div>--}}

{{--                            <h2 class="testimonial__title">adam Smith</h2>--}}
{{--                            <h3 class="testimonial__role">Manager, Oitaka</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Testimonial area end -->


    <!-- Blog area start -->
    <section class="blog__area no-pb blog__animation">
        <div class="container g-0 line pt-150 pb-140">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-sub-title">{{ trans('custom.home.latest_articles_title') }}</h2>
                        <h3 class="sec-title">{{ trans('custom.home.latest_articles_sub_title') }}</h3>
                    </div>
                </div>
                @foreach($blog as $article)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <article class="blog__item">
                            <div class="blog__img-wrapper">
                                <a href="{{ route('article', ['slug' => $article->slug, 'locale' => App::getLocale()]) }}">
                                    <div class="img-box">
                                        <img class="image-box__item" src="{{ my_asset($article->image) }}"
                                             alt="{{ $article->getTranslation('title',App::getLocale()) }}">
                                        <img class="image-box__item" src="{{ my_asset($article->image) }}"
                                             alt="{{ $article->getTranslation('title',App::getLocale()) }}">
                                    </div>
                                </a>
                            </div>
                            <h4 class="blog__meta"><a href="javascript:void(0);">{{ $article->category->name }}</a>
                                . {{ Carbon::parse($article->date)->locale(App::getLocale())->isoFormat('DD MMM YYYY') }}
                            </h4>
                            <h5><a href="{{ route('article', ['slug' => $article->slug, 'locale' => App::getLocale()]) }}"
                                   class="blog__title">{{ $article->getTranslation('title',App::getLocale()) }}</a></h5>
                            <a href="{{ route('article', ['slug' => $article->slug, 'locale' => App::getLocale()]) }}" class="blog__btn">{{ trans('custom.home.read_more') }} <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog area end -->


    <!-- CTA area start -->
    <section class="cta__area">
        <div class="container line pb-110">
            <div class="line-3"></div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="cta__content">
                        <p class="cta__sub-title">{{ trans('custom.home.apply_us_title') }}</p>
                        <h2 class="cta__title title-anim">{{ trans('custom.home.apply_us_sub_title') }}
                            </h2>
                        <div class="btn_wrapper">
                            <a href="{{ route('contact', ['locale' => App::getLocale()]) }}" class="wc-btn-primary btn-hover btn-item"><span></span>{{ trans('custom.home.write_us') }}
                                <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA area end -->
@stop
