@extends('layouts.admin.master')

@section('titulo', 'Competitors')

@yield('dashboard')
@section('active-competitors', 'active')
@section('content')
    @include('admin.competitors.competitors')
@stop
