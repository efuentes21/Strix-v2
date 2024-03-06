@extends('layouts.admin.master')

@section('titulo', 'Create new race')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.races.create')
@stop
