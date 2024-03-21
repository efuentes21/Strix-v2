@extends('layouts.user.master')

@section('titulo', 'Strix')

@yield('header')
@section('content')
    @include('user.components.banner-image')
    @include('user.components.banner')
    @include('user.components.races')
    @include('user.components.sponsors')
@stop
