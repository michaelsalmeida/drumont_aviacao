<?php
session_start();
include_once('PHP/conexao.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DUMONT - Passagens Aéreas</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reserva.css">
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
              <a style="color: #460AC6;" class="nav-link" href="contato.php"> <img id="icon_tel"
                  src="img/telephone.svg" alt="Ícone Telefone"> Contato</a>
            </li>

            <?php
                            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login']) ) {
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

  <!--Formulário para reserva passagens-->
  <main class="container my-5">
    <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
    <form action="php/proc_reserva.php" method="post">
      <div class="row">
        <div id="informacao_viagem" class="col-md-3">
          <label for="partida" class="form-label">Seu local de partida</label>
          <select name="partida" id="partida" class="form-control" required>
            <option value="">Sua partida</option>
            <option value="Aeroporto de São Paulo/Congonhas (CGH)">Aeroporto de São Paulo/Congonhas (CGH)</option>
            <option value="Aeroporto Internacional de Guarulhos (GRU)">Aeroporto Internacional de Guarulhos (GRU)
            </option>
            <option value="Aeroporto do campo de marte (RTE)">Aeroporto do campo de marte (RTE)</option>
            <option value="Aeroporto Internacional Tom Jobim/Galeão (GIG)">Aeroporto Internacional Tom Jobim/Galeão
              (GIG)</option>
            <option value="Aeroporto Santos Dumont (SDU)">Aeroporto Santos Dumont (SDU)</option>
            <option value="Aeroporto Internacional De Confins - Tancredo Neves (CNF)">Aeroporto Internacional De Confins
              - Tancredo Neves (CNF)</option>
            <option value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">Aeroporto
              Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)</option>
            <option value="Aeroporto Jorge Amado/Ilhéus (IOS)">Aeroporto Jorge Amado/Ilhéus (IOS)</option>
            <option value="Aeroporto de Teresina - Senador Petrônio Portela (SBTE)">Aeroporto de Teresina - Senador
              Petrônio Portela (SBTE)</option>
            <option value="Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)">Aeroporto
              Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)</option>
            <option value="Aeroporto Internacional De Aracaju - Santa Maria (AJU)">Aeroporto Internacional De Aracaju -
              Santa Maria (AJU)</option>
            <option value="Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)">Aeroporto Internacional de
              Maceió - Zumbi Dos Palmares (MCZ)</option>
            <option value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">Aeroporto Internacional
              de Recife/Guararapes-Gilberto Freyre (REC)</option>
            <option value="Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)">Aeroporto
              Internacional de João Pessoa - Presidente Castro Pinto (JPA)</option>
            <option value="Aeroporto De Campina Grande - João Suassuna (CPV)">Aeroporto De Campina Grande - João
              Suassuna (CPV)</option>
            <option value="Aeroporto Internacional de Natal (NAT)">Aeroporto Internacional de Natal (NAT)</option>
            <option value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">Aeroporto Internacional De
              Fortaleza - Pinto Martins (FOR)</option>
            <option value="Aeroporto Internacional Marechal Cunha Machado (SLZ)">Aeroporto Internacional Marechal Cunha
              Machado (SLZ)</option>
            <option value="Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)">Aeroporto Internacional
              de Santarém - Maestro Wilson Fonseca (STM)</option>
            <option value="Aeroporto Internacional de Tabatinga (TBT)">Aeroporto Internacional de Tabatinga (TBT)
            </option>
            <option value="Aeroporto internacional de Manaus - Eduardo Gomes (MAO)">Aeroporto internacional de Manaus -
              Eduardo Gomes (MAO)</option>
            <option value="Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)">Aeroporto internacional
              de Boa Vista - Atlas Brasil Cantanhede (BVB)</option>
            <option value="Aeroporto Internacional de Cruzeiro do Sul(CZS)">Aeroporto Internacional de Cruzeiro do
              Sul(CZS)</option>
            <option value="Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)">Aeroporto Internacional de
              Rio Branco - Plácido De Castro(RBR)</option>
            <option value="Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)">
              Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)</option>
            <option value="Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)">Aeroporto Internacional de Cuiabá
              - Marechal Rondon (CGB)</option>
            <option value="Aeroporto Internacional de Campo Grande (CGR)">Aeroporto Internacional de Campo Grande (CGR)
            </option>
            <option value="Aeroporto Internacional de Corumbá (CMG)">Aeroporto Internacional de Corumbá (CMG)</option>
            <option value="Aeroporto Internacional Afonso Pena - Curitiba (CWB)">Aeroporto Internacional Afonso Pena -
              Curitiba (CWB)</option>
            <option value="Aeroporto de Londrina Gov. Jose Richa (LDB)">Aeroporto de Londrina Gov. Jose Richa (LDB)
            </option>
            <option value="Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)">Aeroporto Internacional de
              Florianópolis - Hercílio Luz (FLN)</option>
            <option value="Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)">Aeroporto Internacional
              de Navegantes - Ministro Victor Konder (NTV)</option>
            <option value="Aeroporto Internacional Porto Alegre Salgado Filho (POA)">Aeroporto Internacional Porto
              Alegre Salgado Filho (POA)</option>
            <option value="Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)">Aeroporto Internacional de
              Pelotas - João Simões Lopez Neto (PET)</option>
            <option value="Aeroporto Internacional Eurico de Aguiar Sales (VIX)">Aeroporto Internacional Eurico de
              Aguiar Sales (VIX)</option>
            <option value="Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)">Aeroporto Internacional De Goiânia
              - Santa Genoveva (GYN)</option>
            <option value="Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)">Aeroporto
              Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)</option>
            <option value="Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)">Aeroporto Internacional De
              Macapá - Alberto Alcolumbre (MCP)</option>
            <option value="Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)">Aeroporto
              Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)</option>
            <option value="nada">nada</option>
          </select>
        </div>

        <div id="informacao_viagem" class="col-md-3">
          <label for="destino" class="form-label">Seu destino</label>
          <select name="destino" id="destino" class="form-control" required>
            <option value="">Seu destino</option>
            <option value="Aeroporto de São Paulo/Congonhas (CGH)">Aeroporto de São Paulo/Congonhas (CGH)</option>
            <option value="Aeroporto Internacional de Guarulhos (GRU)">Aeroporto Internacional de Guarulhos (GRU)
            </option>
            <option value="Aeroporto do campo de marte (RTE)">Aeroporto do campo de marte (RTE)</option>
            <option value="Aeroporto Internacional Tom Jobim/Galeão (GIG)">Aeroporto Internacional Tom Jobim/Galeão
              (GIG)</option>
            <option value="Aeroporto Santos Dumont (SDU)">Aeroporto Santos Dumont (SDU)</option>
            <option value="Aeroporto Internacional De Confins - Tancredo Neves (CNF)">Aeroporto Internacional De Confins
              - Tancredo Neves (CNF)</option>
            <option value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">Aeroporto
              Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)</option>
            <option value="Aeroporto Jorge Amado/Ilhéus (IOS)">Aeroporto Jorge Amado/Ilhéus (IOS)</option>
            <option value="Aeroporto de Teresina - Senador Petrônio Portela (SBTE)">Aeroporto de Teresina - Senador
              Petrônio Portela (SBTE)</option>
            <option value="Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)">Aeroporto
              Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)</option>
            <option value="Aeroporto Internacional De Aracaju - Santa Maria (AJU)">Aeroporto Internacional De Aracaju -
              Santa Maria (AJU)</option>
            <option value="Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)">Aeroporto Internacional de
              Maceió - Zumbi Dos Palmares (MCZ)</option>
            <option value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">Aeroporto Internacional
              de Recife/Guararapes-Gilberto Freyre (REC)</option>
            <option value="Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)">Aeroporto
              Internacional de João Pessoa - Presidente Castro Pinto (JPA)</option>
            <option value="Aeroporto De Campina Grande - João Suassuna (CPV)">Aeroporto De Campina Grande - João
              Suassuna (CPV)</option>
            <option value="Aeroporto Internacional de Natal (NAT)">Aeroporto Internacional de Natal (NAT)</option>
            <option value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">Aeroporto Internacional De
              Fortaleza - Pinto Martins (FOR)</option>
            <option value="Aeroporto Internacional Marechal Cunha Machado (SLZ)">Aeroporto Internacional Marechal Cunha
              Machado (SLZ)</option>
            <option value="Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)">Aeroporto Internacional
              de Santarém - Maestro Wilson Fonseca (STM)</option>
            <option value="Aeroporto Internacional de Tabatinga (TBT)">Aeroporto Internacional de Tabatinga (TBT)
            </option>
            <option value="Aeroporto internacional de Manaus - Eduardo Gomes (MAO)">Aeroporto internacional de Manaus -
              Eduardo Gomes (MAO)</option>
            <option value="Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)">Aeroporto internacional
              de Boa Vista - Atlas Brasil Cantanhede (BVB)</option>
            <option value="Aeroporto Internacional de Cruzeiro do Sul(CZS)">Aeroporto Internacional de Cruzeiro do
              Sul(CZS)</option>
            <option value="Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)">Aeroporto Internacional de
              Rio Branco - Plácido De Castro(RBR)</option>
            <option value="Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)">
              Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)</option>
            <option value="Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)">Aeroporto Internacional de Cuiabá
              - Marechal Rondon (CGB)</option>
            <option value="Aeroporto Internacional de Campo Grande (CGR)">Aeroporto Internacional de Campo Grande (CGR)
            </option>
            <option value="Aeroporto Internacional de Corumbá (CMG)">Aeroporto Internacional de Corumbá (CMG)</option>
            <option value="Aeroporto Internacional Afonso Pena - Curitiba (CWB)">Aeroporto Internacional Afonso Pena -
              Curitiba (CWB)</option>
            <option value="Aeroporto de Londrina Gov. Jose Richa (LDB)">Aeroporto de Londrina Gov. Jose Richa (LDB)
            </option>
            <option value="Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)">Aeroporto Internacional de
              Florianópolis - Hercílio Luz (FLN)</option>
            <option value="Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)">Aeroporto Internacional
              de Navegantes - Ministro Victor Konder (NTV)</option>
            <option value="Aeroporto Internacional Porto Alegre Salgado Filho (POA)">Aeroporto Internacional Porto
              Alegre Salgado Filho (POA)</option>
            <option value="Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)">Aeroporto Internacional de
              Pelotas - João Simões Lopez Neto (PET)</option>
            <option value="Aeroporto Internacional Eurico de Aguiar Sales (VIX)">Aeroporto Internacional Eurico de
              Aguiar Sales (VIX)</option>
            <option value="Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)">Aeroporto Internacional De Goiânia
              - Santa Genoveva (GYN)</option>
            <option value="Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)">Aeroporto
              Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)</option>
            <option value="Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)">Aeroporto Internacional De
              Macapá - Alberto Alcolumbre (MCP)</option>
            <option value="Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)">Aeroporto
              Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)</option>
            <option value="noda">noda</option>
          </select>
        </div>

        <div id="informacao_viagem" class="col-md-2">
          <label for="data_ida" class="form-label">Ida</label>
          <input type="date" name="data_ida" id="data_ida" class="form-control" min="<?php echo date('Y-m-d'); ?>"
            required>
        </div>

        <div id="informacao_viagem" class="col-md-2">
          <label id="txt_voltar" for="data_volta" class="form-label">Volta</label>
          <input type="date" name="data_volta" id="data_volta" class="form-control" min="<?php echo date('Y-m-d'); ?>"
            required>
        </div>

        <div id="informacao_viagem" class="col-md-1">
          <label for="qtd_passagem" class="form-label">Qtd.</label>
          <input type="number" name="qtd_passagem" id="qtd_passagem" min="1" max="8" class="form-control" required>
        </div>
      </div>

      <div id="informacao_viagem mt-2">
        <input type="checkbox" name="apenas_ida" id="apenas_ida" class="form-check-input">
        <label for="apenas_ida" class="form-check-label">Somente ida</label>
      </div>

      <button id="botao_buscar_viagem" type="submit"
        class="btn text-uppercase text-white fw-bold mt-2 w-50">buscar</button>
    </form>
  </main>

  <div id="sessao2" style="height: 100vh;">
    <h2 style="color: #460AC6; font-weight: bold; margin: 25px;">Destinos mais buscados</h2>

    <div class="container">
      <!--CARROSEL DE IMAGENS-->
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>

          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>

          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
            aria-label="Slide 5"></button>

        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/img_salvador.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/bh.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/maceio.jpg" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="img/recife2.jpg" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="img/rj.jpg" class="d-block w-100" alt="...">
          </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!--FIM DO CARROSEL-->
    </div>
  </div>

  <div id="sessao3">
    <div style="padding: 10px;" class="container-fluid">
      <h1 style="color: white; margin: 25px; text-align: center; background-color: transparent;">Veja algumas ofertas
      </h1>
      <div class="row">

        <div class="col-md">

          <div class="card">
            <img src="img/fortazleza_promo.jpeg" class="card-img-top" style="width: 100%; height: 200px;" alt="...">
            <div class="card-body">
              <h5 style="padding: 5px; background-color: red; color: white; display: inline-block; border-radius: 10px;"
                class="card-title">OFERTA IMPERDÍVEL</h5>

              <h2>Fortaleza</h2>
              <p class="card-text">IDA E VOLTA</p>

              <div
                style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <h1 style="background-color: transparent; color: black;">R$600</h1>
                <form action="reserva.php" method="post">
                  <input type="hidden" name="oferta_viagem"
                    value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">
                  <button style="width: 200px !important; background-color: #460AC6; color: white;" id="botao_card_oferta" class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                    type="submit">comprar</button>
                </form>
              </div>

            </div>
          </div>

        </div>

        <div class="col-md">
          <div class="card">
            <img src="img/pelourinho.jpeg" class="card-img-top" style="width: 100%; height: 200px;" alt="...">
            <div class="card-body">
              <h5 style="padding: 5px; background-color: red; color: white; display: inline-block; border-radius: 10px;"
                class="card-title">OFERTA IMPERDÍVEL</h5>

              <h2>Salvador</h2>
              <p class="card-text">IDA E VOLTA</p>

              <div
                style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <h1 style="background-color: transparent; color: black;">R$600</h1>
                <form action="reserva.php" method="post">
                  <input type="hidden" name="oferta_viagem"
                    value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">
                  <button style="width: 200px !important;  background-color: #460AC6; color: white;" id="botao_card_oferta" class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                    type="submit">comprar</button>
                </form>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card">
            <img src="img/recife_promo.jpeg" class="card-img-top" style="width: 100%; height: 200px;" alt="...">
            <div class="card-body">
              <h5 style="padding: 5px; background-color: red; color: white; display: inline-block; border-radius: 10px;"
                class="card-title">OFERTA IMPERDÍVEL</h5>

              <h2>Recife</h2>
              <p class="card-text">IDA E VOLTA</p>

              <div
                style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <h1 style="background-color: transparent; color: black;">R$600</h1>
                <form action="reserva.php" method="post">
                  <input type="hidden" name="oferta_viagem"
                    value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">
                  <button style="width: 200px !important; background-color: #460AC6; color: white;" id="botao_card_oferta" class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                    type="submit">comprar</button>
                </form>
              </div>

            </div>
          </div>
        </div>

        <div style="width: 100%; display: flex; justify-content: center;" class="d-grid gap-2 mx-auto m-5">
          <a href="ofertas.php"><button style="width: 50vw;" class="btn btn-warning" type="button">Veja mais
              ofertas</button></a>
        </div>

      </div>
    </div>
  </div>

  <div id="sobre" class="container-fluid">
    <div class="row">

      <div id="txt_home1" class="col-sm-6 p-5">
        <h2>Quem somos?</h2>
        <p>A Dumont é uma empresa de venda de passagens aéreas que oferece destinos variados, atendimento personalizado
          e tarifas competitivas. Viaje com tranquilidade e segurança escolhendo a Dumont para comprar suas passagens
          aéreas.</p>
      </div>

      <div id="txt_home2" class="col-sm p-5">
        <h2>Por que comprar na DUMONT?</h2>
        <p>Comprar na Dumont é a melhor escolha para quem busca qualidade, segurança e comodidade na compra de passagens
          aéreas. Com tarifas competitivas, ampla variedade de destinos e atendimento personalizado, a Dumont garante
          uma experiência de viagem única e inesquecível.</p>
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
  <script src="js/reserva.js"></script>
</body>

</html>