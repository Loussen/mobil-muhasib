@php use App\Helpers\EstimateReadTimeHelper;use Carbon\Carbon;use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- Blog detail start -->
    <section class="blog__detail">
        <div class="container g-0 line pt-140">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-8 col-xl-10 offset-xxl-2 offset-xl-1">
                    <div class="blog__detail-top">
                        <h2 class="blog__detail-date animation__word_come">{{ $article->category->name }}
                            <span>{{ Carbon::parse($article->date)->locale(App::getLocale())->isoFormat('DD MMM YYYY') }}</span>
                        </h2>
                        <h3 class="blog__detail-title animation__word_come">{{ $article->getTranslation('title',App::getLocale()) }}</h3>
                        <div class="blog__detail-metalist">
                            <div class="blog__detail-meta">
{{--                                <img src="{{ asset('front/imgs/blog/detail/author.png') }}" alt="INI">--}}
                                <p>{!! trans('custom.article.written_by', ["author" => 'INI']) !!}</p>
                            </div>
                            <div class="blog__detail-meta">
                                <p>
                                    {!! trans('custom.article.reading_time', ["text" => EstimateReadTimeHelper::estimateReadingTime($article->getTranslation('content',App::getLocale()))]) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="blog__detail-thumb">
                        <img src="{{ my_asset($article->inner_image) }}" alt="{{ $article->getTranslation('title',App::getLocale()) }}" data-speed="0.5">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-10 offset-xxl-2 offset-xl-1">
                    <div class="blog__detail-content">
                        {!! $article->getTranslation('content',App::getLocale()) !!}
                    </div>
                    <div class="blog__detail-tags">
                        <p class="sub-title-anim">tags:
                            @foreach($article->tags as $tag)
                                <a href="javascript:void(0);">{{ $tag->name }}</a>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog detail end -->


    <!-- Related blog start -->
    <section class="blog__related blog__animation">
        <div class="container g-0 line pt-130 pb-140">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title title-anim">{{ trans('custom.article.other_news') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row reset-grid">
                @foreach($relatedArticles as $relatedArticle)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <article class="blog__item">
                            <div class="blog__img-wrapper">
                                <a href="{{ route('blog', ['slug' => $relatedArticle->slug, 'locale' => App::getLocale()]) }}">
                                    <div class="img-box">
                                        <img class="image-box__item" src="{{ my_asset($relatedArticle->image) }}"
                                             alt="{{ $relatedArticle->getTranslation('title',App::getLocale()) }}">
                                        <img class="image-box__item" src="{{ my_asset($relatedArticle->image) }}"
                                             alt="{{ $relatedArticle->getTranslation('title',App::getLocale()) }}">
                                    </div>
                                </a>
                            </div>
                            <h4 class="blog__meta sub-title-anim"><a href="javascript:void(0);">{{ $relatedArticle->category->name }}</a> .
                                {{ Carbon::parse($relatedArticle->date)->locale(App::getLocale())->isoFormat('DD MMM YYYY') }}</h4>
                            <h5><a href="{{ route('blog', ['slug' => $relatedArticle->slug, 'locale' => App::getLocale()]) }}" class="blog__title sub-title-anim">{{ $relatedArticle->getTranslation('title',App::getLocale()) }}</a></h5>
                            <a href="{{ route('blog', ['slug' => $relatedArticle->slug, 'locale' => App::getLocale()]) }}" class="blog__btn">{{ trans('custom.article.read_more') }} <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related blog end -->


    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->

@stop
