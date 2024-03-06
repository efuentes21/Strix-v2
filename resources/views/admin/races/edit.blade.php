@extends('layouts.admin.master')

@section('titulo', 'Edit race')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.races.update')
@stop
