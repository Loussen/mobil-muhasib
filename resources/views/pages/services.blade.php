@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')
    <!-- Service area start -->
    <section class="service__area service-v2 pt-110 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="sec-title-wrapper wrap">
                        <h2 class="sec-sub-title title-anim">{{ trans('custom.services.title') }}</h2>
                        <h3 class="sec-title title-anim">{{ trans('custom.services.sub_title') }}</h3>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <div class="service__top-text text-anim">
                        <p>{!! trans('custom.services.text') !!}</p>
                    </div>
                </div>
            </div>

            <div class="service__list-wrapper">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-0 col-md-0">
                        <div class="service__img-wrapper">
                            @php $i = 1; @endphp
                            @foreach($services as $service)
                                <img src="{{ my_asset($service->image) }}" alt="{{ $service->getTranslation('title',App::getLocale()) }}"
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
                                        <div class="service__number"><span>0{{ $i }}</span></div>
                                        <div class="service__title-wrapper">
                                            <h4 class="service__title">{{ $service->getTranslation('title',App::getLocale()) }}</h4>
                                        </div>
                                        <div class="service__text">
                                            <p>{{ $service->getTranslation('short_description',App::getLocale()) }}</p>
                                        </div>
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


    <!-- Brand area start -->
    @include('includes.partners')
    <!-- Brand area end -->


    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->
@stop
