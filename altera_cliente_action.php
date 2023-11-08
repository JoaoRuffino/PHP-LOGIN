<?php
require_once "config.php";
include_once "cabecalho.html";


    $cliId = $_POST['txtid'];
    $cliNome = $_POST['txtnome'];
    $cliTelefone = $_POST['txtfone'];
    $cliDataNasc = $_POST['txtdatanasc'];
    $query = $conexao->prepare("UPDATE tabclientes SET cliNome = :cliNome, cliTelefone = :cliTelefone, cliDataNasc = :cliDataNasc
    WHERE cliId = :cliId");
    
    $query->bindvalue(':cliId', $cliId, PDO::PARAM_INT);
    $query->bindvalue(':cliNome', $cliNome, PDO::PARAM_STR);
    $query->bindvalue(':cliTelefone', $cliTelefone, PDO::PARAM_STR);
    $query->bindvalue(':cliDataNasc', $cliDataNasc, PDO::PARAM_STR);

    $query->execute();

    echo "<div class='card'><br>";
    echo "<b>Nome       = </b>$cliNome<br>
    <b>Telefone       = </b>$cliTelefone<br>
    <b>Data Nasc.      = </b>$cliTelefone<br>";
    echo "</div>";

    echo "<a href='listar_clientes.php' class='btn'>Listagem de Clientes</a>";





?>