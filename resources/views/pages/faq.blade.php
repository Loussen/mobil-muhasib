@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.default')

@section('content')

    <!-- FAQ area start -->
    <section class="faq__area-6">
        <div class="container g-0 line pt-130 pb-140">
            <div class="line-3"></div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="sec-title-wrapper">
                        <h2 class="sec-title-2 animation__char_come">{{ trans('custom.faq.title') }}</h2>
                        <p class="">{{ trans('custom.faq.sub_title') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="faq__list-6">
                        <div class="accordion" id="accordionExample">
                            @php $i = 1; @endphp
                            @foreach($faq as $faqItem)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faqItem->id }}">
                                        <button class="accordion-button {{ $i == 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faqItem->id }}" aria-expanded="{{ $i == 1 ? true : false }}"
                                                aria-controls="collapse{{ $faqItem->id }}">
                                            {{ $faqItem->getTranslation('question',App::getLocale()) }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faqItem->id }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}"
                                         aria-labelledby="heading{{ $faqItem->id }}"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{!! $faqItem->getTranslation('answer',App::getLocale()) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ area end -->


    <!-- CTA area start -->
    @include('includes.work_with_us')
    <!-- CTA area end -->

@stop
