@extends('layouts.user.master')

@section('titulo', 'Races media')

@yield('header')
@section('content')
    @include('user.components.mediaraces')
@stop
