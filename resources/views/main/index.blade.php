@extends('layouts.app')

@section('content')
    @include('components/index/banner')
    @include('components/index/masseuses')
    @include('components/index/programs')
    @include('components/index/advantages')
    @include('components/index/individual')
    @include('components/index/interior')
    @include('components/index/vacancies')
@endsection

@section('title')
    {{ __('Рандеву :: Клуб наслаждений') }}
@endsection
