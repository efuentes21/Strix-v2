@extends('layouts.login.master')

@section('titulo', 'Register')
@section('page-title', "REGISTER")
@section('form')
    @include('user.users.create')
@stop
