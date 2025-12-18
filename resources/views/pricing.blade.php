@extends('layouts.app', ['page_title' => (!empty($current_pricing) ? $current_pricing['rule_type'] : __('miscellaneous.menu.pricing')) ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('pricing.show'))
        @include('partials.pricing.datas')
    @else
        @include('partials.pricing.home')
    @endif

@endsection