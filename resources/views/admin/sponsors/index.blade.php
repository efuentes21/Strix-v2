@extends('layouts.admin.master')

@section('titulo', 'Sponsors')

@yield('dashboard')
@section('active-sponsors', 'active')
@section('content')
    @include('admin.sponsors.sponsors')
@stop
