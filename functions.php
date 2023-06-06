<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $dbname = 'maverickdb';

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


    function verificarAnimaisIda (){
        $idIda = $_GET['partida'];

        global $conn;
        
        $stmtIda = $conn -> prepare('SELECT quant_animal FROM gestao_voo WHERE  pk_voo = ?');

        $stmtIda -> bind_param('s', $idIda);

        $stmtIda -> execute();

        $stmtIda->bind_result($quant_animal);

        if ($stmtIda->fetch()){
            echo $quant_animal;
        } else {
            echo -1;
        }
    }

    verificarAnimaisIda();
?>