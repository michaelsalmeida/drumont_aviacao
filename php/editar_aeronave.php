<?php
session_start();
include_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aeronaves</title>
    <link rel="stylesheet" href="../css/editar_aeronaves.css">
    <link rel="stylesheet" href="../CSS/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
</head>
<body>
<header>
  <!--INICIO BARRA DE NAVEGAÇÃO-->
  <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="../home_adm.php"><img id="logo_navbar_dumont" width="150"
          src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
          <a style="color: white;" id="link_nav1" class="nav-link" href="relatorio.php">Relatorios</a>
          <a style="color: white;" id="link_nav2" class="nav-link" href="../inserir_aeronave.php">Inserir aviões</a>
          <a style="color: white;" id="link_nav3" class="nav-link" href="listar_aeronaves.php">Lista de aeronaves</a>
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

<main> 
        
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    //nesse codigo é passado as informações do formulario para a edição da aeronave 
    $pk_aviao = filter_input(INPUT_GET, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);

    $result_aviao = "SELECT * FROM aviao WHERE pk_aviao = '$pk_aviao'";
    $resultado_aviao = mysqli_query($conn, $result_aviao);
    $row_aviao = mysqli_fetch_assoc($resultado_aviao);


    ?>

        <div id="box" >
        <div class="row">
            <div class="col">
                <label>ID: </label>
                <?php echo $row_aviao['pk_aviao']; ?> <br>
                <label>Número de série: </label>
                <?php echo $row_aviao['num_serie'];?> <br>
                <label>Modelo: </label>
                <?php echo $row_aviao['modelo'];?> <br><br>

            <form action="proc_edit_aeronave.php" method="post">
                        <input type="hidden" name="pk_aviao" value= "<?php echo $row_aviao['pk_aviao']; ?>">
                        <input type="hidden" name="num_serie" value="<?php echo $row_aviao['num_serie'];?>">                      
                        <input type="hidden" name="modelo" value="<?php echo $row_aviao['modelo'];?>"> 
                        <label>Operação: </label>
                        <input type="number" placeholder="Informe os status atual da aeronave" id="operacao" name="operacao" min="0" max="1" required value="<?php echo $row_aviao['operacao'];?>"> <br><br>
                        
                    
                        <input type="submit" value="SALVAR" id="salvar">
                            </form>
                            <br>
                            <form action="dispensar_aeronave.php" method="post">
                            <input type="hidden" name="pk_aviao" value= "<?php echo $row_aviao['pk_aviao']; ?>">
                            <input type="hidden" name="num_serie" value="<?php echo $row_aviao['num_serie'];?>">                      
                            <input type="hidden" name="modelo" value="<?php echo $row_aviao['modelo'];?>"> 
                                
                             <input type="submit" id="dispensar" value="DISPENSAR">
                            </form>
                       
            </div>

        </div>
             
        
        </div>

</main>
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
                    <a class="text-white text-decoration-none" href="https://www.latamairlines.com/br/pt/ofertas/megapromo?utm_source=bing&utm_medium=sem&utm_campaign=br_latam_bing_sem_perf_aon-bro-exa-brand_lower&utm_content=br_latam_perf_bing_aon-bro-exa-brand_no-target_NNN-NNN_nnn_conversion_text-link_20221026_lower_latam&gclid=ecfa87d3def11c847630e3e896f6c55e&gclsrc=3p.ds&msclkid=ecfa87d3def11c847630e3e896f6c55e&utm_term=latam">Latam</a>
                    <br>
                    <a class="text-white text-decoration-none" href="https://www.voegol.com.br/?gclid=1bf10da3dad91b3eaf3f699892f24891&gclsrc=3p.ds&msclkid=1bf10da3dad91b3eaf3f699892f24891&utm_source=bing&utm_medium=cpc&utm_campaign=alp_varejo-nac_bing_search_conversao_branding-termosgol-nu-br-pt&utm_term=gol&utm_content=cpc_rede-de-pesquisa_texto_marca">Gol</a>
                    <br>
                    <a class="text-white text-decoration-none" href="https://www.passagensaereas.com.br/passagens-aereas/companhiasaereas/azul-linhas-aereas?msclkid=8bfa2f521a4f1f312f764b695202c7ca&utm_source=bing&utm_medium=cpc&utm_campaign=PA_CI_AZUL&utm_term=azul%20linhas%20a%C3%A9reas&utm_content=G-%20Geral">Azul</a>
                </div>
                
                <div class="col-sm">
                    <p><strong>Redes Socias</strong></p>
                    
                    <a class="text-white text-decoration-none" href="#"><img src="../img/instagram.svg" alt="Ícone do Instagram">Instagram</a>
                    <br>
                    <a class="text-white text-decoration-none" href="#"><img src="../img/facebook.svg" alt="Ícone do Facebook"> Facebook</a>
                    <br>
                    <a class="text-white text-decoration-none" href="#"><img src="../img/twitter.svg" alt="Ícone do Twitter"> Twitter</a>
                </div>   
            </div>
        </div>
        <!-- FIM RODAPÉ -->
    </footer>
</body>
</html>