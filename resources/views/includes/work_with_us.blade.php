@php use Illuminate\Support\Facades\App; @endphp
<section class="cta__area">
    <div class="container line pt-100 pb-110 no-p">
        <div class="line-3"></div>
        <div class="row">
            <div class="col-xxl-12">
                <div class="cta__content">
                    <p class="cta__sub-title">{{ trans('custom.work_with_us.apply') }}</p>
                    <h2 class="cta__title title-anim">{{ trans('custom.work_with_us.title') }}</h2>
                    <div class="btn_wrapper">
                        <a href="{{ route('contact', ['locale' => App::getLocale()]) }}"
                           class="wc-btn-primary btn-item btn-hover"><span></span>{{ trans('custom.work_with_us.write_us') }}
                            <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
