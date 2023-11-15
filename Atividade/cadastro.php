<?php


include_once('config.php');

if(isset($_POST['btncadastrar'])){

    $funNome = filter_input(INPUT_POST, 'txtnome');
    $funSenha = filter_input(INPUT_POST, 'txtsenha');
    $funEmail = filter_input(INPUT_POST, 'txtemail');
    $funCargo = filter_input(INPUT_POST, 'txtcargo');
    $funUsuario = filter_input(INPUT_POST, 'txtusuario');
    $funFoto = filter_input(INPUT_POST, 'txtfoto');



    
    $query = $conexao->prepare('INSERT INTO tabfuncionarios (funNome, funSenha, funEmail, funCargo, funUsuario, funFoto) VALUES (:funNome, :funSenha, :funEmail, :funCargo, :funUsuario, :funFoto)');
    
    $query->bindvalue(':funNome', $funNome, PDO::PARAM_STR);
    $query->bindvalue(':funSenha', $funSenha, PDO::PARAM_STR);
    $query->bindvalue(':funEmail', $funEmail, PDO::PARAM_STR);
    $query->bindvalue(':funCargo', $funCargo, PDO::PARAM_STR);
    $query->bindvalue(':funUsuario', $funUsuario, PDO::PARAM_STR);
    $query->bindvalue(':funFoto', $funFoto, PDO::PARAM_STR);


    $query->execute();

}

header('Location: form_cadastrar_clientes.php');


?>

