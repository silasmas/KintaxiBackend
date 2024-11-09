@extends('layouts.app', ['page_title' => __('miscellaneous.menu.dashboard') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('status.show'))
        @include('partials.status.datas')
    @else
        @include('partials.status.home')
    @endif

@endsection