
@extends('layouts.app')

@section('titulo', 'Login - SIPS')

@push('styles')
    @vite('resources/css/login.css')
@endpush

@section('conteudo')
<main class="login-page">
    <div class="perfil-superior">
        <div class="perfil-avatar">
            <i class="bi bi-person-fill"></i>
        </div>
    </div>

    <section class="login-conteudo">
        <div class="login-logo">
            <img src="{{ asset('IMAGENS/LOGOS/Logo_inicio.png') }}" alt="SIPS - Sistema Integrado de Patrimônio SESI">
        </div>

        <form class="login-form" id="form-login">
            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" autocomplete="username" required>
            </div>

            <div class="campo">
                <label for="senha">Senha</label>
                <div class="senha-container">
                    <input type="password" id="senha" name="senha" autocomplete="current-password" required>
                    <button type="button" class="mostrar-senha" id="mostrar-senha" aria-label="Mostrar senha">
                        <i class="bi bi-eye-slash"></i>
                    </button>
                </div>
            </div>

            <div class="lembrar-area">
                <label class="switch">
                    <input type="checkbox" id="lembrar" name="lembrar">
                    <span class="switch-slider"></span>
                </label>
                <label for="lembrar" class="lembrar-texto">Lembrar-me</label>
            </div>

            <button type="submit" class="btn-login" id="btn-entrar">Entrar</button>
            <a href="#" class="esqueci-senha">Esqueci minha senha</a>
        </form>
    </section>

    <div class="login-onda">
        <svg viewBox="0 0 1000 250" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M0 70 C180 190, 300 190, 500 130 C700 70, 850 10, 1000 0 L1000 250 L0 250 Z" fill="#e30513"/>
        </svg>
    </div>
</main>
@endsection

@push('scripts')
    @vite('resources/js/login.js')
@endpush
