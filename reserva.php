<?php
session_start();
include_once('php/conexao.php');

// Limpando as sessões
// $_SESSION['partida'] = array();
// $_SESSION['destino'] = array();
// $_SESSION['data_partida'] = array();
// $_SESSION['data_retorno'] = array();
// $_SESSION['qtd_passagem'] = array();
// $_SESSION['partida'] = array();
// $_SESSION['destino'] = array();
// $_SESSION['data_partida'] = array();
// $_SESSION['data_retorno'] = array();
// $_SESSION['qtd_passagem'] = array();
// $_SESSION['aviao_ida'] = array();
// $_SESSION['retorno'] = array();
// $_SESSION['preco_total'] = array();
// $_SESSION['num_cartao'] = array();
// $_SESSION['nome_titular'] = array();
// $_SESSION['mes'] = array();
// $_SESSION['ano'] = array();
// $_SESSION['cvv'] = array();
// $_SESSION['cpf_pag'] = array();

// for($esvaziar = 1; $esvaziar <= $_SESSION['qtd_passagem']; $esvaziar++){
//     $_SESSION["assento$esvaziar"] = array();
//     $_SESSION["msg_assento$esvaziar"] = array();
//     $_SESSION["assento_retorno$esvaziar"] = array();
//     $_SESSION["msg_assento_retorno$esvaziar"] = array();
//     $_SESSION["passageiro_ida$esvaziar"] = array();
//     $_SESSION["passageiro_retorno$esvaziar"] = array();
//     $_SESSION["passageiro_nome$esvaziar"] = array();
//     $_SESSION["msg_nome$esvaziar"] = array();
//     $_SESSION["passageiro_sobrenome$esvaziar"] = array();
//     $_SESSION["passageiro_cpf$esvaziar"] = array();
//     $_SESSION["msg_cpf$esvaziar"] = array();
//     $_SESSION["nome_passagem$esvaziar"] = array();
//     $_SESSION["sobrenome_passagem$esvaziar"] = array();
//     $_SESSION["cpf_passagem$esvaziar"] = array();
//     $_SESSION["assento_passagem_ida$esvaziar"] = array();
//     $_SESSION["assento_passagem_volta$esvaziar"] = array();
// }

// $qtd_passagens = "SELECT COUNT(*) AS qtd_registro FROM passagem";
// $executar_contagem = mysqli_query($conn, $qtd_passagens);
// $num_passagem = mysqli_fetch_assoc($executar_contagem);

// for($esvaziar = 1; $esvaziar <= $num_passagem['qtd_registro']; $esvaziar++){
//     $_SESSION["poltrona_cliente$esvaziar"] = array();
//     $_SESSION["poltrona_retorno_cliente$esvaziar"] = array();
// }

// $_SESSION['qtd_passagem'] = array();



