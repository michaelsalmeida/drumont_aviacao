<?php
session_start();
include_once('conexao.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $forma_pag = filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_STRING);
    $_SESSION['forma_pag'] = $forma_pag;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forma_pagamento.css">
    <link rel="stylesheet" href="../css/pagamento.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - Pagamento</title>
</head>

<body>
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

                        <button id="btn-burguer"><a style="color: white; text-decoration: none;" href="login.php"> Entre ou
                                cadastre-se</a></button>

                        <hr style="margin-top: 20px; margin-bottom: 20px;">

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
                                    <a style='color: #460AC6;' class='nav-link' href='PHP/proc_sair_conta.php'> <img id='icon_tel' src='../img/iconsaida.svg'
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

    <main class="container my-5">
        <?php
            for ($exibir = 1; $exibir <= $_SESSION['qtd_passagem']; $exibir++) {
                echo "<div id='passagem' class='container p-2 rounded-2'><p><strong>Nome:</strong> " . $_SESSION["nome_passagem$exibir"] . " " . $_SESSION["sobrenome_passagem$exibir"] . " | <strong>CPF:</strong> " . $_SESSION["cpf_passagem$exibir"] . "</p>";

                echo "<p><strong>Assento de ida:</strong> " . $_SESSION["assento_passagem_ida$exibir"];
    
                if ($_SESSION["assento_passagem_volta$exibir"] != 'apenas ida') {
                    echo " | <strong>Assento de volta:</strong> " . $_SESSION["assento_passagem_volta$exibir"] . "</p>";
                } else {
                    echo "</p>";
                }
    
                echo "<p><strong>Local de partida:</strong> " . $_SESSION['partida'] . "</p>";
                echo "<p><strong>Local de destino:</strong> " . $_SESSION['destino'] . "</p>";
                echo "<p><strong>Data de partida:</strong> " . $_SESSION['data_partida'];
    
                if ($_SESSION["assento_passagem_volta$exibir"] != 'apenas ida') {
                    echo " | <strong>Data de retorno:</strong> " . $_SESSION['data_retorno'] . "</p>";
                } else {
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

            echo "<div class='container'><hr><h3 class='text-uppercase'>preço total: r$" . $_SESSION['preco_total'] . "</h3><hr></div>";
        ?>
    
    
        <div id="div_pag" class="container">
            <form action="forma_pagamento.php" method="post">
                <div class="row">
                    <div class="col-5">
                        <label class="form-label">Forma de pagamento</label><br>
                        <select class="form-control" name="forma_pagamento" id="forma_pagamento" required>
                            <option value="<?php echo $_SESSION['forma_pag'] ?>"><?php echo $_SESSION['forma_pag'] ?></option>
                            <option value="CREDITO">Crédito</option>
                            <option value="DEBITO">Débito</option>
                            <option value="PIX">Pix</option>
                        </select>
                    </div>
                    <div class="col-1 mt-auto">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>

                    <div class="col-2 mt-auto">
                        <a href="../info_passageiro.php" id="voltar" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    
        <hr class="container">
    
        <form action="proc_pag.php" method="post">
            <div class="container">
                <?php
                if (($forma_pag == 'CREDITO') || ($forma_pag == 'DEBITO')) {
                    echo
                    "
                        <div class='row'>
                            <div class='col-sm-3'>
                                <label for='num_cartao' class='form-label'>N° do cartão</label>
                                <input type='text' id='num_cartao' class='form-control' name='num_cartao' value='";
    
                    if (isset($_SESSION['num_cartao'])) {
                        echo $_SESSION['num_cartao'];
                        unset($_SESSION['num_cartao']);
                    }
    
                    echo "' required>
                            </div>
                            
                            <div class='col-sm-6'>
                                <label for='nome_titular' id='nome_titular' class='form-label'>Nome do titular</label>
                                <input type='text' id='nome_titular' class='form-control' name='nome_titular' value='";
    
                    if (isset($_SESSION['nome_titular'])) {
                        echo $_SESSION['nome_titular'];
                        unset($_SESSION['nome_titular']);
                    }
    
                    echo "' required>
                            </div>
                        </div>
    
                        <div class='row mt-3'>
                            <div class='col-2'>
                                <label for='vencimento' class='form-label'>Vencimento</label><br>
                                <div class='input-group' id='vencimento'>
                                    <select id='mes_vencimento' name='mes_vencimento' class='form-control' required>
                                        <option value='";
    
                    if (isset($_SESSION['mes'])) {
                        echo $_SESSION['mes'];
                        unset($_SESSION['mes']);
                    } else {
                        echo '';
                    }
    
                    echo "'>";
    
                    if (isset($_SESSION['mes'])) {
                        echo $_SESSION['mes'];
                        unset($_SESSION['mes']);
                    } else {
                        echo 'mês';
                    }
    
                    echo "</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                    </select>
    
                                    <select id='ano_vencimento' name='ano_vencimento' class='form-control' required>
                                        <option value='";
    
                    if (isset($_SESSION['ano'])) {
                        echo $_SESSION['ano'];
                        unset($_SESSION['ano']);
                    } else {
                        echo '';
                    }
    
                    echo "'>";
    
                    if (isset($_SESSION['ano'])) {
                        echo $_SESSION['ano'];
                        unset($_SESSION['ano']);
                    } else {
                        echo 'ano';
                    }
    
                    echo "</option>
                                        <option value='" . date('Y') . "'>" . date('Y') . "</option>
                                        <option value='" . date('Y', strtotime('+1 year')) . "'>" . date('Y', strtotime('+1 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+2 year')) . "'>" . date('Y', strtotime('+2 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+3 year')) . "'>" . date('Y', strtotime('+3 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+4 year')) . "'>" . date('Y', strtotime('+4 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+5 year')) . "'>" . date('Y', strtotime('+5 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+6 year')) . "'>" . date('Y', strtotime('+6 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+7 year')) . "'>" . date('Y', strtotime('+7 year')) . "</option>
                                        <option value='" . date('Y', strtotime('+8 year')) . "'>" . date('Y', strtotime('+8 year')) . "</option>
    
                                    </select>
                                </div>
                            </div>
    
                            <div class='col-1'>
                                <label for='cod_seguranca' id='cod_seguranca' class='form-label'>CVC</label>
                                <input type='text' id='cod_seguranca' name='cod_seguranca' class='form-control pe-0' value='";
    
                    if (isset($_SESSION['cvv'])) {
                        echo $_SESSION['cvv'];
                        unset($_SESSION['cvv']);
                    }
    
                    echo "' required>
                            </div>
                            <div class='col-sm-1'>
                                <label for='cpf_pag' id='cpf_pag' class='form-label'>CPF</label>
                                <input type='text' id='cpf_pag' name='cpf_pag' class='form-control' value='";
    
                    if (isset($_SESSION['cpf_pag'])) {
                        echo $_SESSION['cpf_pag'];
                        unset($_SESSION['cpf_pag']);
                    }
    
                    echo "' required>    
                            </div>
                        </div>
    
                        <button type='submit' class='btn btn-success text-uppercase mt-3'>confirmar compra</button>
                        ";
                } elseif ($forma_pag == 'PIX') {
                    echo
                    "
                        <div class='row'>
                            <div class='col-6'>
                                <label for='cpf_pag' id='cpf_pag_pix' class='form-label'>CPF</label>
                                <input type='text' id='cpf_pag_pix' class='form-control' name='cpf_pag' required>
                            </div>
    
                            <div class='col-sm-6'>
                                <label for='nome_pagador' class='form-label'>Nome completo</label>
                                <input type='text' class='form-control' name='nome_pagador' required>
                            </div>
                        </div>
    
                        <button type='submit' class='btn btn-success text-uppercase mt-3'>confirmar compra</button>
                        ";
                }
                ?>
            </div>
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>