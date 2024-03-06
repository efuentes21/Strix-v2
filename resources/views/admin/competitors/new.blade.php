@extends('layouts.admin.master')

@section('titulo', 'Create new competitor')

@yield('dashboard')
@section('active-competitors', 'active')
@section('content')
    @include('admin.competitors.create')
@stop