$oferta_viagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oferta_viagem = filter_input(INPUT_POST, 'oferta_viagem', FILTER_SANITIZE_STRING);
} else {
    $oferta_viagem = '';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reserva.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - reservar</title>
</head>

<body>
    <header>
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
        <!-- <h1 class="text-uppercase p-2">voos disponíveis para essa viagem</h1> -->
    </header>


    <main id="container_viagem" class="container pb-5 my-5">
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
                        <option value="Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)">Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)</option>
                        <option value="Aeroporto Internacional de Campo Grande (CGR)">Aeroporto Internacional de Campo Grande (CGR)</option>
                        <option value="Aeroporto Internacional de Corumbá (CMG)">Aeroporto Internacional de Corumbá (CMG)</option>
                        <option value="Aeroporto Internacional Afonso Pena - Curitiba (CWB)">Aeroporto Internacional Afonso Pena - Curitiba (CWB)</option>
                        <option value="Aeroporto de Londrina Gov. Jose Richa (LDB)">Aeroporto de Londrina Gov. Jose Richa (LDB)</option>
                        <option value="Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)">Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)</option>
                        <option value="Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)">Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)</option>
                        <option value="Aeroporto Internacional Porto Alegre Salgado Filho (POA)">Aeroporto Internacional Porto Alegre Salgado Filho (POA)</option>
                        <option value="Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)">Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)</option>
                        <option value="Aeroporto Internacional Eurico de Aguiar Sales (VIX)">Aeroporto Internacional Eurico de Aguiar Sales (VIX)</option>
                        <option value="Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)">Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)</option>
                        <option value="Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)">Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)</option>
                        <option value="Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)">Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)</option>
                        <option value="Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)">Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)</option>
                        <option value="nada">nada</option>
                    </select>
                </div>

                <div id="informacao_viagem" class="col-md-3">
                    <label for="destino" class="form-label">Seu destino</label>
                    <select name="destino" id="destino" class="form-control" required>
                        <option value="<?php echo $oferta_viagem; ?>"><?php if ($oferta_viagem == '') {
                                                                            echo 'Seu destino';
                                                                        } else {
                                                                            echo $oferta_viagem;
                                                                        } ?></option>
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
                        <option value="Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)">Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)</option>
                        <option value="Aeroporto Internacional de Campo Grande (CGR)">Aeroporto Internacional de Campo Grande (CGR)</option>
                        <option value="Aeroporto Internacional de Corumbá (CMG)">Aeroporto Internacional de Corumbá (CMG)</option>
                        <option value="Aeroporto Internacional Afonso Pena - Curitiba (CWB)">Aeroporto Internacional Afonso Pena - Curitiba (CWB)</option>
                        <option value="Aeroporto de Londrina Gov. Jose Richa (LDB)">Aeroporto de Londrina Gov. Jose Richa (LDB)</option>
                        <option value="Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)">Aeroporto Internacional de Florianópolis - Hercílio Luz (FLN)</option>
                        <option value="Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)">Aeroporto Internacional de Navegantes - Ministro Victor Konder (NTV)</option>
                        <option value="Aeroporto Internacional Porto Alegre Salgado Filho (POA)">Aeroporto Internacional Porto Alegre Salgado Filho (POA)</option>
                        <option value="Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)">Aeroporto Internacional de Pelotas - João Simões Lopez Neto (PET)</option>
                        <option value="Aeroporto Internacional Eurico de Aguiar Sales (VIX)">Aeroporto Internacional Eurico de Aguiar Sales (VIX)</option>
                        <option value="Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)">Aeroporto Internacional De Goiânia - Santa Genoveva (GYN)</option>
                        <option value="Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)">Aeroporto Internacional de Brasília - Presidente Juscelino Kubitschek (BSB)</option>
                        <option value="Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)">Aeroporto Internacional De Macapá - Alberto Alcolumbre (MCP)</option>
                        <option value="Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)">Aeroporto Internacional De Palmas - Brigadeiro Lysias Rodrigues (PMW)</option>
                        <option value="noda">noda</option>
                    </select>
                </div>

                <div id="informacao_viagem" class="col-md-2">
                    <label for="data_ida" class="form-label">Ida</label>
                    <input type="date" name="data_ida" id="data_ida" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div id="informacao_viagem" class="col-md-2">
                    <label id="txt_voltar" for="data_volta" class="form-label">Volta</label>
                    <input type="date" name="data_volta" id="data_volta" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>
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

            <button id="botao_buscar_viagem" type="submit" class="btn text-uppercase text-white fw-bold mt-2 w-50">buscar</button>
        </form>

        <hr>

        <div class="my-5">
            <h4>Insira as informações da sua viagem para buscarmos o vôo</h4>
        </div>
    </main>

    <footer>
        <!--INICIO RODAPÉ-->
        <div id="rodape" class="container-fluid position-absolute top-100 mt-5">
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

                    <a class="text-white text-decoration-none" href="#"><img src="img/instagram.svg" alt="Ícone do Instagram">Instagram</a>
                    <br>
                    <a class="text-white text-decoration-none" href="#"><img src="img/facebook.svg" alt="Ícone do Facebook"> Facebook</a>
                    <br>
                    <a class="text-white text-decoration-none" href="#"><img src="img/twitter.svg" alt="Ícone do Twitter"> Twitter</a>
                </div>
            </div>
        </div>
        <!-- FIM RODAPÉ -->
    </footer>
    <script src="js/reserva.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>