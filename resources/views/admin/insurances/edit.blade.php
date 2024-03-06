@extends('layouts.admin.master')

@section('titulo', 'Edit insurance')

@yield('dashboard')
@section('active-insurances', 'active')
@section('content')
    @include('admin.insurances.update')
@stop