<?php
    session_start();
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - Feedback</title>
</head>
<body>
      <!--INICIO BARRA DE NAVEGAÇÃO-->
  <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="../home_adm.php"><img id="logo_navbar_dumont" width="150"
          src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
          <a style="color: white;" id="link_nav1" class="nav-link" href="relatorio.php">Relatorios</a>
          <a style="color: white;" id="link_nav2" class="nav-link" href="../inserir_aeronave.php">Inserir aviões</a>
          <a style="color: white;" id="link_nav3" class="nav-link" href="listar_aeronaves.php">Lista de aeronaves</a>
          <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="#">Reservas</a> -->
          <a style="color: white;" id="link_nav4" class="nav-link" href="lista_feedback.php">Feedback</a>
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
              <a style="color: #460AC6;" class="nav-link" href="../inserir_aeronave.php"> <img id="icon_aviao" src="../img/airplane-engines.svg"
                  alt="Ícone de um avião"> Inserir aviões</a>
              </li>

              <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_ticket" src="../img/ticket.svg"
                  alt="Ícone de um ticket"> Reservas</a>
              </li>

              <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="listar_aeronaves.php"> <img id="icon_fogo" src="../img/wind.svg"
                  alt="Ícone Fogo"> Lista de aeronaves</a>
              </li>

              <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="relatorio.php"> <img id="icon_fogo" src="../img/iconrelatorio.svg"
                  alt="Ícone Fogo"> Relatórios</a>
              </li>

              <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_fogo" src="../img/person-circle.svg"
                  alt="Ícone Fogo"> Clientes</a>
              </li>

              <?php
                            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login']) ) {
                                echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='proc_sair_conta.php'> <img id='icon_tel' src='../img/iconsaida.svg'
                                        alt='Ícone Saída'> Sair</a>
                                        </li>
                                        ";
                            }

                            ?>


        </div>
      </div>
    </div>
  </nav>
    
  <div class="container my-5">
        <h1 class="text-uppercase text-center fw-bold pb-3">feedbacks</h1><hr>
        
        <?php
            $result_usuarios = "SELECT * FROM msg_cliente";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
                echo "<p><strong>Email:</strong> " . $row_usuario['email'] . "</p>";
                echo "<p><strong>Mensagem:</strong> " . $row_usuario['msg'] . "</p><hr>";
            }
        ?>
    </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</body>
</html>