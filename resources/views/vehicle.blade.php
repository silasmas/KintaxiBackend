@extends('layouts.app', ['page_title' => !empty($entity) ? __('miscellaneous.menu.vehicle.' . $entity) : __('miscellaneous.menu.vehicle.all') ])

@section('app-content')

                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

    @if (Route::is('vehicle.home'))
        @include('partials.vehicle.home')
    @endif
    @if (Route::is('vehicle.show'))
        @include('partials.vehicle.datas')
    @endif
    @if (Route::is('vehicle.entity.home'))
        @include('partials.vehicle.entity')
    @endif
    @if (Route::is('vehicle.entity.show'))
        @include('partials.vehicle.entity_datas')
    @endif

@endsection