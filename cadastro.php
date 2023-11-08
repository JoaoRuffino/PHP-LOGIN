<?php


include_once('config.php');

if(isset($_POST['btncadastrar'])){

    $cliNome = filter_input(INPUT_POST, 'txtnome');
    $cliTelefone = filter_input(INPUT_POST, 'txtfone');
    $cliDataNasc = filter_input(INPUT_POST, 'txtdatanasc');
    
    $query = $conexao->prepare('INSERT INTO tabclientes (cliNome, cliTelefone, cliDataNasc) VALUES (:cliNome, :cliTelefone, :cliDataNasc)');
    
    $query->bindvalue(':cliNome', $cliNome, PDO::PARAM_STR);
    $query->bindvalue(':cliTelefone', $cliTelefone, PDO::PARAM_STR);
    $query->bindvalue(':cliDataNasc', $cliDataNasc, PDO::PARAM_STR);

    $query->execute();

}

header('Location: form_cadastrar_clientes.php');


?>

