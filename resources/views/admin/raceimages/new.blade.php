@extends('layouts.admin.master')

@section('titulo', 'Upload images')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.raceimages.create')
@stop
