@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default',['recaptcha' => true])

@section('content')

    <!-- Contact area start -->
    <section class="contact__area-6">
        <div class="container g-0 line pt-120 pb-110">
            <span class="line-3"></span>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 animation__char_come">{{ trans('custom.contact.title') }}</h2>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="contact__text">
                        <p>{{ $contact->getTranslation('short_description',App::getLocale()) }}</p>
                    </div>
                </div>
            </div>
            <div class="row contact__btm">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                    <div class="contact__info">
                        <h3 class="sub-title-anim-top animation__word_come">{{ $contact->getTranslation('title',App::getLocale()) }}</h3>
                        <ul>
                            <li><a href="tel:+(2)578365379">{{ $contact->phone }}</a></li>
                            <li><a href="mailto:hello@example.com">{{ $contact->email }}</a></li>
                            <li><span>{{ $contact->getTranslation('address',App::getLocale()) }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
                    <div class="contact__form">
                        <div id="formFeedback"></div>
                        <form id="contactForm" action="" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="text" name="name" placeholder="{{ trans('custom.contact.name_surname') }} *">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="email" name="email" placeholder="{{ trans('custom.contact.email') }} *">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="tel" name="phone" placeholder="{{ trans('custom.contact.phone') }}">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-12">
                                    <input type="text" name="subject" placeholder="{{ trans('custom.contact.subject') }} *">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea name="message" placeholder="{{ trans('custom.contact.text') }} *"></textarea>
                                </div>
                            </div>
                            <div class="g-recaptcha" style="float: right;" data-sitekey="6Lc1L3gpAAAAAAmh07OxdhVwCcrbHoHlZvi6S5FJ"></div>

                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                            <div class="row g-3" style="float: left;">
                                <div class="col-12">
                                    <div class="btn_wrapper">
                                        <button class="wc-btn-primary btn-hover btn-item"><span></span> {!! trans('custom.contact.send_message_button') !!}
                                            <i
                                                class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact area end -->

@stop
