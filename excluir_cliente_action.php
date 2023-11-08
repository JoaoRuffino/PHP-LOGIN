<?php

require_once "config.php";
include_once "cabecalho.html";


$codigo = $_GET['id'];

$query = $conexao->prepare("DELETE FROM tabclientes WHERE cliId = :cliId");

$query->bindValue('cliId', $codigo, PDO::PARAM_INT);

$query->execute();

header('Location: listar_clientes.php');


?>