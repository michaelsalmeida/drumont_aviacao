<?php
session_start();
include_once("php/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Link para css e Bootstrap5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/inserir_aeronave.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
  <title>DUMONT - Inserir aeronave</title>
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
        <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="#">Reservas</a> -->
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
              <a style="color: #460AC6;" class="nav-link" href="inserir_aeronave.php"> <img id="icon_aviao"
                  src="img/airplane-engines.svg" alt="Ícone de um avião"> Inserir aviões</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_ticket" src="img/ticket.svg"
                  alt="Ícone de um ticket"> Reservas</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/listar_aeronaves.php"> <img id="icon_fogo"
                  src="img/wind.svg" alt="Ícone Fogo"> Lista de aeronaves</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/relatorio.php"> <img id="icon_fogo"
                  src="img/iconrelatorio.svg" alt="Ícone Fogo"> Relatórios</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_fogo" src="img/person-circle.svg"
                  alt="Ícone Fogo"> Clientes</a>
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
  <!--FIM BARRA DE NAVEGAÇÃO-->


  <div id="main">
    <div id="box" class="container-fluid d-flex-column justify-content-center align-items-center mt-5">
      <h1 id="titulo">INSERIR AERONAVE</h1>

      <!-- area onde será exibido a mensagem da pagina de validação da aeronave -->
      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

      <div>
        <form action="php/validar_aeronave.php" method="post">
          <div class="row">
            <div class="col-lg">
              <label class="form-label">Número de série </label><br>
              <input id="input_serie" name="num_serie" type="text" maxlength="5" minlength="5" required>
            </div>
            <br>

            <div class="col-lg">
              <label class="form-label">Modelo</label><br>
              <input id="input_modelo" name="modelo" type="text" required>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col">
              <label class="form-label">Número máximo de passageiros</label><br>
              <input id="input_max_pass" name="num_assentos" type="number" max="516" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg text-center d-flex-column justify-content-center">
              <br>
              <input type="submit" id="cadastrar" value="CADASTRAR">
              <br>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <footer>
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

        <div class="col-sm p-0">
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
  </footer>
  <!--FIM RODAPÉ-->
</body>

</html>