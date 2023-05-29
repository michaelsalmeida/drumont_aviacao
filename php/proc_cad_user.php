<?php
    session_start();
    include_once('conexao.php');

    // Função para verificar se há duplicata no banco de dados
    function validarDuplicataCPF(){
        global $conn;
        global $cpf_cliente;
        $verificar_duplicata = "SELECT * FROM cliente WHERE cpf = '$cpf_cliente'";
        $executa_conexao = mysqli_query($conn, $verificar_duplicata);
        $linha_cpf = mysqli_fetch_assoc($executa_conexao);

        if ($cpf_cliente === $linha_cpf['cpf']) {
            global $sem_duplicata_cpf;
            $sem_duplicata_cpf = false;
        } else {
            global $sem_duplicata_cpf;
            $sem_duplicata_cpf = true;
        }
    }

    // Função para validar CPF
    function validarCPF(){
        global $cpf_cliente;
        $cpf_separado = '';
        $cpf_digito = substr($cpf_cliente, -2);
        $soma_peso = 0;
        $peso = 10;

        // 1º Passo - Separar os primeiros 9 dígitos dos 2 dígitos verificadores
        for ($separar = 0; $separar < (strlen($cpf_cliente) - 1); $separar++) {
            $cpf_separado = $cpf_separado . $cpf_cliente[$separar];
        }

        // 2º Passo - Multiplicar os pesos
        for ($selecionar = 0; $selecionar < strlen($cpf_separado); $selecionar++) {
            $converter_int = intval($cpf_separado[$selecionar]);
            $soma_peso += $converter_int * $peso;
            $peso--;

            if ($peso == 1) {
                break;
            }
        }

        // 3º Passo - achar o 1º dígito verificador e juntá-lo com os 9 dígitos
        if (($soma_peso  % 11) < 2) {
            $digito1 = '0';
        } else {
            $digito1 = strval(11 - ($soma_peso % 11));
        }

        // FIM DO PRIMEIRO CICLO

        $soma_peso = 0;
        $peso = 11;

        // 5º Passo - Multiplicar novamente os pesos
        for ($selecionar = 0; $selecionar < strlen($cpf_separado); $selecionar++) {
            $converter_int = intval($cpf_separado[$selecionar]);
            $soma_peso += $converter_int * $peso;
            $peso--;

            if ($peso == 1) {
                break;
            }
        }

        // 6º Passo - Achar o 2º dígito e juntá-lo com os 10 dígitos e com o 1º dígito verificador
        if (($soma_peso % 11) < 2) {
            $digito2 = '0';
        } else {
            $digito2 = strval(11 - ($soma_peso % 11));
        }

        $digito_verificador = $digito1 . $digito2;

        // 5° Passo - Validar
        if (($cpf_cliente == '00000000000') || ($cpf_cliente == '11111111111') || ($cpf_cliente == '22222222222') || ($cpf_cliente == '33333333333') ||
            ($cpf_cliente == '44444444444') || ($cpf_cliente == '55555555555') || ($cpf_cliente == '66666666666') || ($cpf_cliente == '77777777777') ||
            ($cpf_cliente == '88888888888') || ($cpf_cliente == '99999999999')
        ) {
            global $cpf_correto;
            $cpf_correto = false;
        } else if ($cpf_digito == $digito_verificador) {
            global $cpf_correto;
            $cpf_correto = true;
        } else {
            global $cpf_correto;
            $cpf_correto = false;
        }
    }

    // Função para validar se há duplicata do RG no banco de dados
    function validarDuplicataRG(){
        global $conn;
        global $rg_cliente;
        $verificar_duplicata = "SELECT * FROM rg WHERE rg = '$rg_cliente'";
        $executa_conexao = mysqli_query($conn, $verificar_duplicata);
        $linha_rg = mysqli_fetch_assoc($executa_conexao);

        if ($rg_cliente === $linha_rg['rg']) {
            global $sem_duplicata_rg;
            $sem_duplicata_rg = false;
        } else {
            global $sem_duplicata_rg;
            $sem_duplicata_rg = true;
        }
    }

    // Função para validar o RG
    function validarRG(){
        global $rg_cliente;
        $rg_digito = substr($rg_cliente, -1); // Variável com dígito do RG digitado
        $rg_sem_digito = '';
        $soma_peso = 0;
        $peso = 2;
        $digito_valido = '';

        // 1° passo - Separar o RG de seu dígito
        for ($separador = 0; $separador < (strlen($rg_cliente) - 1); $separador++) {
            $rg_sem_digito = $rg_sem_digito . $rg_cliente[$separador];
        }

        // 2° passo - Multiplicar os pesos
        for ($seletor = 0; $seletor < strlen($rg_sem_digito); $seletor++) {
            $converter_int = intval($rg_sem_digito[$seletor]);
            $soma_peso += $converter_int * $peso;
            $peso++;
        }

        // 3° Passo - Encontrar o dígito
        $subtracao_digito = 11 - ($soma_peso % 11);

        if (($subtracao_digito) == 10) {
            $digito_valido = 'x';
        } else if (($subtracao_digito) == 11) {
            $digito_valido = 0;
        } else {
            $digito_valido = $subtracao_digito;
        }

        // 4° Passo - Validar
        if (($rg_cliente == '000000000') || ($rg_cliente == '111111111') || ($rg_cliente == '222222222') || ($rg_cliente == '333333333') ||
            ($rg_cliente == '444444444') || ($rg_cliente == '555555555') || ($rg_cliente == '666666666') || ($rg_cliente == '777777777') ||
            ($rg_cliente == '888888888') || ($rg_cliente == '999999999')
        ) {
            global $rg_correto;
            $rg_correto = false;
        } else if ($rg_digito == $digito_valido) {
            global $rg_correto;
            $rg_correto = true;
        } else {
            global $rg_correto;
            $rg_correto = false;
        }
    }

    // Função para validar a emissão do RG - não pode ultrapassar 10 anos
    function validarEmissaoRG(){
        global $data_emissao_rg;

        // Separando ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $data_emissao_rg);

        //Pegando data atual
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

        // Descobrindo unix timestamp da emissaõ do RG
        $emissao = mktime(0, 0, 0, $mes, $dia, $ano);

        // Cálculo
        $idade_rg = floor((((($hoje - $emissao) / 60) / 60) / 24) / 365.25);

        // Validando a emissão do RG
        if ($idade_rg > 10) {
            global $emissao_correto;
            $emissao_correto = false;
        } else {
            global $emissao_correto;
            $emissao_correto = true;
        }
    }

    // Função para validar nascimento - O cliente não pode ter menos de 18 anos de idade
    function validarNascimento(){
        global $data_nascimento;

        // Separando ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $data_nascimento);

        //Pegando data atual
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

        // Descobrindo unix timestamp dao nascimento do cliente
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        // Cálculo
        $idade_cliente = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        // Validando a idade do cliente
        if($idade_cliente < 18){
            global $idade_correto;
            $idade_correto = false;
        }else{
            global $idade_correto;
            $idade_correto = true;
        }
    }

    // Função para validar se há um email existente no banco de dados
    function validarDuplicataEmail(){
        global $conn;
        global $email_cliente;
        $verificar_duplicata = "SELECT * FROM cadastro WHERE email = '$email_cliente'";
        $executa_conexao = mysqli_query($conn, $verificar_duplicata);
        $linha_email = mysqli_fetch_assoc($executa_conexao);

        if($email_cliente === $linha_email['email']){
            global $sem_duplicata_email;
            $sem_duplicata_email = false;
        }else{
            global $sem_duplicata_email;
            $sem_duplicata_email = true;
        }
    }

    // Validar comparação entre a senha e sua confirmação, para analisar se são correspondentes
    function validarConfirmSenha(){
        global $senha_cliente;
        global $senha_confirm;

        if($senha_cliente === $senha_confirm){
            global $senha_correto;
            $senha_correto = true;
        }else{
            global $senha_correto;
            $senha_correto = false;
        }
    }

    // Variáveis armazenando os dados inseridos no formulário
    $nome_cliente = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome_cliente = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $cpf_cliente = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg_cliente = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $data_emissao_rg = filter_input(INPUT_POST, 'emissao_rg', FILTER_SANITIZE_STRING);
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
    $email_cliente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha_cliente = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $senha_confirm = filter_input(INPUT_POST, 'senha_confirm', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $num_casa = filter_input(INPUT_POST, 'num_casa', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
    $telefone_cliente = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
    $celular_cliente = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);

    // Removendo caracteres especiais de algumas variáveis
    $nome_cliente = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($nome_cliente)));
    $sobrenome_cliente = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($sobrenome_cliente)));
    $rua = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($rua)));
    $num_casa = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($num_casa)));
    $bairro = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($bairro)));
    $cidade = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($cidade)));

    // Deixando o valor das variáveis abaixo em maiúscula
    $nome_cliente = strtoupper($nome_cliente);
    $sobrenome_cliente = strtoupper($sobrenome_cliente);
    $rua = strtoupper($rua);
    $num_casa = strtoupper($num_casa);
    $bairro = strtoupper($bairro);
    $cidade = strtoupper($cidade);

    // Variável com a criptografia da senha
    $cripto_senha = sha1($senha_cliente);

    // Sessões que vão carregar os valores recebidos dos inputs
    $_SESSION['nome'] = $nome_cliente;
    $_SESSION['sobrenome'] = $sobrenome_cliente;
    $_SESSION['cpf'] = $cpf_cliente;
    $_SESSION['rg'] = $rg_cliente;
    $_SESSION['emissao'] = $data_emissao_rg;
    $_SESSION['nascimento'] = $data_nascimento;
    $_SESSION['email'] = $email_cliente;
    $_SESSION['senha'] = $senha_cliente;
    $_SESSION['senha_confirm'] = $senha_confirm;
    $_SESSION['cep'] = $cep;
    $_SESSION['rua'] = $rua;
    $_SESSION['num_casa'] = $num_casa;
    $_SESSION['bairro'] = $bairro;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['uf'] = $uf;
    $_SESSION['telefone'] = $telefone_cliente;
    $_SESSION['celular'] = $celular_cliente;

    // Variáveis booleanos que vão verificar as validações e se elas são verdadeiras ou falsas
    $idade_correto = 0;
    $sem_duplicata_rg = 0;
    $emissao_correto = 0;
    $rg_correto = 0;
    $sem_duplicata_cpf = 0;
    $cpf_correto = 0;
    $sem_duplicata_email = 0;
    $senha_correto = 0;

    validarDuplicataCPF();
    // Verifica se já existe o mesmo CPF no banco de dados
    if($sem_duplicata_cpf == false){
        $_SESSION['msg_cpf'] = "<p style='font-size: 13px' class='text-danger'>* CPF já existente</p>";
        $_SESSION['cpf'] = '';
        header('Location: ../cadastro.php');
    }else{
        validarCPF();
        // Verificando se o CPF é verdadeiro ou falso
        if($cpf_correto == false){
            $_SESSION['msg_cpf'] = "<p style='font-size: 13px' class='text-danger'>* CPF inválido</p>";
            $_SESSION['cpf'] = '';
            header('Location: ../cadastro.php');
        }else{
            // Verificando se não há duplicata do RG no banco de dados
            validarDuplicataRG();
            if($sem_duplicata_rg == false){
                $_SESSION['msg_rg'] = "<p style='font-size: 13px' class='text-danger'>* RG já existente</p>";
                $_SESSION['rg'] = '';
                header('Location: ../cadastro.php');
            }else{
                validarRG();
                // Verificando se o RG é verdadeiro ou falso
                if($rg_correto == false){
                    $_SESSION['msg_rg'] = "<p style='font-size: 13px' class='text-danger'>* RG inválido</p>";
                    $_SESSION['rg'] = '';
                    header('Location: ../cadastro.php');
                }else{
                    validarEmissaoRG();
                    // Verificando se o RG é vencido ou não
                    if($emissao_correto == false){
                        $_SESSION['msg_emissao'] = "<p style='font-size: 13px' class='text-danger'>* RG vencido</p>";
                        $_SESSION['emissao'] = '';
                        header('Location: ../cadastro.php');
                    }else{
                        validarNascimento();
                        // Verificando se o cliente tem a idade adequada
                        if($idade_correto == false){
                            $_SESSION['msg_nascimento'] = "<p style='font-size: 13px' class='text-danger'>* Novo demais para cadastrar</p>";
                            $_SESSION['nascimento'] = '';
                            header('Location: ../cadastro.php');
                        }else{
                            validarDuplicataEmail();
                            // Verificando se o email digitado já existe no banco
                            if($sem_duplicata_email == false){
                                $_SESSION['msg_email'] = "<p style='font-size: 13px' class='text-danger'>* Email já existente</p>";
                                $_SESSION['email'] = '';
                                header('Location: ../cadastro.php');
                            }else{
                                validarConfirmSenha();
                                // Verificando se a confirmação de senha está correta - última validação
                                if($senha_correto == false){
                                    $_SESSION['msg_senha'] = "<p style='font-size: 13px' class='text-danger'>* Confirmação não correspondente</p>";
                                    $_SESSION['senha'] = '';
                                    $_SESSION['senha_confirm'] = '';
                                    header('Location: ../cadastro.php');
                                }else{
                                    // Parte que vai inserir as informações da tabela cliente
                                    $inserir_cliente = "INSERT INTO cliente (sobrenome, nome, cpf, data_nasci) VALUES ('$sobrenome_cliente', '$nome_cliente','$cpf_cliente', '$data_nascimento')";
                                    $executa_conexao = mysqli_query($conn, $inserir_cliente);

                                    if(mysqli_insert_id($conn)){
                                        // Parte que vai inserir as informações da tabela cadastro
                                        $inserir_cadastro = "INSERT INTO cadastro (email, senha, funcionamento, criado, fk_cliente) SELECT '$email_cliente', '$cripto_senha', '1', NOW(), pk_cliente FROM cliente WHERE cpf = '$cpf_cliente'"; 
                                        $executa_conexao = mysqli_query($conn, $inserir_cadastro);
    
                                        if(mysqli_insert_id($conn)){
                                            // Parte que vai inserir as informações da tabela rg
                                            $inserir_rg = "INSERT INTO rg (rg, emissao_rg, fk_cliente) SELECT '$rg_cliente', '$data_emissao_rg', pk_cliente FROM cliente WHERE cpf = '$cpf_cliente'"; 
                                            $executa_conexao = mysqli_query($conn, $inserir_rg);
        
                                            if(mysqli_insert_id($conn)){
                                                // Parte que vai inserir as informações da tabela endereco
                                                $inserir_endereco = "INSERT INTO endereco (cep, rua, numero, bairro, cidade, uf, fk_cliente) SELECT '$cep', '$rua', '$num_casa', '$bairro', '$cidade', '$uf', pk_cliente FROM cliente WHERE cpf = '$cpf_cliente'"; 
                                                $executa_conexao = mysqli_query($conn, $inserir_endereco);
            
                                                if(mysqli_insert_id($conn)){
                                                    // Parte que vai inserir as informações da tabela contato_cliente
                                                    $inserir_contato = "INSERT INTO contato_cliente (telefone, celular, fk_cliente) SELECT '$telefone_cliente', '$celular_cliente', pk_cliente FROM cliente WHERE cpf = '$cpf_cliente'"; 
                                                    $executa_conexao = mysqli_query($conn, $inserir_contato);
                
                                                    if(mysqli_insert_id($conn)){
                                                        $_SESSION['msg'] = "<h5 class='text-uppercase text-success text-center'>cliente cadastrado com sucesso</h5>";
                                                        header('Location: ../login.php');
                                                    }else{
                                                        $_SESSION['msg'] = "<h5 class='text-uppercase text-danger text-center'>não foi possível cadastrar - tente novamente mais tarde!</h5>";
                                                        header('Location: ../cadastro.php');
                                                    }
                                                }else{
                                                    $_SESSION['msg'] = "<h5 class='text-uppercase text-danger text-center'>não foi possível cadastrar - tente novamente mais tarde!</h5>";
                                                    header('Location: ../cadastro.php');
                                                }
                                            }else{
                                                $_SESSION['msg'] = "<h5 class='text-uppercase text-danger text-center'>não foi possível cadastrar - tente novamente mais tarde!</h5>";
                                                header('Location: ../cadastro.php');
                                            }
                                        }else{
                                            $_SESSION['msg'] = "<h5 class='text-uppercase text-danger text-center'>não foi possível cadastrar - tente novamente mais tarde!</h5>";
                                            header('Location: ../cadastro.php');
                                        }
                                    }else{
                                        $_SESSION['msg'] = "<h5 class='text-uppercase text-danger text-center'>não foi possível cadastrar - tente novamente mais tarde!</h5>";
                                        header('Location: ../cadastro.php');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>