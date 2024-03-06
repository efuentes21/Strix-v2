@extends('layouts.admin.master')

@section('titulo', 'Edit challenge')

@yield('dashboard')
@section('active-challenges', 'active')
@section('content')
    @include('admin.challenges.update')
@stop
