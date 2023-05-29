<?php
    session_start();
    include_once('conexao.php');

    $cliente = $_SESSION['verifica_cliente'];
    $_SESSION['quantAnimal'] = filter_input(INPUT_POST, "quantAnimal", FILTER_SANITIZE_STRING);

    // Função para verificar se os passageiros estão com nomes iguais
    function validarPassageiros(){
        global $passageiros_iguais;
        global $analisar;
        global $nome;
        global $sobrenome;
        global $cpf_passageiro;

        // Looping que vai comparar o nome e sobrenome com os outros nomes e sobrenomes para verificar se há algum igual
        for($comparar = 1; $comparar < $_SESSION['qtd_passagem']; $comparar++){
            if(($nome == $_POST["nome_passageiro$comparar"]) && ($sobrenome == $_POST["sobrenome_passageiro$comparar"]) && ($comparar != $analisar)){
                $passageiros_iguais = true;
                break;
            }else{
                $passageiros_iguais = false;
            }
        }
    }

    // Função para verificar se o CPF é valido
    function validarCPF(){
        global $cpf_passageiro;
        global $cpf_correto;
        $cpf_separado = '';
        $cpf_digito = substr($cpf_passageiro, -2);
        $soma_peso = 0;
        $peso = 10;

        // 1º Passo - Separar os primeiros 9 dígitos dos 2 dígitos verificadores
        for ($separar = 0; $separar < (strlen($cpf_passageiro) - 1); $separar++) {
            $cpf_separado = $cpf_separado . $cpf_passageiro[$separar];
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
        if (($cpf_passageiro == '00000000000') || ($cpf_passageiro == '11111111111') || ($cpf_passageiro == '22222222222') || ($cpf_passageiro == '33333333333') ||
            ($cpf_passageiro == '44444444444') || ($cpf_passageiro == '55555555555') || ($cpf_passageiro == '66666666666') || ($cpf_passageiro == '77777777777') ||
            ($cpf_passageiro == '88888888888') || ($cpf_passageiro == '99999999999')
        ) {
            $cpf_correto = false;
        } else if ($cpf_digito == $digito_verificador) {
            $cpf_correto = true;
        } else {
            $cpf_correto = false;
        }
    }

    // Validação para verificar se há CPFs iguais
    function ValidarIgualdadeCPF(){
        global $analisar;
        global $cpf_passageiro;
        global $cpf_igual;

        // Looping que vai comparar o CPF com os outros CPFs para verificar se há algum igual
        for($comparar = 1; $comparar < $_SESSION['qtd_passagem']; $comparar++){
            if(($cpf_passageiro == $_POST["cpf_passageiro$comparar"]) && ($comparar != $analisar)){
                $cpf_igual = true;
                break;
            }else{
                $cpf_igual = false;
            }
        }
    }

    // Verificando no banco de dados se o nome é o mesmo que é associado ao CPF
    function ValidarDonoCPF(){
        global $conn;
        global $cpf_passageiro;
        global $nome;
        global $sobrenome;
        global $dono_cpf_certo;

        $buscando_registro = "SELECT * FROM cliente WHERE cpf = '$cpf_passageiro'";
        $executando_busca = mysqli_query($conn, $buscando_registro);
        $registro_cliente = mysqli_fetch_assoc($executando_busca);

        $buscando_passagem = "SELECT * FROM passagem WHERE cpf_passagem = '$cpf_passageiro'";
        $executando_analise = mysqli_query($conn, $buscando_passagem);
        $registro_passagem = mysqli_fetch_assoc($executando_analise);
        
        // Condicional para verificar se há o CPF cadastrado no banco. Caso não esteja no banco, o CPF é novo, portanto o cliente também é.
        if(($cpf_passageiro == $registro_cliente['cpf'])||($cpf_passageiro == $registro_passagem['cpf_passagem'])){
            if((($nome == $registro_cliente['nome']) && ($sobrenome == $registro_cliente['sobrenome']))||(($nome == $registro_passagem['nome']) && ($sobrenome == $registro_passagem['sobrenome']))){
                $dono_cpf_certo = true;
            }else{
                $dono_cpf_certo = false;
            }
        }else{
            $dono_cpf_certo = true;
        }
    }

    for ($i = 1; $i <= $_SESSION['quantAnimal']; $i++) {
        $_SESSION['nome_animal'.$i] = filter_input(INPUT_POST, "nome_animal$i", FILTER_SANITIZE_STRING);
        $_SESSION['nasc_animal'.$i] = filter_input(INPUT_POST, "nasc_animal$i", FILTER_SANITIZE_STRING);
    }

    // Looping que vai analisar as informações inseridas de cada passageiro
    for($analisar = 1; $analisar <= $_SESSION['qtd_passagem']; $analisar++){
        // Recebendo as informações de cada passageiro por vez e as colocando dentro das variáveis
        $nome = filter_input(INPUT_POST, "nome_passageiro$analisar", FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, "sobrenome_passageiro$analisar", FILTER_SANITIZE_STRING);
        $cpf_passageiro = filter_input(INPUT_POST, "cpf_passageiro$analisar", FILTER_SANITIZE_STRING);
        $assento = filter_input(INPUT_POST, "assento$analisar", FILTER_SANITIZE_STRING);


        // Condicional para verificar se a viagem é apenas de ida
        if($_SESSION['retorno'] == 'apenas ida'){
            $assento_retorno = 'apenas ida';
        }else{
            $assento_retorno = filter_input(INPUT_POST, "assento_retorno$analisar", FILTER_SANITIZE_STRING);
        }

        // Removendo caracteres especiais de algumas variáveis
        $nome = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($nome)));
        $sobrenome = preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($sobrenome)));

        // Deixando o valor das variáveis abaixo em maiúscula
        $nome = strtoupper($nome);
        $sobrenome = strtoupper($sobrenome);


        // Sessões que vão armazenar o valor das variáveis acima
        $_SESSION["passageiro_nome$analisar"] = $nome;
        $_SESSION["passageiro_sobrenome$analisar"] = $sobrenome;
        $_SESSION["passageiro_cpf$analisar"] = $cpf_passageiro;

        // Variáveis do tipo booleano, que vão confirmar uma validação
        $passageiros_iguais = 0;
        $cpf_correto = 0;
        $cpf_igual = 0;
        $dono_cpf_certo = 0;

        // Quando chegar no segundo passageio, será validado se o anterior a ele tem nome e sobrenome igual, o que também serve para os passageios posteriores
        if($analisar > 1){
            validarPassageiros();
        }else{
            $passageiros_iguais = false;
        }
        
        // Condicionais que vão verificando o resultado das funções a partir das variáveis em booleanos
        // Condição que verifica se os nomes são iguais
        if($passageiros_iguais == false){
            validarCPF();
            // Condição que verifica se o CPF é valido
            if($cpf_correto == true){
                // Quando chegar no segundo passageio, será validado se o anterior a ele CPF igual, o que também serve para os passageios posteriores
                if($analisar > 1){
                    validarIgualdadeCPF();
                }else{
                    $cpf_igual = false;
                }
                // Condição que verifica se há CPFs iguais
                if($cpf_igual == false){
                    // Condição que verifica se o dono do CPF inserido é o mesmo do registrado no banco de dados
                    validarDonoCPF();
                    if($dono_cpf_certo == true){
                        $_SESSION["nome_passagem$analisar"] = $nome;
                        $_SESSION["sobrenome_passagem$analisar"] = $sobrenome;
                        $_SESSION["cpf_passagem$analisar"] = $cpf_passageiro;
                        $_SESSION["assento_passagem_ida$analisar"] = $assento;
                        $_SESSION["assento_passagem_volta$analisar"] = $assento_retorno;
                        header('Location: ../pagamento.php');
                    }else{
                        $_SESSION["passageiro_cpf$analisar"] = '';
                        $_SESSION["msg_cpf$analisar"] = "<p style='font-size: 13px' class='text-danger'>* CPF associado a outro nome</p>";
                        header('Location: ../info_passageiro.php');
                    }
                }else{
                    $_SESSION["passageiro_cpf$analisar"] = '';
                    $_SESSION["msg_cpf$analisar"] = "<p style='font-size: 13px' class='text-danger'>* O CPF não pode ser igual</p>";
                    header('Location: ../info_passageiro.php');
                }
            }else{
                $_SESSION["passageiro_cpf$analisar"] = '';
                $_SESSION["msg_cpf$analisar"] = "<p style='font-size: 13px' class='text-danger'>* CPF inválido</p>";
                header('Location: ../info_passageiro.php');
            }
        }else{
            $_SESSION["passageiro_nome$analisar"] = '';
            $_SESSION["passageiro_sobrenome$analisar"] = '';
            $_SESSION["msg_nome$analisar"] = "<p style='font-size: 13px' class='text-danger'>* Os passageiros não podem ter nomes iguais</p>";
            header('Location: ../info_passageiro.php');
        }
    }
?>