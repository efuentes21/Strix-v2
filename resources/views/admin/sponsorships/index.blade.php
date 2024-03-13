@extends('layouts.admin.master')

@section('titulo', 'Race sponsors')

@yield('dashboard')
@section('active-races', 'active')
@section('content')
    @include('admin.sponsorships.delete')
@stop
