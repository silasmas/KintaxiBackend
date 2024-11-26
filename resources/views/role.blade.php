@extends('layouts.app', ['page_title' => __('miscellaneous.menu.role.title') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('role.home'))
        @include('partials.role.home')
    @endif
    @if (Route::is('role.show'))
        @include('partials.role.datas')
    @endif
    @if (Route::is('role.entity.home'))
        @include('partials.role.entity')
    @endif
    @if (Route::is('role.entity.show'))
        @include('partials.role.entity.datas')
    @endif

@endsection