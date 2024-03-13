@extends('layouts.admin.master')

@section('titulo', 'Race insuraces')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.raceinsurances.delete')
@stop
