@extends('layouts.admin.master')

@section('titulo', 'Log in')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.admins.login')
@stop