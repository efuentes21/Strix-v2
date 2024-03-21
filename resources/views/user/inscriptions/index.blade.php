@extends('layouts.user.master')

@section('titulo', 'Strix')

@yield('header')
@section('content')
    @include('user.inscriptions.form')
@stop