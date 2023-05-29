<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_unset();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - Cadastro</title>
</head>

<body>
    <header>
        <!--INICIO BARRA DE NAVEGAÇÃO-->
        <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img id="logo_navbar_dumont" width="150"
                        src="img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

                <div id="links_navbar">
                    <a style="color: white;" id="link_nav1" class="nav-link" href="index.php">Home</a>
                    <a style="color: white;" id="link_nav2" class="nav-link" href="reserva.php">Passagens</a>
                    <a style="color: white;" id="link_nav3" class="nav-link" href="ofertas.php">Ofertas</a>
                    <a style="color: white;" id="link_nav4" class="nav-link" href="login.php">Entrar</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                            <button id="btn-burguer"><a style="color: white; text-decoration: none;"
                                    href="login.php">Entre ou cadastre-se</a></button>

                            <hr style="margin-top: 20px; margin-bottom: 20px;">

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="perfil.php"> <img id="icon_aviao"
                                        src="img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_aviao"
                                        src="img/airplane-engines.svg" alt="Ícone de um avião">Minhas viagens</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="reserva.php"> <img id="icon_ticket"
                                        src="img/ticket.svg" alt="Ícone de um ticket">Passagens aéreas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="ofertas.php"> <img id="icon_fogo"
                                        src="img/fire.svg" alt="Ícone Fogo">Ofertas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="contato.php"><img id="icon_tel"
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



    <!-- FORMULÁRIO DE CADASTRO -->
    <main class="my-5">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div id="formulario" class="border border-3 rounded-3">
            <div class="row">
                <h1 class="text-uppercase text-center">cadastro</h1>
            </div>

            <form action="php/proc_cad_user.php" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label" for="nome">Nome *</label>
                        <input class="form-control" type="text" name="nome" id="nome"
                            value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
                            unset($_SESSION['nome']); ?>" required autofocus>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="sobrenome">Sobrenome *</label>
                        <input class="form-control" type="text" name="sobrenome" id="sobrenome"
                            value="<?php echo isset($_SESSION['sobrenome']) ? $_SESSION['sobrenome'] : '';
                            unset($_SESSION['sobrenome']); ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div id="documento" class="col-sm-3">
                        <label class="form-label" for="cpf">CPF *</label>
                        <input class="form-control" type="text" name="cpf" id="cpf" minlength="11" maxlength="11"
                            value="<?php echo isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';
                            unset($_SESSION['cpf']); ?>"
                            required>

                        <?php
                        if (isset($_SESSION['msg_cpf'])) {
                            echo $_SESSION['msg_cpf'];
                            unset($_SESSION['msg_cpf']);
                        }
                        ?>
                    </div>

                    <div id="documento" class="col-sm-3">
                        <label class="form-label" for="rg">RG *</label>
                        <input class="form-control" type="text" name="rg" id="rg" minlength="9" maxlength="9"
                            value="<?php echo isset($_SESSION['rg']) ? $_SESSION['rg'] : '';
                            unset($_SESSION['rg']); ?>"
                            required>

                        <?php
                        if (isset($_SESSION['msg_rg'])) {
                            echo $_SESSION['msg_rg'];
                            unset($_SESSION['msg_rg']);
                        }
                        ?>
                    </div>

                    <div id="data" class="col-sm-3">
                        <label class="form-label" for="emissao_rg">Emissão *</label>
                        <input class="form-control" type="date" name="emissao_rg" id="emissao_rg"
                            value="<?php echo isset($_SESSION['emissao']) ? $_SESSION['emissao'] : '';
                            unset($_SESSION['emissao']); ?>"
                            min="<?php echo date('Y-m-d', strtotime('-10 year')) ?>" max="<?php echo date('Y-m-d'); ?>"
                            required>

                        <?php
                        if (isset($_SESSION['msg_emissao'])) {
                            echo $_SESSION['msg_emissao'];
                            unset($_SESSION['msg_emissao']);
                        }
                        ?>
                    </div>

                    <div id="data" class="col-sm-3">
                        <label class="form-label" for="data_nascimento">Nascimento *</label>
                        <input class="form-control" type="date" name="data_nascimento" id="data_nascimento"
                            value="<?php echo isset($_SESSION['nascimento']) ? $_SESSION['nascimento'] : '';
                            unset($_SESSION['nascimento']); ?>"
                            min="<?php echo date('Y-m-d', strtotime('-120 year')); ?>"
                            max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" required>

                        <?php
                        if (isset($_SESSION['msg_nascimento'])) {
                            echo $_SESSION['msg_nascimento'];
                            unset($_SESSION['msg_nascimento']);
                        }
                        ?>
                    </div>
                </div>

                <div>
                    <label class="form-label" for="email">E-mail *</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';
                        unset($_SESSION['email']); ?>"
                        required>

                    <?php
                    if (isset($_SESSION['msg_email'])) {
                        echo $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label" for="senha">Senha *</label>
                        <input class="form-control" type="password" name="senha" id="senha"
                            value="<?php echo isset($_SESSION['senha']) ? $_SESSION['senha'] : '';
                            unset($_SESSION['senha']); ?>"
                            required>

                        <?php
                        if (isset($_SESSION['msg_senha'])) {
                            echo $_SESSION['msg_senha'];
                            unset($_SESSION['msg_senha']);
                        }
                        ?>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="senha_confirm">Confirmar senha *</label>
                        <input class="form-control" type="password" name="senha_confirm" id="senha_confirm"
                            value="<?php echo isset($_SESSION['senha_confirm']) ? $_SESSION['senha_confirm'] : '';
                            unset($_SESSION['senha_confirm']); ?>"
                            required>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label" for="cep">CEP *</label>
                        <input class="form-control" type="number" name="cep" id="cep" onblur="pesquisacep(this.value);"
                            value="<?php echo isset($_SESSION['cep']) ? $_SESSION['cep'] : '';
                            unset($_SESSION['cep']); ?>"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9">
                        <label class="form-label" for="rua">Rua</label>
                        <input class="form-control" type="text" name="rua" id="rua"
                            value="<?php echo isset($_SESSION['rua']) ? $_SESSION['rua'] : '';
                            unset($_SESSION['rua']); ?>"
                            readonly>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label" for="num_casa">Nº *</label>
                        <input class="form-control" type="number" name="num_casa" id="num_casa"
                            value="<?php echo isset($_SESSION['num_casa']) ? $_SESSION['num_casa'] : '';
                            unset($_SESSION['num_casa']); ?>"
                            required>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input class="form-control" type="text" name="bairro" id="bairro"
                            value="<?php echo isset($_SESSION['bairro']) ? $_SESSION['bairro'] : '';
                            unset($_SESSION['bairro']); ?>"
                            readonly>
                    </div>
                    <div class="col-sm-5">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade" id="cidade"
                            value="<?php echo isset($_SESSION['cidade']) ? $_SESSION['cidade'] : '';
                            unset($_SESSION['cidade']); ?>"
                            readonly>
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label" for="uf">UF</label>
                        <input class="form-control" type="text" name="uf" id="uf"
                            value="<?php echo isset($_SESSION['uf']) ? $_SESSION['uf'] : '';
                            unset($_SESSION['uf']); ?>"
                            readonly>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input class="form-control" type="number" name="telefone" id="telefone" min="1100000000"
                            max="1199999999"
                            value="<?php echo isset($_SESSION['telefone']) ? $_SESSION['telefone'] : '';
                            unset($_SESSION['telefone']); ?>">
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label" for="celular">Celular *</label>
                        <input class="form-control" type="number" name="celular" id="celular" min="11900000000"
                            max="11999999999"
                            value="<?php echo isset($_SESSION['celular']) ? $_SESSION['celular'] : '';
                            unset($_SESSION['celular']); ?>"
                            required>
                    </div>
                </div>

                <button class="btn text-white m-auto d-block mt-5 text-uppercase fw-bold"
                    type="submit">cadastrar</button>
            </form>
        </div>
    </main>
    <!-- FIM - FORMULÁRIO DE CADASTRO -->


    <!--INICIO RODAPÉ-->
    <!-- <div id="rodape" class="container-fluid">
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
        </div> -->

    <!--FIM RODAPÉ-->
    <script src="js/cadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>