<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'SIPS')</title>


    <!-- =========================================
         GOOGLE FONT - MONTSERRAT
    ========================================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- =========================================
         BOOTSTRAP
    ========================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- =========================================
         BOOTSTRAP ICONS
    ========================================== -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- =========================================
         CSS PRINCIPAL DO APP
    ========================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('CSS/app.css') }}"
    >


    <!-- =========================================
         CSS ESPECÍFICO DA PÁGINA
    ========================================== -->

    @yield('page-css')

</head>


<body>

    <div class="sips-app">


        <!-- =========================================
             CABEÇALHO
        ========================================== -->

        <header class="sips-header">


            <!-- LOGO -->

            <div class="sips-logo-area">

                <a href="{{ url('/dashboard') }}">

                    <img
                        src="{{ asset('IMAGENS/LOGOS/Logo_nome.png') }}"
                        alt="SIPS"
                        class="sips-logo"
                    >

                </a>

            </div>


            <!-- SINO -->

            <div class="sips-notificacao">

                <a
                    href="{{ url('/alertas') }}"
                    aria-label="Notificações"
                >

                    <i class="bi bi-bell"></i>

                    <span class="notificacao-ponto"></span>

                </a>

            </div>


        </header>



        <!-- =========================================
             CONTEÚDO DA PÁGINA
        ========================================== -->

        <main class="sips-conteudo">

            @yield('content')

        </main>



        <!-- =========================================
             ONDA / FUNDO VERMELHO
        ========================================== -->

        <div class="sips-fundo-vermelho">

            <img
                src="{{ asset('IMAGENS/onda_estilo.png') }}"
                alt=""
                class="sips-onda"
            >

        </div>



        <!-- =========================================
             NAVEGAÇÃO INFERIOR
        ========================================== -->

        <nav class="sips-menu">


            <!-- =====================================
                 INÍCIO
            ====================================== -->

            <a
                href="{{ url('/dashboard') }}"
                class="sips-menu-item {{ ($paginaAtiva ?? '') === 'inicio' ? 'ativo' : '' }}"
                aria-label="Início"
            >

                <div class="sips-menu-icone">

                    <i class="bi bi-house-door-fill"></i>

                </div>

            </a>



            <!-- =====================================
                 MAPA
            ====================================== -->

            <a
                href="{{ url('/mapa') }}"
                class="sips-menu-item {{ ($paginaAtiva ?? '') === 'mapa' ? 'ativo' : '' }}"
                aria-label="Mapa"
            >

                <div class="sips-menu-icone">

                    <i class="bi bi-geo-alt-fill"></i>

                </div>

            </a>



            <!-- =====================================
                 MOVIMENTAÇÃO
            ====================================== -->

            <a
                href="{{ url('/movimentacao') }}"
                class="sips-menu-item {{ ($paginaAtiva ?? '') === 'movimentacao' ? 'ativo' : '' }}"
                aria-label="Movimentação"
            >

                <div class="sips-menu-icone">

                    <i class="bi bi-arrow-left-right"></i>

                </div>

            </a>



            <!-- =====================================
                 ALERTAS
            ====================================== -->

            <a
                href="{{ url('/alertas') }}"
                class="sips-menu-item {{ ($paginaAtiva ?? '') === 'alertas' ? 'ativo' : '' }}"
                aria-label="Alertas"
            >

                <div class="sips-menu-icone">

                    <i class="bi bi-bell-fill"></i>

                </div>

            </a>



            <!-- =====================================
                 MAIS
            ====================================== -->

            <a
                href="{{ url('/mais') }}"
                class="sips-menu-item {{ ($paginaAtiva ?? '') === 'mais' ? 'ativo' : '' }}"
                aria-label="Mais opções"
            >

                <div class="sips-menu-icone">

                    <i class="bi bi-three-dots"></i>

                </div>

            </a>


        </nav>


    </div>



    <!-- =========================================
         BOOTSTRAP JS
    ========================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =========================================
         JAVASCRIPT ESPECÍFICO DA PÁGINA
    ========================================== -->

    @yield('page-js')


</body>

</html>