@extends('layouts.admin.master')

@section('titulo', 'Edit sponsor')

@yield('dashboard')
@section('active-sponsors', 'active')
@section('content')
    @include('admin.sponsors.update')
@stop
