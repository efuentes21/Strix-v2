@extends('layouts.admin.master')

@section('titulo', 'Inscriptions')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.inscriptions.inscriptions')
@stop
