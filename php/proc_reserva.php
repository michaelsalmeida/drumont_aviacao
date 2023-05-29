<?php
session_start();
ob_start();
include_once('conexao.php');

if (!isset($_SESSION['verifica_cliente'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: ../login.php");
    exit;
}

//Recolhendo os valores do formulário 
$partida = filter_input(INPUT_POST, 'partida', FILTER_SANITIZE_STRING);
$destino = filter_input(INPUT_POST, 'destino', FILTER_SANITIZE_STRING);
$data_partida = filter_input(INPUT_POST, 'data_ida', FILTER_SANITIZE_STRING);

// Condicional para ver se a checkbox de 'apenas ida' está acionada
if (isset($_POST['apenas_ida'])) {
    $data_retorno = 'apenas ida';
} else {
    $data_retorno = filter_input(INPUT_POST, 'data_volta', FILTER_SANITIZE_STRING);
}

$qtd_passagem = filter_input(INPUT_POST, 'qtd_passagem', FILTER_SANITIZE_NUMBER_INT);

// Sessões com os valores das variáveis
$_SESSION['partida'] = $partida;
$_SESSION['destino'] = $destino;
$_SESSION['data_partida'] = $data_partida;
$_SESSION['data_retorno'] = $data_retorno;
$_SESSION['qtd_passagem'] = $qtd_passagem;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reserva.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMOT - Reservar</title>
</head>

<body>
    <header>
        <!--INICIO BARRA DE NAVEGAÇÃO-->
        <!--INICIO BARRA DE NAVEGAÇÃO-->
        <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img id="logo_navbar_dumont" width="150" src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

                <div id="links_navbar">
                    <a style="color: white;" id="link_nav1" class="nav-link" href="../index.php">Home</a>
                    <a style="color: white;" id="link_nav2" class="nav-link" href="../reserva.php">Passagens</a>
                    <a style="color: white;" id="link_nav3" class="nav-link" href="../ofertas.php">Ofertas</a>
                    <a style="color: white;" id="link_nav4" class="nav-link" href="../login.php">Entrar</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <button id="btn-burguer"><a style="color: white; text-decoration: none;" href="../login.php"> Entre ou cadastre-se</a></button>

                            <hr style="margin-top: 20px; margin-bottom: 20px;">

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="../perfil.php"> <img id="icon_aviao" src="../img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="minhas_viagens.php"> <img id="icon_aviao" src="../img/airplane-engines.svg" alt="Ícone de um avião"> Minhas viagens</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="../reserva.php"> <img id="icon_ticket" src="../img/ticket.svg" alt="Ícone de um ticket"> Passagens aéreas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="../ofertas.php"> <img id="icon_fogo" src="../img/fire.svg" alt="Ícone Fogo"> Ofertas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="../contato.html"> <img id="icon_tel" src="../img/telephone.svg" alt="Ícone Telefone"> Contato</a>
                            </li>

                            <?php
                            if (isset($_SESSION['verifica_cliente'])) {
                                echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='proc_sair_conta.php'> <img id='icon_tel' src='../img/iconsaida.svg'
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
        <!-- <h1 class="text-uppercase p-2">voos disponíveis para essa viagem</h1> -->
    </header>


    <main class="container my-5">


        <!-- Select com todos os aeroportos isponíveis para o cliente selecionar -->
        <form action="proc_reserva.php" method="post">
            <div class="row">
                <div id="informacao_viagem" class="col-md-3">
                    <label for="partida" class="form-label">Seu local de partida</label>
                    <select name="partida" id="partida" class="form-control" required>
                        <option value="<?php echo $_SESSION['partida']; ?>"><?php if ($_SESSION['partida'] == '') {
                                                                                echo 'Seu destino';
                                                                            } else {
                                                                                echo $_SESSION['partida'];
                                                                            }
                                                                            ?></option>
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
                        <option value="<?php echo $_SESSION['destino']; ?>"><?php if ($_SESSION['destino'] == '') {
                                                                                echo 'Seu destino';
                                                                            } else {
                                                                                echo $_SESSION['destino'];
                                                                            }
                                                                            ?></option>
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
                    <input type="date" name="data_ida" id="data_ida" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $_SESSION['data_partida']; ?>" required>
                </div>

                <div id="informacao_viagem" class="col-md-2">
                    <label id="txt_voltar" for="data_volta" class="form-label">Volta</label>
                    <input type="date" name="data_volta" id="data_volta" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $_SESSION['data_retorno']; ?>" required>
                </div>

                <div id="informacao_viagem" class="col-md-1">
                    <label for="qtd_passagem" class="form-label">Qtd.</label>
                    <input type="number" name="qtd_passagem" id="qtd_passagem" min="1" max="8" class="form-control" value="<?php echo $_SESSION['qtd_passagem']; ?>" required>
                </div>
            </div>

            <div id="informacao_viagem mt-2">
                <input type="checkbox" name="apenas_ida" id="apenas_ida" class="form-check-input">
                <label for="apenas_ida" class="form-check-label">Somente ida</label>
            </div>

            <button id="botao_buscar_viagem" type="submit" class="btn text-uppercase text-white fw-bold mt-2 w-50">buscar</button>
        </form>

        <hr>

        <form action="../assentos.php" method="post">
            <?php
            // Função que irá verificar se a partida e o destino são iguais
            function validarPartidaDestino()
            {
                // Selecionando as variáveis globais, que estão fora da função
                global $partida;
                global $destino;
                global $partidaDestinoIguais;

                if ($partida == $destino) {
                    $partidaDestinoIguais = true;
                } else {
                    $partidaDestinoIguais = false;
                }
            }

            // Função que vai verificar se existe os aeroportos selecionados no banco de dados
            function ValidarAeroporto()
            {
                global $partida;
                global $destino;
                global $conn;
                global $aeroportoExistente;

                // Verificando se os aeroportos selecionados estão dentro do banco de dados
                $verificar_partida = "SELECT * FROM aeroportos WHERE lista_aeroportos = '$partida'";
                $verificar_destino = "SELECT * FROM aeroportos WHERE lista_aeroportos = '$destino'";
                $conexao_partida = mysqli_query($conn, $verificar_partida);
                $conexao_destino = mysqli_query($conn, $verificar_destino);
                $aeroporto_partida = mysqli_fetch_assoc($conexao_partida);
                $aeroporto_destino = mysqli_fetch_assoc($conexao_destino);

                if (($partida == $aeroporto_partida['lista_aeroportos']) && ($destino == $aeroporto_destino['lista_aeroportos'])) {
                    $aeroportoExistente = true;
                } else {
                    $aeroportoExistente = false;
                }
            }

            // Função que irá verificar se a data de retorno da viagem é maior que a data de ida
            function validarDataViagem()
            {
                global $data_partida;
                global $data_retorno;
                global $dataCongruente;

                // Cálculo para obter o número de dias
                $diferenca = strtotime($data_retorno) - strtotime($data_partida);
                $dias = floor($diferenca / (60 * 60 * 24));

                if (isset($_POST['apenas_ida'])) {
                    $dataCongruente = true;
                } else {
                    if ($dias < 0) {
                        $dataCongruente = false;
                    } else {
                        $dataCongruente = true;
                    }
                }
            }

            // Função que verifica se a quantidade de passagens está dentro do limite
            function validarLimitePassagem()
            {
                global $qtd_passagem;
                global $passagemNoLimite;

                if (($qtd_passagem < 1) || ($qtd_passagem > 8)) {
                    $passagemNoLimite = false;
                } else {
                    $passagemNoLimite = true;
                }
            }

            // função que irá fazer a listagem das viagens disponíveis para o requerimento do cliente
            function listarViagem()
            {
                global $partida;
                global $destino;
                global $data_partida;
                global $data_retorno;
                global $conn;

                // Sessão que vai armazenar a condição de retorno do passageiro (somente ida / ida e volta)
                $_SESSION['retorno'] = $data_retorno;

                // Selecionando no banco de dados os aviões que vão viajar para tal destino, partindo do respectivo aeroporto de partida selecionado
                $aviao_disponivel_partida = "SELECT * FROM aviao INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao WHERE local_voo = '$partida' AND local_pouso = '$destino' AND hora_partida LIKE '%$data_partida%'";
                $executa_consulta = mysqli_query($conn, $aviao_disponivel_partida);
                $contador = 1;

                echo "<h3>IDA - " . date("d/m/Y", strtotime($data_partida)) . "</h3>";
                if (mysqli_affected_rows($conn)) {
                    while ($linha_aviao = mysqli_fetch_assoc($executa_consulta)) {

                        // Criar objetos DateTime a partir das strings de data/hora
                        $hora_chegada = new DateTime($linha_aviao['hora_chegada']);
                        $hora_partida = new DateTime($linha_aviao['hora_partida']);

                        // Calcular a diferença entre as duas horas
                        $duracao_viagem = $hora_chegada->diff($hora_partida)->format('%H:%I:%S');

                        echo "
                            <table class='table table-secondary table-borderless table-sm'>
                                <tr>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                </tr>

                                <tr>
                                    <td scope='row'><input type='radio' class='form-check-input' id='retorno$contador' name='partida' value='" . $linha_aviao['pk_aviao'] . "' required></td>
                                    <td><p>" . substr($linha_aviao['hora_partida'], -8) . "</p>
                                    <td><p>" . substr($linha_aviao['local_voo'], -5) . "</p></td>
                                    <td><p>" . $duracao_viagem . "</p></td>
                                    <td><p>" . substr($linha_aviao['local_pouso'], -5) . "</p></td>
                                </tr>
                            </table>
                            ";
                        $contador++;
                    }

                    if($data_retorno == 'apenas ida'){
                        echo "<button class='btn btn-success text-uppercase' type='submit'>comprar</button>";
                    }
                } else {
                    echo "Hum... Não existe nenhum voo para esse destino nesse dia";
                }

                // Condicional ue irá verificar se a viagem é apenas ida ou não
                if ($data_retorno != 'apenas ida') {
                    echo '<hr>';
                    // Se a viagem não for apenas de ida, o sistema irá mostrar aviões que vão retornar
                    $aviao_disponivel_retorno = "SELECT * FROM aviao INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao WHERE local_voo = '$destino' AND local_pouso = '$partida' AND hora_partida LIKE '%$data_retorno%'";
                    $executa_consulta_retorno = mysqli_query($conn, $aviao_disponivel_retorno);
                    $contador = 1;


                    echo "<h3>VOLTA - " . date("d/m/Y", strtotime($data_retorno)) . "</h3>";
                    if (mysqli_affected_rows($conn)) {
                        while ($linha_aviao_retorno = mysqli_fetch_assoc($executa_consulta_retorno)) {

                            // Criar objetos DateTime a partir das strings de data/hora
                            $hora_chegada = new DateTime($linha_aviao_retorno['hora_chegada']);
                            $hora_partida = new DateTime($linha_aviao_retorno['hora_partida']);

                            // Calcular a diferença entre as duas horas
                            $duracao_viagem = $hora_chegada->diff($hora_partida)->format('%H:%I:%S');

                            echo "<table class='table table-secondary table-borderless table-sm'>
                                <tr>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                    <th scope='col'></th>
                                </tr>
    
                                <tr>
                                    <td scope='row'><input type='radio' class='form-check-input' id='partida$contador' name='retorno' value='" . $linha_aviao_retorno['pk_aviao'] . "' required></td>
                                    <td><p>" . substr($linha_aviao_retorno['hora_partida'], -8) . "</p>
                                    <td><p>" . substr($linha_aviao_retorno['local_voo'], -5) . "</p></td>
                                    <td><p>" . $duracao_viagem . "</p></td>
                                    <td><p>" . substr($linha_aviao_retorno['local_pouso'], -5) . "</p></td>
                                </tr>
                                </table>
                                ";
                            $contador++;
                        }
                        
                        // inserindo o botão caso haja o vôo requerido
                        echo "<button class='btn btn-success text-uppercase' type='submit'>comprar</button>";
                    } else {
                        echo "Hum... Não existe nenhum voo para esse destino nesse dia";
                    }

                    //paginação - somar a quantidade e aviões
                    $result_pg = "SELECT COUNT(pk_aviao) AS num_result FROM aviao INNER JOIN gestao_voo ON aviao.pk_aviao = gestao_voo.fk_aviao";
                    $resultado_pg = mysqli_query($conn, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                }
            }

            // Fim das funções ==================================================================================

            // Variáveis que serão do tipo booleano e vão indicar se as validações são verdadeiras ou falsas
            $partidaDestinoIguais = 0;
            $aeroportoExistente = 0;
            $dataCongruente = 0;
            $passagemNoLimite = 0;

            // Início das validações por condição ================================================================

            validarPartidaDestino();
            if ($partidaDestinoIguais == true) {
                $_SESSION['msg'] = '<h4 class="text-uppercase text-danger">a partida e o destino não podem ser iguais</h4>';
                header('Location: ../reserva.php');
                ob_end_flush();
                exit;
            } else {
                validarAeroporto();
                if ($aeroportoExistente == false) {
                    $_SESSION['msg'] = '<h4 class="text-uppercase text-danger">aeroporto inexistente no banco</h4>';
                    header('Location: ../reserva.php');
                } else {
                    validarDataViagem();
                    if ($dataCongruente == false) {
                        $_SESSION['msg'] = '<h4 class="text-uppercase text-danger">a data de retorno da viagem não pode ser maior que a data de ida</h4>';
                        header('Location: ../reserva.php');
                    } else {
                        validarLimitePassagem();
                        if ($passagemNoLimite == false) {
                            $_SESSION['msg'] = '<h4 class="text-uppercase text-danger">A quantidade de passagens deve ser, no mínimo, 1 e, no máximo, 8</h4>';
                            header('Location: ../reserva.php');
                        } else {
                            listarViagem();
                        }
                    }
                }
            }

            ?>

            
        </form>
    </main>

    <script src="../js/reserva.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>