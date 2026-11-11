
@extends('layouts.app')

@section('titulo', 'Home - SIPS')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('conteudo')
<main class="home-page">
    <div class="home-card">
        <header class="home-header">
            <img src="{{ asset('IMAGENS/LOGOS/Logo_inicio.png') }}" alt="SIPS" class="home-logo">
            <h1>Bem-vindo, {{ $funcionario->nome_funcionario }}!</h1>
            <p>Sistema Integrado de Patrimônio SESI</p>
        </header>

        <section class="home-content">
            @if($admin == 'S')
                <div class="admin-area">
                    <div class="home-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h2>Painel Administrativo</h2>
                    <p>Gerencie os recursos e acompanhe as atividades do sistema.</p>
                    <a href="{{ route('painel') }}" class="btn-admin">
                        <i class="bi bi-grid-1x2"></i> Acessar Painel
                    </a>
                </div>
            @else
                <div class="usuario-area">
                    <div class="home-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h2>Acesso de funcionário</h2>
                    <p>Você está autenticado no SIPS. Seu perfil não possui permissão para acessar o painel administrativo.</p>
                </div>
            @endif
        </section>
    </div>
</main>
@endsection

@push('scripts')
    @vite('resources/js/home.js')
@endpush
