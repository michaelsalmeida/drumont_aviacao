<?php
session_start();
include_once('conexao.php');

// if (!isset($_SESSION['verifica_cliente'])) {
//     // Se não estiver autenticado, redireciona para a página de login
//     header("Location: ../login.php");
//     exit;
// }

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUMONT - Minhas viagens</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
</head>

<body>
    <!--INICIO BARRA DE NAVEGAÇÃO-->
    <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img id="logo_navbar_dumont" width="150"
                    src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

            <div id="links_navbar">
                <a style="color: white;" id="link_nav1" class="nav-link" href="#">Home</a>
                <a style="color: white;" id="link_nav2" class="nav-link" href="#">Passagens</a>
                <a style="color: white;" id="link_nav3" class="nav-link" href="#">Ofertas</a>
                <a style="color: white;" id="link_nav4" class="nav-link" href="#">Entrar</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                        <button id="btn-burguer"><a style="color: white; text-decoration: none;" href="login.php"> Entre
                                ou
                                cadastre-se</a></button>

                        <hr style="margin-top: 20px; margin-bottom: 20px;">

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="perfil.php"> <img id="icon_aviao"
                                    src="img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_aviao"
                                    src="../img/airplane-engines.svg" alt="Ícone de um avião"> Minhas viagens</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="cliente_cancelados.php"> <img
                                    src="../img/x.svg" alt="Ícone de Cancelamento">Cancelados</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_ticket"
                                    src="../img/ticket.svg" alt="Ícone de um ticket"> Passagens aéreas</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_fogo"
                                    src="../img/fire.svg" alt="Ícone Fogo"> Ofertas</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_tel"
                                    src="../img/telephone.svg" alt="Ícone Telefone"> Contato</a>
                        </li>


                        <?php
                        if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login'])) {
                            echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='PHP/proc_sair_conta.php'> <img id='icon_tel' src='img/iconsaida.svg'
                                        alt='Ícone Saída'> Sair</a>
                                        </li>
                                        ";
                        }

                        ?>


                </div>
            </div>
        </div>
    </nav>
    <!--FIM BARRA DE NAVEGAÇÃO-->

    <!--CONTEÚDO PRINCIPAL DA PÁGINA-->

    <h1 style="color: #460AC6; text-align: center; width: 100%; margin-top: 20px;">Minhas viagens</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div
        style="width: 100%; min-height: 90vh; padding: 20px; display: flex; justify-content: flex-start; flex-direction: column; align-items:start;">
        <form action="proc_esqueceu_senha.php" method="get">
            <label for="cpf">Informe o seu CPF para acessar a conta</label>
            <input type="number" name="cpf" min="0" id="cpf" placeholder="CPF sem pontuação:" required>

            <button
                style="width: 130px; padding: 7px; border: none; color: white ;background-color: #460AC6; margin: 5px;"
                type="submit">Buscar</button>
        </form>
    </div>
    <!--FIM CONTEÚDO-->

    <!--INICIO RODAPÉ-->
    <div id="rodape" class="container-fluid">
        <div class="row">

            <div id="lugares_viajar" class="col-sm">
                <p><strong>Lugares para viajar</strong></p>
                <a class="text-white text-decoration-none" href="#">Salvador</a>
                <br>
                <a class="text-white text-decoration-none" href="#">Rio de Janeiro</a>
                <br>
                <a class="text-white text-decoration-none" href="#">Porto de Galinhas</a>
            </div>

            <div class="col-sm">
                <p><strong>Companhías Aéreas</strong></p>
                <a class="text-white text-decoration-none" href="#">Latam</a>
                <br>
                <a class="text-white text-decoration-none" href="#">Gol</a>
                <br>
                <a class="text-white text-decoration-none" href="#">Azul</a>
            </div>

            <div class="col-sm">
                <p><strong>Redes Socias</strong></p>

                <a class="text-white text-decoration-none" href="#"><img src="../img/instagram.svg"
                        alt="Ícone do Instagram">Instagram</a>
                <br>
                <a class="text-white text-decoration-none" href="#"><img src="../img/facebook.svg"
                        alt="Ícone do Facebook">
                    Facebook</a>
                <br>
                <a class="text-white text-decoration-none" href="#"><img src="../img/twitter.svg"
                        alt="Ícone do Twitter">
                    Twitter</a>
            </div>

        </div>
    </div>
    <!--FIM RODAPÉ-->
</body>

</html>