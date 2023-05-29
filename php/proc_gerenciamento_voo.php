<?php
session_start();
include_once("conexao.php");
// Este código possui a inserção dos dados de voo, colocando o local de partida e chegada, até o horário de ida e chegada ao aeroporto destino.
// -----------------------------------//
date_default_timezone_set('America/Sao_Paulo');

$pk_aviao = $_SESSION['pk_aviao'];

$permi = "SELECT fk_aviao FROM gestao_voo WHERE fk_aviao = $pk_aviao";
$permitido = mysqli_query($conn, $permi);


if (mysqli_num_rows($permitido) > 0){
  $_SESSION['msg'] = "<p style='color:red;'> JA EXISTE UMA ESCALA DE VOO PARA ESTA AERONAVE!</p>";
  header("Location: listar_aeronaves.php");

}

else {
  // INICIO DAS INSERÇÕES DE DADOS NO BANCO
$saida_enviar = $_POST['saida_enviar'];//Recebimento dos dados de data e horário do voo ao sair.
$chegada_enviar = $_POST['chegada_enviar'];//Recebimento dos dados de data e horário do voo ao sair.
$decolagem = filter_input(INPUT_POST, 'decolagem_enviar', FILTER_SANITIZE_STRING);
$pouso = filter_input(INPUT_POST, 'pouso_enviar', FILTER_SANITIZE_STRING);
$saida = date('Y-m-d H:i:s', strtotime($saida_enviar));
$chegada = date('Y-m-d H:i:s', strtotime($chegada_enviar)); 

// CONFERIR DE QUAL AEROPORTO ele esta saindo
$sql = "SELECT * FROM aeroportos WHERE lista_aeroportos = '$decolagem'";
$query = mysqli_query($conn, $sql);

$pk_aeroportos = mysqli_fetch_assoc($query);

// Verifica se a data de saída é anterior ou igual à data de chegada
if ($saida > $chegada) {
  $_SESSION['msg'] = "<p style='color:red;'>A data de saída deve ser anterior ou igual à data de chegada </p>";
  header("Location: ../gerenciamento_voo.php");

  }
  else if(strtotime($saida) < time()) {
    $_SESSION['msg'] = "<p style='color:red;'>A data de saída deve ser a partir de hoje.</p>";
    header("Location: ../gerenciamento_voo.php");
  } 

  else {
    // Insere os dados no banco de   dados
    // ...
    $sql = "INSERT INTO gestao_voo (local_voo, local_pouso, hora_partida, hora_chegada, fk_aviao, fk_aeroportos) VALUES ('$decolagem', '$pouso', '$saida', '$chegada', '$pk_aviao', '$pk_aeroportos[pk_aeroportos]')";
    $insert_cli = mysqli_query($conn, $sql);

    if(mysqli_insert_id($conn)){
      $_SESSION['msg'] = "<p style='color:green;'> CONCLUIDO!</p>";
      header("Location: listar_Aeronaves.php");
      
       
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>ERROR</p>";
        header("location: listar_aeronaves.php");
    }
  }


  

// FIM DA INSERÇÃO DE DADOS
// -----------------------------------//
}


?>
