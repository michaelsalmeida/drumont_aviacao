<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['verifica_login'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: ../login.php");
    exit;
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUMONT - Minhas viagens</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
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
  <!--FIM BARRA DE NAVEGAÇÃO-->

    <!--CONTEÚDO PRINCIPAL DA PÁGINA-->
    <div class="container">
        <h1 class="text-uppercase text-center fw-bold pt-5">relatório</h1><hr>
    </div>

    <div
        style="width: 100%; min-height: 100vh; padding: 20px; display: flex; flex-direction: column; align-items:center;">

        <form action="<?php echo "$_SERVER[PHP_SELF]"; ?>" method="get">


            <label for="data">Selecione uma data:</label><br>
            <input style="padding: 5px; margin: 5px;" type="date" name="data" id="data" required>

            <select style="padding: 7px; border-radius: 5px;" name="estados">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>

            <button style="width: 130px; padding: 7px; border: none; color: white ;background-color: #460AC6; margin: 5px;" type="submit">Buscar</button>

            <br>
            <br>

        </form>


        <?php

        $estado = $_GET['estados'] ?? '';

        $data = $_GET['data'] ?? '';

        if (!empty($estado)) {

            // Compras realizadas no estado
            $sql = "SELECT COUNT(*) AS total FROM passagem INNER JOIN pagamento ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(pagamento.data_pag)= '$data' AND aeroportos.estado = '$estado'";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);
            echo "<h5> compras realizadas no dia " . date('d/m/Y', strtotime($data)) . " em $estado: $resultado[total] </h5>";

            // Quantidade de avioes com destino de tal estado
        
            $sql = "SELECT COUNT(*) AS total FROM passagem INNER JOIN pagamento ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(gestao_voo.hora_partida)= '$data' AND aeroportos.estado = '$estado'";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);

            echo "<h5> Quantidade de voos que saíram de $estado: $resultado[total] </h5>";

            // Cancelamentos referente ao estado
            $sql = "SELECT COUNT(*) AS total FROM passagem INNER JOIN pagamento ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN  aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(passagem.data_cancel)= '$data' AND aeroportos.estado = '$estado' AND passagem.cancelado = 'SIM' ";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);
            echo "<h5> Cancelamentos em $estado: $resultado[total] </h5>";

            // Total de Cancelamentos referente a data específica
            $sql = "SELECT COUNT(*) AS total FROM passagem INNER JOIN pagamento ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN  aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(passagem.data_cancel)= '$data' AND passagem.cancelado = 'SIM' ";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);
            echo "<h5>Total de  Cancelamentos na data $data: $resultado[total] </h5>";

            // faturamento total do estado específico
            $sql = "SELECT SUM(valor_pag) AS total FROM pagamento INNER JOIN passagem ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN  aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(pagamento.data_pag)= '$data' AND aeroportos.estado = '$estado'";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);
            echo "<h5> Faturamento total em $estado: $resultado[total] </h5>";

            // Fauturamento total do dia
            $sql = "SELECT SUM(valor_pag) AS total FROM pagamento INNER JOIN passagem ON passagem.pk_passagem = pagamento.fk_passagem INNER JOIN  aviao ON aviao.pk_aviao = passagem.aviao_ida INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao INNER JOIN aeroportos ON aeroportos.pk_aeroportos = gestao_voo.fk_aeroportos WHERE DATE(pagamento.data_pag)= '$data'";

            $query = mysqli_query($conn, $sql);

            $resultado = mysqli_fetch_assoc($query);
            echo "<h5> Faturamento total do dia: $resultado[total] </h5>";

        }

        ?>
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