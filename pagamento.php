<?php
session_start();
include_once('php/conexao.php');

$preco_total = 0;

for($qtd_passagem = $_SESSION['qtd_passagem']; $qtd_passagem > 0; $qtd_passagem--){
    $preco_total += 998.95;
}

for($quantAnimal = $_SESSION['quantAnimal']; $quantAnimal > 0; $quantAnimal--){
    $preco_total += 150;
}

$_SESSION['preco_total'] = $preco_total;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pagamento.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - Pagamento</title>
</head>

<body>

    <!--INICIO BARRA DE NAVEGAÇÃO-->

    <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img id="logo_navbar_dumont" width="150" src="img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

            <div id="links_navbar">
                <a style="color: white;" id="link_nav1" class="nav-link" href="index.php">Home</a>
                <a style="color: white;" id="link_nav2" class="nav-link" href="reserva.php">Passagens</a>
                <a style="color: white;" id="link_nav3" class="nav-link" href="ofertas.php">Ofertas</a>
                <a style="color: white;" id="link_nav4" class="nav-link" href="login.php">Entrar</a>
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

                        <button id="btn-burguer"><a style="color: white; text-decoration: none;" href="login.php"> Entre ou
                                cadastre-se</a></button>

                        <hr style="margin-top: 20px; margin-bottom: 20px;">

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="php/minhas_viagens.php"> <img id="icon_aviao" src="img/airplane-engines.svg" alt="Ícone de um avião"> Minhas viagens</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="reserva.php"> <img id="icon_ticket" src="img/ticket.svg" alt="Ícone de um ticket"> Passagens aéreas</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="ofertas.php"> <img id="icon_fogo" src="img/fire.svg" alt="Ícone Fogo"> Ofertas</a>
                        </li>

                        <li class="nav-item">
                            <a style="color: #460AC6;" class="nav-link" href="contato.html"> <img id="icon_tel" src="img/telephone.svg" alt="Ícone Telefone"> Contato</a>
                        </li>

                        <?php
                        if (isset($_SESSION['verifica_cliente'])) {
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
    <!--FIM BARRA DE NAVEGAÇÃO-->


    <!--CONTEÚDO PRINCIPAL DA PÁGINA-->


    <main class="container mt-5">
        <?php
            for ($exibir = 1; $exibir <= $_SESSION['qtd_passagem']; $exibir++) {
                echo "<div id='passagem' class='container p-2 rounded-2'>
                <p><strong>Nome:</strong> " . $_SESSION["nome_passagem$exibir"] . " 
                " . $_SESSION["sobrenome_passagem$exibir"] . " 
                | <strong>CPF:</strong> " . $_SESSION["cpf_passagem$exibir"] . "</p>";
                // echo $_SESSION["sobrenome_passagem$exibir"] . "<br>";
                // echo $_SESSION["cpf_passagem$exibir"] . "<br>";
                echo "<p><strong>Assento de ida:</strong> " . $_SESSION["assento_passagem_ida$exibir"];

                if($_SESSION["assento_passagem_volta$exibir"] != 'apenas ida'){
                    echo " | <strong>Assento de volta:</strong> " . $_SESSION["assento_passagem_volta$exibir"] . "</p>";
                }else{
                    echo "</p>";
                }

                echo "<p><strong>Local de partida:</strong> " . $_SESSION['partida'] . "</p>";
                echo "<p><strong>Local de destino:</strong> " . $_SESSION['destino'] . "</p>";
                echo "<p><strong>Data de partida:</strong> " . $_SESSION['data_partida'];

                if ($_SESSION["assento_passagem_volta$exibir"] != 'apenas ida') {
                    echo " | <strong>Data de retorno:</strong> " . $_SESSION['data_retorno'] . "</p>";
                }else{
                    echo "</p>";
                }

                echo "</div><br>";
            }

            for ($exibir = 1; $exibir <= $_SESSION['quantAnimal']; $exibir++) {
                echo "<div id='passagem' class='container p-2 rounded-2'>
                <p><strong>Nome do animal:</strong> " . $_SESSION["nome_animal$exibir"] . "
                | <strong>Data de Nascimento:</strong> " . $_SESSION["nasc_animal$exibir"] . "</p>";

                echo "<p><strong>Local de partida:</strong> " . $_SESSION['partida'] . "</p>";
                echo "<p><strong>Local de destino:</strong> " . $_SESSION['destino'] . "</p>";
                echo "<p><strong>Data de partida:</strong> " . $_SESSION['data_partida'];

                echo "</div><br>";
            }

            echo "<hr><h3 class='text-uppercase'>preço total: r$$preco_total</h3><hr>";

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <div id="div_pag">
            <form action="php/forma_pagamento.php" method="post">
                <div class="row">
                    <div class="col-5">
                        <label class="form-label">Forma de pagamento</label><br>
                        <select class="form-control" name="forma_pagamento" id="forma_pagamento" required>
                            <option value="">Selecione</option>
                            <option value="CREDITO">Crédito</option>
                            <option value="DEBITO">Débito</option>
                            <option value="PIX">Pix</option>
                        </select>
                    </div>

                    <div class="col-1 mt-auto">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>

                    <div class="col-2 mt-auto">
                        <a href="info_passageiro.php" id="voltar" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!--FIM CONTEÚDO-->
    
    <hr class="container">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>