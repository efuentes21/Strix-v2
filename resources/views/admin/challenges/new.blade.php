@extends('layouts.admin.master')

@section('titulo', 'Create new challenge')

@yield('dashboard')
@section('active-challenges', 'active')
@section('content')
    @include('admin.challenges.create')
@stop
