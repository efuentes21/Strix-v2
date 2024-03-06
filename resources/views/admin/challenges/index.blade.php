@extends('layouts.admin.master')

@section('titulo', 'Challenges')

@yield('dashboard')
@section('active-challenges', 'active')
@section('content')
    @include('admin.challenges.challenges')
@stop
