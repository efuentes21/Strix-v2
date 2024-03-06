@extends('layouts.admin.master')

@section('titulo', 'Insurances')

@yield('dashboard')
@section('active-insurances', 'active')
@section('content')
    @include('admin.insurances.insurances')
@stop
