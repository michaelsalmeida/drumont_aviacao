<?php
session_start();
include_once('conexao.php');
unset($_SESSION['verifica_login']);
unset($_SESSION['verifica_cliente']);
unset($_SESSION['nome_cliente'] );
unset($_SESSION['sobrenome_cliente']);
unset($_SESSION['cpf_cliente'] );
unset($_SESSION['datanasci_cliente']);
//Tabela cadastro
unset($_SESSION['email_cliente'] );
unset($_SESSION['senha_cliente'] );
unset($_SESSION['funcionamento_cliente'] );
//Tabela rg
unset($_SESSION['rg_cliente'] );
//Tabela endereco
unset($_SESSION['cep_cliente'] );
unset($_SESSION['rua_cliente'] );
unset($_SESSION['bairro_cliente']);
unset($_SESSION['cidade_cliente']);
unset($_SESSION['uf_cliente']);
//Tabela contato_cliente$_SESSION['numero_cliente']);
unset($_SESSION['telefone_cliente']);
unset($_SESSION['celular_cliente']);

header('Location: ../index.php');
?>