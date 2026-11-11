
@extends('layouts.app')

@section('titulo', 'Início - SIPS')

@push('styles')
    @vite('resources/css/index.css')
@endpush

@section('conteudo')
<main class="pagina-inicial">
    <div class="sips-card">
        <div class="conteudo">
            <div class="logo-area">
                <img src="{{ asset('IMAGENS/LOGOS/Logo_inicio.png') }}" alt="SIPS - Sistema Integrado de Patrimônio SESI" class="logo-sips">
            </div>

            <div class="botoes">
                <a href="{{ route('entrar') }}" class="btn-entrar">Entrar</a>
                <a href="#" class="movimentacao-rapida">Realizar movimentação rápida</a>
            </div>
        </div>

        <div class="parte-vermelha">
            <svg class="onda" viewBox="0 0 1000 250" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M0 70 C180 190, 300 190, 500 130 C700 70, 850 10, 1000 0 L1000 250 L0 250 Z" fill="#e30513"/>
            </svg>
        </div>
    </div>
</main>
@endsection
