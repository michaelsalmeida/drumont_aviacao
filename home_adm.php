<?php
session_start();
include_once('PHP/conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['verifica_login'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: login.php");
    exit;
}
?>


<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DUMONT - Entre ou Cadastre-se</title>
  <link rel="stylesheet" href="css/home_adm.css">
  <link rel="stylesheet" href="css/style.css">
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
      <a class="navbar-brand" href="home_adm.php"><img id="logo_navbar_dumont" width="150"
          src="img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
        <a style="color: white;" id="link_nav1" class="nav-link" href="php/relatorio.php">Relatorios</a>
        <a style="color: white;" id="link_nav2" class="nav-link" href="inserir_aeronave.php">Inserir aviões</a>
        <a style="color: white;" id="link_nav3" class="nav-link" href="php/listar_aeronaves.php">Lista de aeronaves</a>
        <a style="color: white;" id="link_nav4" class="nav-link" href="php/lista_feedback.php">Feedback</a>
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

        <h4 style="color: #460AC6; ">
          <?php
            echo "Administrador: " . $_SESSION['nome_login']; 
          ?>
        </h4>

        <hr style="margin-top: 20px; margin-bottom: 20px;">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="inserir_aeronave.php"> <img id="icon_aviao" src="img/airplane-engines.svg"
                  alt="Ícone de um avião"> Inserir aviões</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_ticket" src="img/ticket.svg"
                  alt="Ícone de um ticket"> Reservas</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/listar_aeronaves.php"> <img id="icon_fogo" src="img/wind.svg"
                  alt="Ícone Fogo"> Lista de aeronaves</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/relatorio.php"> <img id="icon_fogo" src="img/iconrelatorio.svg"
                  alt="Ícone Fogo"> Relatórios</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_fogo" src="img/person-circle.svg"
                  alt="Ícone Fogo"> Clientes</a>
            </li>

            <?php
                            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login']) ) {
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

  <div id="conteudo-generico" class="container-fluid">
    <div id="logo_home_adm">
      <img class="img-fluid" id="logo" src="img/dumont_logo_nav_765x625.png" alt="Imgem de fundo">

    </div>

    <div class="div_itens_adm">
      <div class="row">

        <div class="col-md">
          <div class="itens_adm">

            <a style="text-decoration: none; color: black;" href="php/listar_aeronaves.php">
              <img width="80px" src="img/icon_aviao.png" alt="Ícone de um avião">
              <p style="font-size: 22px; text-align: center;"><strong>Aviões</strong></p>

            </a>

          </div>
        </div>

        <div class="col-md">
          <div class="itens_adm">

            <a style="text-decoration: none; color: black;" href="php/relatorio.php">
              <img width="80px" src="img/icon_relatorio.png" alt="Ícone de um avião">
              <p style="font-size: 22px; text-align: center;"><strong>Relatórios</strong></p>
            </a>

          </div>

        </div>

        <!-- <div class="col-md">
          <div class="itens_adm">
            <a style="text-decoration: none; color: black;" href="">
              <img width="80px" src="img/icon_gerennciamento_contas.png" alt="Ícone de um avião">
              <p style="font-size: 22px; text-align: center;"><strong>Gerenciamento de contas</strong></p>
            </a>
          </div>
        </div> -->



      </div>

      <div class="row">

        <div class="col-md">
          <div class="itens_adm">

            <a style="text-decoration: none; color: black;" href="inserir_aeronave.php">
              <img width="80px" src="img/icon_gerenciamento_voo.png" alt="Ícone de um avião">
              <p style="font-size: 22px; text-align: center;"><strong>Gerenciamento de voos</strong></p>
            </a>

          </div>
        </div>

        <div class="col-md">
          <div class="itens_adm">

            <a style="text-decoration: none; color: black;" href="php/lista_feedback.php">
              <img width="80px" src="img/icon-mensagem.png" alt="Ícone de um avião">
              <p style="font-size: 22px; text-align: center;"><strong>Feedbacks</strong></p>
            </a>

          </div>

        </div>

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