<?php
    //Declaração das propriedades da conexão
    $user="root";
    $pass="*****";
    $ip="localhost";
    $db="filmes";

    //Cria a conexão com o banco de dados
    $conn = new mysqli($ip, $user, $pass,$db);

?>