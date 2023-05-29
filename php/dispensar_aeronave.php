<?php
    session_start();
    include_once("conexao.php");

    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $data = date('Y-m-d H:i:s'); 


    $pk_aviao = filter_input(INPUT_POST, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);

    $validar = "SELECT hora_chegada FROM gestao_voo WHERE fk_aviao = '$pk_aviao'";

if ($data !=  $validar){
    $_SESSION['msg'] = "<p style='color:red;' > ESTÁ AERONAVE AINDA NÃO POUSOU</P>";
        header("Location: listar_aeronaves.php");

}
else{
   
    if (!empty($pk_aviao)){
        $result_usuario = "DELETE FROM gestao_voo WHERE fk_aviao = '$pk_aviao'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;' > AERONAVE LIBERADA</P>";
            header("Location: listar_aeronaves.php");
        }else{
    
            $_SESSION['msg'] = "<p style='color:red;'> ERRO: AERONAVE NÃO FOI LIBERADA OU NÃO EXISTE NENHUM VOO ESCALADO PARA ESTE AVIÃO</p>";
            header("Location: listar_aeronaves.php");
        }
    }
}
?>