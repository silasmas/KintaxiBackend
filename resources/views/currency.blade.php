@extends('layouts.app', ['page_title' => __('miscellaneous.menu.currency') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('payment_gateway.show'))
        @include('partials.currency.datas')
    @else
        @include('partials.currency.home')
    @endif

@endsection