@extends('layouts.admin.master')

@section('titulo', 'Races')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.races.races')
@stop
