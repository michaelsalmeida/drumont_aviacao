<!-- <?php
session_start();
include_once('PHP/conexao.php');

if (!isset($_SESSION['verifica_cliente'])) {
  // Se não estiver autenticado, redireciona para a página de login
  header("Location: login.php");
  exit;
} else {
  $email = $_SESSION['email_cliente'];
  $senha = $_SESSION['senha_cliente'];

  $sql = "SELECT * FROM cliente INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente  WHERE cadastro.email = '$email' AND cadastro.senha = '$senha'";

  $resultado = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn)) {
    while ($linha = mysqli_fetch_assoc($resultado)) {

      //Tabela Clientes
      $_SESSION['verifica_cliente'] = $linha['pk_cliente'];
      $_SESSION['nome_cliente'] = $linha['nome'];
      $_SESSION['sobrenome_cliente'] = $linha['sobrenome'];
      $_SESSION['cpf_cliente'] = $linha['cpf'];
      $_SESSION['datanasci_cliente'] = $linha['data_nasci'];
      //Tabela cadastro
      $_SESSION['email_cliente'] = $linha['email'];
      $_SESSION['senha_cliente'] = $linha['senha'];
      $_SESSION['funcionamento_cliente'] = $linha['funcionamento'];
      //Tabela rg
      $_SESSION['rg_cliente'] = $linha['rg'];
      //Tabela endereco
      $_SESSION['cep_cliente'] = $linha['cep'];
      $_SESSION['rua_cliente'] = $linha['rua'];
      $_SESSION['bairro_cliente'] = $linha['bairro'];
      $_SESSION['cidade_cliente'] = $linha['cidade'];
      $_SESSION['uf_cliente'] = $linha['uf'];
      //Tabela contato_cliente
      $_SESSION['numero_cliente'] = $linha['numero'];
      $_SESSION['telefone_cliente'] = $linha['telefone'];
      $_SESSION['celular_cliente'] = $linha['celular'];
    }
  }
}

?> -->

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DUMONT - Minha conta</title>
  <link rel="stylesheet" href="CSS/perfil.css">
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
      <a class="navbar-brand" href="index.php"><img id="logo_navbar_dumont" width="150"
          src="img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
        <a style="color: white;" id="link_nav1" class="nav-link" href="index.php">Home</a>
        <a style="color: white;" id="link_nav2" class="nav-link" href="reserva.php">Passagens</a>
        <a style="color: white;" id="link_nav3" class="nav-link" href="ofertas.php">Ofertas</a>
        <a style="color: white;" id="link_nav4" class="nav-link" href="index.php">Sair</a>
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

            <h3 style="color: #460AC6;">Minha conta</h3>
            <h4 style="color: #460AC6;">
              <?php
              echo 'Olá ' . $_SESSION['nome_cliente'];
              ?>
            </h4>

            <hr style="margin-top: 20px; margin-bottom: 20px;">

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="perfil.php"> <img id="icon_aviao"
                  src="img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/minhas_viagens.php"> <img id="icon_ticket"
                  src="img/airplane-engines.svg" alt="Ícone de um ticket"> Minhas viagens</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="php/cliente_cancelados.php"> <img src="img/x.svg"
                  alt="Ícone de Cancelamento">Cancelamentos</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="contato.php"> <img id="icon_tel" src="img/telephone.svg"
                  alt="Ícone Telefone"> Contato</a>
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

  <div id="div_cliente_logado" class="container-fluid">
    <div id="linha" class="row">

      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

      <h1 style="color: #460AC6; text-align: center; margin-top: 10px; margin-bottom: 50px;">Bem-vindo
        <?php echo $_SESSION['nome_cliente'] . ' ' . $_SESSION['sobrenome_cliente']; ?>
      </h1>

      <form action="PHP/proc_edit_usuario.php" method="post">
        <div id="div_dados_conta">
          <h5><img src="img/gear.svg" alt=""> Dados da Conta</h5>
          <label>Email:</label>
          <input type="text" disabled value="<?php echo $_SESSION['email_cliente']; ?>">
        </div>
        <div id="div_dados_pessoais">
          <h5><img src="img/pessoa.svg" alt=""> Dados Pessoais</h5>
          <label>Nome completo:</label>
          <input type="text" disabled
            value="<?php echo $_SESSION['nome_cliente'] . ' ' . $_SESSION['sobrenome_cliente']; ?>">
          <br>
          <label>CPF:</label>
          <input type="text" disabled value="<?php echo $_SESSION['cpf_cliente']; ?>">
          <br>
          <label>Data de nascimento:</label>
          <input type="date" disabled value="<?php echo $_SESSION['datanasci_cliente']; ?>">
          <br>
          <label>RG:</label>
          <input type="text" disabled value="<?php echo $_SESSION['rg_cliente']; ?>">
          <br>
          <label>Celular:</label>
          <input type="text" name="celular_cliente" value="<?php echo $_SESSION['celular_cliente']; ?>">
        </div>

        <div id="div_endereco">
          <h5><img src="img/geo-alt-fill.svg" alt=""> Endereço</h5>
          <label>CEP:</label>
          <input type="text" name="cep_cliente" value="<?php echo $_SESSION['cep_cliente']; ?>">
          <br>
          <label>Rua:</label>
          <input type="text" name="rua_cliente" value="<?php echo $_SESSION['rua_cliente']; ?>">
          <br>
          <label>Número:</label>
          <input type="text" name="numero_cliente" value="<?php echo $_SESSION['numero_cliente']; ?>">
          <br>
          <label>Bairro:</label>
          <input type="text" name="bairro_cliente" value="<?php echo $_SESSION['bairro_cliente']; ?>">
          <br>
          <label>Cidade:</label>
          <input type="text" name="cidade_cliente" value="<?php echo $_SESSION['cidade_cliente']; ?>">
          <br>
          <label>UF:</label>
          <input type="text" maxlength="2" name="uf_cliente" value="<?php echo $_SESSION['uf_cliente']; ?>">
        </div>
        <div style="width: 93%; display: flex; justify-content: flex-end; margin-bottom: 100px; margin-top: 10px;">
          <button type="submit"
            style="width: 200px; background-color: #460AC6; color: white !important; border-radius: 5px; box-shadow: 1px 1px 2px 2px rgba(49, 49, 49, 0.3);">Salvar
            alterações</button>
        </div>
      </form>

      <div id="div_alterar_senha">
        <h5>Alterar senha</h5>
        <p>Defina uma nova senha de acesso á sua conta.</p>

        <!-- Button trigger modal -->
        <button type="SUBMIT" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Alterar senha
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="PHP/proc_editar_senha.php" method="post">
                <div class="modal-body">
                  <label>Nova senha:</label> <br>
                  <input name="senha_cliente" type="password">
                </div>
                <div class="modal-footer">
                  <button id="btn-cancel" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button id="btn-accept" type="submit" class="btn btn-success">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!--FIM CONTEÚDO-->

  <!--INICIO RODAPÉ-->
  <div id="rodape" class="container-fluid">
    <div id="linha" class="row">

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