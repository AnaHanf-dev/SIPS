<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - SIPS</title>

    <!-- Google Fonts - Montserrat -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('CSS/login.css') }}"
    >

</head>

<body>

<main class="pagina-login">

    <div class="login-card">

        <!-- =========================================
             CONTEÚDO
        ========================================== -->

        <div class="login-conteudo">

            <!-- LOGO -->

            <div class="login-logo">

                <img
                    src="{{ asset('IMAGENS/LOGOS/Logo_inicio.png') }}"
                    alt="SIPS - Sistema Integrado de Patrimônio SESI"
                >

            </div>


            <!-- FORMULÁRIO -->

            <form
                class="form-login"
                method="POST"
                action="#"
            >

                @csrf

                <!-- USUÁRIO -->

                <div class="campo">

                    <label for="usuario">
                        Usuário
                    </label>

                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        placeholder="Digite seu usuário"
                        autocomplete="username"
                    >

                </div>


                <!-- SENHA -->

                <div class="campo">

                    <label for="senha">
                        Senha
                    </label>

                    <div class="campo-senha">

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="mostrar-senha"
                            onclick="mostrarSenha()"
                            aria-label="Mostrar senha"
                        >
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>

                </div>


                <!-- LEMBRAR DE MIM -->

                <div class="opcoes-login">

                    <label class="lembrar">

                        <input
                            type="checkbox"
                            name="lembrar"
                        >

                        <span class="checkbox-custom"></span>

                        <span class="texto-lembrar">
                            Lembrar de mim
                        </span>

                    </label>

                </div>


                <!-- BOTÃO -->

                <button
                    type="submit"
                    class="login-botao"
                >
                    Entrar
                </button>


                <!-- ESQUECI A SENHA -->

                <a
                    href="#"
                    class="esqueci-senha"
                >
                    Esqueci minha senha
                </a>

            </form>

        </div>


        <!-- =========================================
             ONDA
        ========================================== -->

        <div class="login-onda-area">

            <img
                src="{{ asset('IMAGENS/onda_estilo.png') }}"
                alt=""
                class="login-onda"
            >

        </div>

    </div>

</main>


<script>

function mostrarSenha() {

    const senha = document.getElementById('senha');
    const icone = document.querySelector('.mostrar-senha i');

    if (senha.type === 'password') {

        senha.type = 'text';

        icone.classList.remove('bi-eye');
        icone.classList.add('bi-eye-slash');

    } else {

        senha.type = 'password';

        icone.classList.remove('bi-eye-slash');
        icone.classList.add('bi-eye');

    }

}

</script>

</body>

</html>