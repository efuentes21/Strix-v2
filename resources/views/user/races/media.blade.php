@extends('layouts.user.master')

@section('titulo', 'Races media')
@section('body-class', 'bg-dark')

@yield('header')
@section('content')
    @include('admin.raceimages.carrousel')
@stop
