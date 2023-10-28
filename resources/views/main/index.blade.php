@extends('layouts.app')

@section('content')
    @include('components/index/banner')
    @include('components/index/masseuses')
    @include('components/index/programs')
    @include('components/index/advantages')
    @include('components/index/individual')
    @include('components/index/interior')

    <!-- Модальные окна -->
    @include('components/modal/masseuses')
    @include('components/modal/programs')
@endsection

@section('title')
    {{ __('Рандеву :: Клуб наслаждений') }}
@endsection
