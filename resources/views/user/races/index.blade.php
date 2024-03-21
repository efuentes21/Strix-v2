@extends('layouts.user.master')

@section('titulo', 'Strix')

@yield('header')
@section('content')
    <div class="container">
        @include('user.races.inspection')
        @include('user.components.challenges')
    </div>
@stop