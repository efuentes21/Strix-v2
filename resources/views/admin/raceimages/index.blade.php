@extends('layouts.admin.master')

@section('titulo', 'Race images')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.raceimages.raceimages')
@stop
