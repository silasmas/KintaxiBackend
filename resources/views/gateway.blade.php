@extends('layouts.app', ['page_title' => __('miscellaneous.menu.payment-gateway') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('payment_gateway.show'))
        @include('partials.payment-gateway.datas')
    @else
        @include('partials.payment-gateway.home')
    @endif

@endsection