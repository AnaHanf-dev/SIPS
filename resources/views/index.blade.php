<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Início - SIPS</title>


    <!-- =========================================
         GOOGLE FONTS - MONTSERRAT
    ========================================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
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
         CSS DA PÁGINA
    ========================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('CSS/inicio.css') }}"
    >

</head>


<body>


    <!-- =========================================
         PÁGINA INICIAL
    ========================================== -->

    <main class="pagina-inicial">


        <!-- =====================================
             CARD PRINCIPAL
        ====================================== -->

        <div class="sips-card">


            <!-- =================================
                 CONTEÚDO
            ================================== -->

            <div class="conteudo">


                <!-- =================================
                     LOGO
                ================================== -->

                <div class="logo-area">

                    <img
                        src="{{ asset('IMAGENS/LOGOS/Logo_inicio.png') }}"
                        alt="SIPS - Sistema Integrado de Patrimônio SESI"
                        class="logo-sips"
                    >

                </div>


                <!-- =================================
                     BOTÕES
                ================================== -->

                <div class="botoes">


                    <!-- ENTRAR -->

                    <a
                        href="{{ route('login') }}"
                        class="btn-entrar"
                    >
                        Entrar
                    </a>


                    <!-- MOVIMENTAÇÃO RÁPIDA -->

                    <a
                        href="#"
                        class="movimentacao-rapida"
                    >
                        Realizar movimentação rápida
                    </a>


                </div>

            </div>


            <!-- =================================
                 PARTE VERMELHA
            ================================== -->

            <div class="parte-vermelha">
                <img
                    src="{{ asset('IMAGENS/onda_estilo.svg') }}"
                    alt=""
                    class="onda"
                >
            </div>


        </div>

    </main>


</body>

</html>