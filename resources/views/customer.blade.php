@extends('layouts.app', ['page_title' => __('miscellaneous.menu.customers.title') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('customer.show'))
        @include('partials.customer.datas')
    @else
        @include('partials.customer.home')
    @endif

@endsection