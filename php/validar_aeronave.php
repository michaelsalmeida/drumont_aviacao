<?php
session_start();
include_once("conexao.php");

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

// neste codigo ele ira filtrar as informações trazidas do formulario da página inserir_aeronaves.php e passara as informações para as novas variáveis.
$num_serie = filter_input (INPUT_POST, 'num_serie', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$num_assento = filter_input(INPUT_POST, 'num_assentos', FILTER_SANITIZE_NUMBER_INT);

$aviao = "SELECT * FROM aviao WHERE num_serie = '$num_serie' and modelo = '$modelo'";
$result = mysqli_query($conn , $aviao);

if (mysqli_num_rows($result) > 0){
    header("Location: ../inserir_aeronave.php");
    $_SESSION['msg'] = "<p style='color:red;'> AERONAVE JÁ EXISTENTE OU O AVIÃO NÃO PODE SER INSERIDO</p>";
}
 
else {
    // nesta linha, sarão inseridos na tabala do nosso banco de dados as informações da linha antertior. 
    $inserir_aeronaves = "INSERT INTO aviao (num_serie, modelo, num_assento) VALUES ('$num_serie', '$modelo', '$num_assento')";
    $aeronave_inserida = mysqli_query($conn, $inserir_aeronaves);

    // caso a conexão da pagina anterior ocorra com sucesso, será enviada esta mensagem na pagina.
    header("Location: ../inserir_aeronave.php");
    $_SESSION['msg'] = "<p style='color:green;'> AVIÃO INSERIDO COM SUCESSO</P>";
}
?>

