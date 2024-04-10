@extends('layouts.user.master')

@section('titulo', 'Strix')

@yield('header')
@section('content')
    <div class="container">
        @include('user.races.inspection')
        @include('user.components.challenges')
        @include('user.components.sponsors')
        @include('user.races.rankings')
    </div>
@stop