@extends('layouts.admin.master')

@section('titulo', 'Race insurances')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.raceinsurances.create')
@stop
