@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- Blog detail start -->
    <section class="blog__detail">
        <div class="container g-0 line pt-140">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-8 col-xl-10 offset-xxl-2 offset-xl-1">
                    <div class="blog__detail-top">
                        <h3 class="blog__detail-title animation__word_come">{{ $service->getTranslation('title',App::getLocale()) }}</h3>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="blog__detail-thumb">
                        <img src="{{ my_asset($service->inner_image) }}" alt="{{ $service->getTranslation('title',App::getLocale()) }}" data-speed="0.5">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-10 offset-xxl-2 offset-xl-1">
                    <div class="blog__detail-content">
                        {!! $service->getTranslation('content',App::getLocale()) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog detail end -->


    <!-- CTA area start -->
   @include('includes.work_with_us')
    <!-- CTA area end -->
@stop
