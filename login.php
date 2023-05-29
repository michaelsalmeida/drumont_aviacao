<?php
session_start();
include_once('PHP/conexao.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DUMONT - Entre ou Cadastre-se</title>
  <link rel="stylesheet" href="CSS/login.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
</head>

<body>
  <!--INICIO BARRA DE NAVEGAÇÃO-->
  <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img id="logo_navbar_dumont" width="150" src="img/dumont_logo_nav_765x625.png"
          alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
        <a style="color: white;" id="link_nav1" class="nav-link" href="index.php">Home</a>
        <a style="color: white;" id="link_nav2" class="nav-link" href="reserva.php">Passagens</a>
        <a style="color: white;" id="link_nav3" class="nav-link" href="ofertas.php">Ofertas</a>
        <a style="color: white;" id="link_nav4" class="nav-link" href="login.php">Entrar</a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


            <button id="btn-burguer"><a style="color: white; text-decoration: none;" href="login.php"> Entre ou
                cadastre-se</a></button>

            <hr style="margin-top: 20px; margin-bottom: 20px;">

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="perfil.php"> <img id="icon_aviao"
                  src="img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/minhas_viagens.php"> <img id="icon_aviao"
                  src="img/airplane-engines.svg" alt="Ícone de um avião"> Minhas viagens</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="reserva.php"> <img id="icon_ticket" src="img/ticket.svg"
                  alt="Ícone de um ticket"> Passagens aéreas</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="ofertas.php"> <img id="icon_fogo" src="img/fire.svg"
                  alt="Ícone Fogo"> Ofertas</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="contato.html"> <img id="icon_tel"
                  src="img/telephone.svg" alt="Ícone Telefone"> Contato</a>
            </li>

            <?php
            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login'])) {
              echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='php/proc_sair_conta.php'> <img id='icon_tel' src='img/iconsaida.svg'
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
  <div id="div_logoroxa_login" class="col-sm-6">
    <img style=" width: 175px; margin: 10px;" id="logo_dumont_login" src="img/logoroxa.png" alt="Logo Dumont">
  </div>

  <div id="section" class="container-fluid">


    <div class="row">

      <div class="col-sm-6">

        <form action="PHP/proc_login.php" method="post">

          <div id="div_login">

            <img src="img/person-circle.svg" alt="Ícone de uma pessoa">
            <p style="color: #460AC6; font-size: 38px;"><strong>LOGIN</strong></p>

            <!--Exibir mensagem no topo da tela-->
            <?php
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            ?>

            <div class="">
              <label><img src="img/envelope.svg" alt="Ícone de um envelope"> E-mail</label> <br>
              <input name="email" type="email" required autofocus placeholder="Digite seu e-mail">
            </div>

            <div class="">
              <label><img src="img/lock.svg" alt="Ícone de um envelope">Senha</label> <br>
              <input name="senha" type="password" required autofocus placeholder="Digite sua senha">
            </div>


            <br>
            <button id="submit" type="submit">Entrar</button>
            <br>

            <a href="PHP/esqueceu_senha.php">Esqueceu sua senha? clique aqui!</a>

            <label style="color:#460AC6;">Ainda não possui uma conta?</label>
            <a id="btn_cad" type="button" href="cadastro.php">Cadastre-se</a>
          </div>

        </form>

      </div>
    </div>
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

        <a class="text-white text-decoration-none" href="#"><img src="img/instagram.svg"
            alt="Ícone do Instagram">Instagram</a>
        <br>
        <a class="text-white text-decoration-none" href="#"><img src="img/facebook.svg" alt="Ícone do Facebook">
          Facebook</a>
        <br>
        <a class="text-white text-decoration-none" href="#"><img src="img/twitter.svg" alt="Ícone do Twitter">
          Twitter</a>
      </div>

    </div>
  </div>
  <!--FIM RODAPÉ-->
</body>

</html>