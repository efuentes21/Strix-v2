@extends('layouts.user.master')

@section('titulo', 'Strix races')

@yield('header')
@section('content')
    @include('user.races.rankings')
@stop
