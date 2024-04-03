@extends('layouts.user.master')

@section('titulo', 'Challenges')

@yield('header')
@section('content')
    @include('user.components.challenges')
@stop
