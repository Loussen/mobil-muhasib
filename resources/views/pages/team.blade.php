@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- Team area start -->
    <section class="team__area-6">
        <div class="container line pt-120">
            <span class="line-3"></span>

            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 offset-xxl-4 offset-xl-4">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title animation__char_come">Bizim komanda </h2>
                        <p> Təcrübəli kollektivimiz analitik düşüncə qabiliyyətli və yeniliklərə sürətlə adaptasiya olan təcrübəli mütəxəssislərdir.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper team__slider">
            <div class="swiper-wrapper">
                @foreach($team as $member)
                    <div class="swiper-slide team__slide">
                        <a href="{{ route('member', ['slug' => $member->slug, 'locale' => App::getLocale()]) }}">
                            <img src="{{ my_asset($member->image) }}" alt="{{ $member->full_name }}">
                            <div class="team__info">
                                <h4 class="team__member-name-6">{{ $member->full_name }}</h4>
                                <h5 class="team__member-role-6">{{ $member->position }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container line pt-150">
            <div class="line-3"></div>
        </div>

        <div class="team__join-btn">
            <div class="btn_wrapper">
                <a href="{{ route('contact', ['locale' => App::getLocale()]) }}" class="wc-btn-primary btn-item btn-hover"><span></span> Join our <br>talented
                    team
                    <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- Team area end -->


    <section class="team__btm">
        <div class="container g-0 line">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper pt-130 pb-140 text-anim">
                        <h2 class="sec-title title-anim">Your digital products & services ensured by our talented
                            team</h2>
                        <p>A hybrid team with hybrid culture. More than 20 people, including designers, engineers,
                            creatives,
                            thinkers, creative table and media experts always looking from a new perspective.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Counter area start -->
    <section class="counter__area">
        <div class="container g-0 line pt-140">
            <span class="line-3"></span>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="counter__wrapper-2">
                        <div class="counter__item-2">
                            <h2 class="counter__number">25k</h2>
                            <p>Project <br>completed</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2">
                            <h2 class="counter__number">8k</h2>
                            <p>Happy <br>customers</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2">
                            <h2 class="counter__number">15</h2>
                            <p>Years <br>experiences</p>
                            <span class="counter__border"></span>
                        </div>
                        <div class="counter__item-2">
                            <h2 class="counter__number">98</h2>
                            <p>Awards <br>achievement</p>
                            <span class="counter__border"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter area end -->


    <!-- CTA area start -->
    <section class="cta__area">
        <div class="container line pt-130 pb-110">
            <div class="line-3"></div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="cta__content">
                        <p class="cta__sub-title">Work with us</p>
                        <h2 class="cta__title title-anim">We would love to hear more about your project</h2>
                        <div class="btn_wrapper">
                            <a href="{{ route('contact', ['locale' => App::getLocale()]) }}" class="wc-btn-primary btn-item btn-hover"><span></span>Bizə yazın
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
