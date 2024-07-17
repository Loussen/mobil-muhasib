@php use App\Models\Partner;use Illuminate\Support\Facades\App; @endphp
<section class="brand__area">
    <div class="container line pt-140 pb-100">
        <span class="line-3"></span>
        <div class="row">
            <div class="col-xxl-12">
                <h2 class="brand__title-3 title-anim">{{ trans('custom.partners.title') }}</h2>
                <div class="brand__list brand-gap">
                    @foreach(Partner::get() as $partner)
                        <div class="brand__item-2 fade_bottom">
                            <a href="{{ $partner->link }}" target="_blank">
                                <img style="width: 100px;" src="{{ my_asset($partner->image) }}"
                                     alt="{{ $partner->getTranslation('name',App::getLocale()) }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
