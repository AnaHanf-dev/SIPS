@extends('layouts.app')

@section('title', 'Início - SIPS')

@section('content')

    <div class="dashboard">

        <h1>Olá!</h1>

        <p class="dashboard-subtitulo">
            Confira o resumo do patrimônio.
        </p>

        <!--
            TODO O CONTEÚDO ESPECÍFICO
            DO DASHBOARD FICA AQUI
        -->

    </div>

@endsection

@section('page-css')

    <link
        rel="stylesheet"
        href="{{ asset('CSS/dashboard.css') }}"
    >

@endsection