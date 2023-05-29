<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style(contato).css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
  <title>DUMONT - Contato</title>
</head>

<body>
  <!-- INICIO DA BARRA DE NAVEGAÇÃO -->
  <header>
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
                    src="img/airplane-engines.svg" alt="Ícone de um avião">Minhas viagens</a>
              </li>

              <li class="nav-item">
                <a style="color: #460AC6;" class="nav-link" href="reserva.php"><img id="icon_ticket"
                    src="img/ticket.svg" alt="Ícone de um ticket">Passagens aéreas</a>
              </li>

              <li class="nav-item">
                <a style="color: #460AC6;" class="nav-link" href="ofertas.php"> <img id="icon_fogo" src="img/fire.svg"
                    alt="Ícone Fogo">Ofertas</a>
              </li>

              <li class="nav-item">
                <a style="color: #460AC6;" class="nav-link" href="contato.php"> <img id="icon_tel"
                    src="img/telephone.svg" alt="Ícone Telefone">Contato</a>
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
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!--FIM BARRA DE NAVEGAÇÃO-->
  <img id="imagem_callcenter" src="./img/callcenter.png" class="img-fluid" alt="imagem de um callcenter">

  <main>
    <div id="contatos">
      <img id="icons" src="./img/telephone-fill.svg" class="img-fluid" alt="imagem de um callcenter">
      <p id="texto_icons">4002-8922</p>
      <img id="icons" src="./img/whatsapp.svg" class="img-fluid" alt="icone do whatsapp"> <br>
      <p id="texto_icons">91234-5678</p><br>
      <img id="icons" src="./img/envelope.svg" class="img-fluid" alt="">
      <p id="texto_icons">Dumont@email.com</p>
    </div>

    <div class="form-container mb-5">
      <form method="post" action="php/contato.php" style="background-color: #dfdfe0;" class="p-3 rounded-3">

        <h4 class="mb-3 text-center">ENVIE SEU FEEDBACK</h4>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input id="caixa" type="email" name="email_enviar" class="form-control" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Mensagem</label>
          <textarea style="resize: none; height: 8rem;" class="form-control" name="mensagem" id="mensagem" cols="x"
            rows="x" maxlength="150"></textarea>
          <div id="contador">0/150</div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </main>

  <footer>
    <!-- INICIO DO RODAPÉ -->
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
          <p><strong>Companhias Aéreas</strong></p>
          <a class="text-white text-decoration-none" href="#">Latam</a>
          <br>
          <a class="text-white text-decoration-none" href="#">Gol</a>
          <br>
          <a class="text-white text-decoration-none" href="#">Azul</a>
        </div>

        <div class="col-sm">
          <p><strong>Redes Sociais</strong></p>

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
  </footer>
  <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
  ?>
  <script src="js/contato.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
</body>

</html>