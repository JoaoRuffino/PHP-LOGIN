<?php

require_once "config.php";
include_once "cabecalho.html";


$codigo = $_GET['id'];

$consulta = $conexao->prepare("SELECT * FROM tabclientes WHERE cliId = :cliId");

$consulta->bindValue('cliId', $codigo, PDO::PARAM_INT);

$consulta->execute();

echo "<a href='listar_clientes.php' class='btn'>Listagem de clientes</a>";
echo "<a href='excluir_cliente_action.php?id=$codigo' class='btn red'>Sim, excluir registro.</a>";
echo "</div></div></div>";




?>