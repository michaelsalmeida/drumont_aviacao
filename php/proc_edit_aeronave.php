<?php
session_start();
include_once("conexao.php");

//Aqui serão trazidos as informações do formulario da pagina editar_aeronaves 

$idaviao = filter_input(INPUT_POST,  'pk_aviao', FILTER_SANITIZE_NUMBER_INT);
$num_serie = filter_input(INPUT_POST, 'num_serie', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$operacao = filter_input(INPUT_POST, 'operacao', FILTER_SANITIZE_STRING);

// nessa linha ele verifica se esta aeronave possu um voo, caso sim ele não permite que ele mude a operação do avião.
$validar = "SELECT fk_aviao FROM gestao_voo WHERE fk_aviao = '$idaviao'";
$valido= mysqli_query($conn, $validar);

    if(mysqli_num_rows($valido)> 0){
        $_SESSION['msg'] = "<p style='color:red;' > A AERONAVE AINDA NÃO POUSOU</P>";
        header("Location: listar_aeronaves.php");

    }else{
        //nesse if ele faz atualização entre 'operando' e 'desativado'
        $result_aviao = "UPDATE aviao SET num_serie='$num_serie', modelo='$modelo', operacao = '$operacao' WHERE pk_aviao ='$idaviao'";
        $resultado_aviao = mysqli_query($conn, $result_aviao);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> AVIÃO EDITADO COM SUCESSO </p>";
        header("Location: listar_aeronaves.php");

    }else{
        $_SESSION['msg'] = "<p style='color:red;'> AVIÃO NÃO FOI EDITADO </p>";
        header("Location: edit_aeronaves.php? pk_aviao = $idaviao");
    }
    }


?>