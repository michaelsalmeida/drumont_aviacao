<?php
session_start();
include_once("conexao.php");
//receber o id que vem com a url
$id = filter_input(INPUT_GET, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);


// apaga as informações 

if (!empty($id)){
    $result_id = "DELETE FROM aviao WHERE pk_aviao = '$id'";
    $resultado_id = mysqli_query($conn, $result_id);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;' >  AVIÃO DELETADO COM SUCESSO</P>";
        header("Location: listar_aeronaves.php");
    }else{

        $_SESSION['msg'] = "<p style='color:red;'> Erro: AVIÃO NÃO FOI APAGADO</p>";
        header("location: listar_aeronaves.php");
    }

}else{
    $_SESSION['msg'] = "<p style='color:red;'>   AVIÃO NÃO FOI CADASTRADO</p>";
    header("Location: listar_aeronaves.php");
}
?>