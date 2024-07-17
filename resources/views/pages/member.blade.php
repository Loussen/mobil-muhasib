@extends('layouts.default')

@section('content')
    <div class="team__detail-page">
        <!-- Team area start -->
        <section class="team__detail">
            <div class="container line pb-140">
                <div class="line-3"></div>
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 offset-lg-0 offset-md-2">
                        <div class="team__member-img">
                            <img src="{{ my_asset($member->image) }}" alt="{{ $member->full_name }}" data-speed="0.5">
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                        <div class="sec-title-wrapper pt-120">
                            <h2 class="team__member-name-7 animation__char_come">{{ $member->name }} <br>{{ $member->surname }}</h2>
                            <h3 class="team__member-role-7 animation__char_come">{{ $member->position }}</h3>
                            <p>{!! $member->bio !!}</p>
                        </div>
                        @if($member->social_networks)
                            <div class="team__member-social">
                                <h4 class="work-title">{{ trans('custom.member.follow') }} :</h4>
                                @php $socialNetworks = json_decode($member->social_networks) @endphp
                                <ul>
                                    @foreach($socialNetworks as $socialNetwork)
                                        <li>
                                            <a href="{{ $socialNetwork->link }}" target="_blank">
                                                <i class="{{ $socialNetwork->icon }}"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Team area end -->

        <!-- CTA area start -->
        @include('includes.work_with_us')
        <!-- CTA area end -->
    </div>
@stop
