@php use Carbon\Carbon;use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <section class="pt-150 pb-130 portfolio-v2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-7 col-lg-6 col-md-6">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 animation__char_come">{!! trans('custom.portfolio.title') !!}</h2>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-6">
                    <div class="blog__text">
                        <p>{{ trans('custom.portfolio.text') }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio area start -->
    <section class="portfolio__area pb-140">
        <div class="container">
            <div class="row top_row">

                <h2 class="portfolio__text">{{ trans('custom.portfolio.works') }}</h2>
                <div class="portfolio__list-1">
                    @foreach($portfolios as $portfolio)
                        <div class="portfolio__item">
                            <a href="{{route('portDetail',['slug' => $portfolio->slug, 'locale' => App::getLocale()]) }}">
                                <img class="mover" src="{{ my_asset($portfolio->image) }}" alt="{{ $portfolio->getTranslation('name',App::getLocale()) }}">
                            </a>
{{--                            <div class="portfolio-text">--}}
{{--                                <p>{{$portfolio->getTranslation('description',App::getLocale())}}</p>--}}
{{--                            </div>--}}
                            <div class="portfolio__info">
                                <a href="{{route('portDetail',['slug' => $portfolio->slug, 'locale' => App::getLocale()]) }}"><h3 class="portfolio__title">{{trans('custom.portfolio.button')}}</h3></a>
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

    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->
@stop
