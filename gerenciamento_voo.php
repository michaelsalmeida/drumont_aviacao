<?php
    session_start();
    include_once('php/conexao.php');
    
    $pk_aviao = filter_input(INPUT_GET, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);

    $_SESSION['pk_aviao'] = $pk_aviao;
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento dos Vôos</title>
    <link rel="stylesheet" href="css/style(gerenciamento).css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
</head>
<body>
  <header>  
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
  </header> 
    <main>
        <form method="post" action="php/proc_gerenciamento_voo.php">
  <div  id ="box" class=" mb-3">
    <h1>ESPECIFIQUE AS INFORMAÇÕES DO VÔO</h1>
    <div class="row">
      <div class="col">
        <label>Local de Decolagem</label>
        <select class="form-select" id="input" name="decolagem_enviar" aria-label="Default select example">
          <option selected>Lista de Aeroportos</option>
          <option value="Aeroporto de São Paulo/Congonhas (CGH)">Aeroporto de São Paulo/Congonhas (CGH)</option>
          <option value="Aeroporto Internacional de Guarulhos (GRU)">Aeroporto Internacional de Guarulhos (GRU)</option>
          <option value="Aeroporto do campo de marte (RTE)">Aeroporto do campo de marte (RTE)</option>
          <option value="Aeroporto Internacional Tom Jobim/Galeão (GIG)">Aeroporto Internacional Tom Jobim/Galeão (GIG)</option>
          <option value="Aeroporto Santos Dumont (SDU)">Aeroporto Santos Dumont (SDU)</option>
          <option value="Aeroporto Internacional De Confins - Tancredo Neves (CNF)">Aeroporto Internacional De Confins - Tancredo Neves (CNF)</option>
          <option value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)</option>
          <option value="Aeroporto Jorge Amado/Ilhéus (IOS)">Aeroporto Jorge Amado/Ilhéus (IOS)</option>
          <option value="Aeroporto de Teresina - Senador Petrônio Portela (SBTE)">Aeroporto de Teresina - Senador Petrônio Portela (SBTE)</option>
          <option value="Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)">Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)</option>
          <option value="Aeroporto Internacional De Aracaju - Santa Maria (AJU)">Aeroporto Internacional De Aracaju - Santa Maria (AJU)</option>
          <option value="Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)">Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)</option>
          <option value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)</option>
          <option value="Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)">Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)</option>
          <option value="Aeroporto De Campina Grande - João Suassuna (CPV)">Aeroporto De Campina Grande - João Suassuna (CPV)</option>
          <option value="Aeroporto Internacional de Natal (NAT)">Aeroporto Internacional de Natal (NAT)</option>
          <option value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)</option>
          <option value="Aeroporto Internacional Marechal Cunha Machado (SLZ)">Aeroporto Internacional Marechal Cunha Machado (SLZ)</option>
          <option value="Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)">Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)</option>
          <option value="Aeroporto Internacional de Tabatinga (TBT)">Aeroporto Internacional de Tabatinga (TBT)</option>
          <option value="Aeroporto internacional de Manaus - Eduardo Gomes (MAO)">Aeroporto internacional de Manaus - Eduardo Gomes (MAO)</option>
          <option value="Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)">Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)</option>
          <option value="Aeroporto Internacional de Cruzeiro do Sul(CZS)">Aeroporto Internacional de Cruzeiro do Sul(CZS)</option>
          <option value="Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)">Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)</option>
          <option value="Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)">Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)</option>
        </select>
      </div>
      <div class="col">
        <label>Local de Pouso</label>
        <select class="form-select" id="input" name="pouso_enviar" aria-label="Default select example">
          <option selected>Lista de Aeroportos</option>
          <option value="Aeroporto de São Paulo/Congonhas (CGH)">Aeroporto de São Paulo/Congonhas (CGH)</option>
          <option value="Aeroporto Internacional de Guarulhos (GRU)">Aeroporto Internacional de Guarulhos (GRU)</option>
          <option value="Aeroporto do campo de marte (RTE)">Aeroporto do campo de marte (RTE)</option>
          <option value="Aeroporto Internacional Tom Jobim/Galeão (GIG)">Aeroporto Internacional Tom Jobim/Galeão (GIG)</option>
          <option value="Aeroporto Santos Dumont (SDU)">Aeroporto Santos Dumont (SDU)</option>
          <option value="Aeroporto Internacional De Confins - Tancredo Neves (CNF)">Aeroporto Internacional De Confins - Tancredo Neves (CNF)</option>
          <option value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)</option>
          <option value="Aeroporto Jorge Amado/Ilhéus (IOS)">Aeroporto Jorge Amado/Ilhéus (IOS)</option>
          <option value="Aeroporto de Teresina - Senador Petrônio Portela (SBTE)">Aeroporto de Teresina - Senador Petrônio Portela (SBTE)</option>
          <option value="Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)">Aeroporto Internacional de Parnaíba/Prefeito Dr. João Silva Filho (PHB)</option>
          <option value="Aeroporto Internacional De Aracaju - Santa Maria (AJU)">Aeroporto Internacional De Aracaju - Santa Maria (AJU)</option>
          <option value="Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)">Aeroporto Internacional de Maceió - Zumbi Dos Palmares (MCZ)</option>
          <option value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)</option>
          <option value="Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)">Aeroporto Internacional de João Pessoa - Presidente Castro Pinto (JPA)</option>
          <option value="Aeroporto De Campina Grande - João Suassuna (CPV)">Aeroporto De Campina Grande - João Suassuna (CPV)</option>
          <option value="Aeroporto Internacional de Natal (NAT)">Aeroporto Internacional de Natal (NAT)</option>
          <option value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)</option>
          <option value="Aeroporto Internacional Marechal Cunha Machado (SLZ)">Aeroporto Internacional Marechal Cunha Machado (SLZ)</option>
          <option value="Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)">Aeroporto Internacional de Santarém - Maestro Wilson Fonseca (STM)</option>
          <option value="Aeroporto Internacional de Tabatinga (TBT)">Aeroporto Internacional de Tabatinga (TBT)</option>
          <option value="Aeroporto internacional de Manaus - Eduardo Gomes (MAO)">Aeroporto internacional de Manaus - Eduardo Gomes (MAO)</option>
          <option value="Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)">Aeroporto internacional de Boa Vista - Atlas Brasil Cantanhede (BVB)</option>
          <option value="Aeroporto Internacional de Cruzeiro do Sul(CZS)">Aeroporto Internacional de Cruzeiro do Sul(CZS)</option>
          <option value="Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)">Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)</option>
          <option value="Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)">Aeroporto Internacional de Porto Velho - Governador Jorge Teixeira de Oliveira (PVH)</option>
        </select>
      </div>
    </div>    
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label class="form-label">Horário de Saída</label>
          <input type="datetime-local" name="saida_enviar" class="form-control" id="input">
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <label class="form-label">Horário de Chegada</label>
          <input type="datetime-local" name="chegada_enviar" class="form-control" id="input">
        </div>
      </div>
    </div>
  <button type="submit" style="background-color:#460AC6" class="btn btn-primary">Enviar</button>
  </div>
</form>
</main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>