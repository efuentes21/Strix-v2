@extends('layouts.admin.master')

@section('titulo', 'Race challenges')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.racechallenges.delete')
@stop
