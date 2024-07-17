@php use Carbon\Carbon;use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- Blog area start -->
    <section class="blog__area-6 blog__animation">
        <div class="container g-0 line pt-110 pb-110">
            <span class="line-3"></span>
            <div class="row pb-130">
                <div class="col-xxl-8 col-xl-7 col-lg-6 col-md-6">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 animation__char_come">{{ trans('custom.blog.title') }}</h2>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-6">
                    <div class="blog__text">
                        <p>{{ trans('custom.blog.sub_title') }}</p>
                    </div>
                </div>
            </div>

            <div class="row reset-grid">
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
                            <a href="{{ route('article', ['slug' => $article->slug, 'locale' => App::getLocale()]) }}" class="blog__btn">{{ trans('custom.blog.read_more') }} <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog area end -->


    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->

@stop
