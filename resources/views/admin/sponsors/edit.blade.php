@extends('layouts.admin.master')

@section('titulo', 'Create new sponsor')

@yield('dashboard')
@section('active-sponsors', 'active')
@section('content')
    @include('admin.sponsors.create')
@stop
