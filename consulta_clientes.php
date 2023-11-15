<?php


// echo "<h1>Consulta de Clientes</h1>";

// $dado = '%a%';

// $query = "SELECT * FROM tabclientes WHERE clinome LIKE '$dado' ORDER BY clinome";

// $consulta = $conexao->prepare($query);
// $consulta->execute();


// while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
    //     echo "<pre>";
    //     var_dump($registro);
    //     echo "</pre>"; 
    // }
    
include_once "config.php";
include_once "cabecalho.html";
    
$campos_form = filter_input_array(INPUT_GET, FILTER_DEFAULT);

if(!empty($campos_form['btnPesquisar'])){
    $dado = "%" . $campos_form['txtPesquisar'] . "%";

    $query = "SELECT * FROM tabclientes WHERE cliNome LIKE :valor OR cliTelefone LIKE :valor OR cliDataNasc LIKE :valor ORDER BY cliId ASC";
    $consulta = $conexao->prepare($query);
    $consulta->bindParam(':valor', $dado, PDO::PARAM_STR);
    $consulta->execute();
    while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
        extract($registro);
        echo "<hr>";
        echo "ID: $cliId <br>";
        echo "Nome: $cliNome <br>";
        echo "Telefone: $cliTelefone <br>";
        echo "Data de Nascimento: $cliDataNasc <br>";
        echo "<hr>";
    }
}

?>