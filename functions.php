<?php

    $servidor = 'localhost:3307';
    $usuario = 'root';
    $senha = '';
    $dbname = 'maverickdb';

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


    function verificarAnimaisIda (){
        // $qtdAnimal = $_GET['qtdani'];
        // $nome = $_SESSION['partida'];
        // $data = $_SESSION['data_partida'] . "%";

        $qtdAnimal = 3;
        $nome = 'Aeroporto de São Paulo/Congonhas (CGH)';
        $data = '2023-09-10';

        global $conn;
        

        // aviao - gestao_voo

        $stmt = $conn -> prepare('UPDATE gestao_voo
        SET quant_animal = ?
        WHERE local_voo = ? and 
        hora_partida like ?');

        $stmt -> bind_param('sss', $qtdAnimal, $nome, $data);

        $stmt -> execute();

        $result = $stmt -> get_result();

        echo $result;

        if (mysqli_affected_rows($conn) > 0){
            echo 'funfou';
        } else {
            echo 'deu merda';
        }


    }

    echo verificarAnimaisIda();


?>