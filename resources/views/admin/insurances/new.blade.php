@extends('layouts.admin.master')

@section('titulo', 'Create new insurance')

@yield('dashboard')
@section('active-insurances', 'active')
@section('content')
    @include('admin.insurances.create')
@stop
