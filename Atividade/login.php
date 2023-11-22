<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>Login</h1><br><br><br>

        <form action="login.php" method="POST">
        <label for="usuario">Insira seu nome de Usuário:</label>
        <input type="text" id="usuario" placeholder="Nome de Usuário" name="funUsuario"><br><br><br>

        <label for="senha">Insira sua senha:</label>
        <input type="password" id="senha" placeholder="Senha" name="funSenha"><br><br><br>

        <button type="submit" class="btn" name="btnacessar">Acessar</button>
        <button type="reset" class="btn">Cancelar</button>

        <button type ="submit" name="btnreset" class="btn blue">Resetar Tentativas</button>

        <a href="form_cadastrar_clientes.php" class="btn red">Cadastro</a>


        </form>
    </div>
</body>
</html>

<?php 

session_start();
$_SESSION['count'];
include_once('config.php');

if(isset($_POST['btnacessar'])){
    $funUsuario = filter_input(INPUT_POST, 'funUsuario');
    $funSenha = filter_input(INPUT_POST, 'funSenha');


    $rows = 0;

    $query = $conexao->prepare('SELECT * FROM tabfuncionarios WHERE funUsuario = :funUsuario AND funSenha = :funSenha');

    $query->bindvalue(':funUsuario', $funUsuario, PDO::PARAM_STR);
    $query->bindvalue(':funSenha', $funSenha, PDO::PARAM_STR);

    $query->execute();

    $rows = $query->rowCount();

    if($rows > 0 && $_SESSION['count'] < 3){
        header('Location: listar_clientes.php');
    }else if($_SESSION['count'] < 3){
        $_SESSION['count']++;
        echo "Senha ou Usuario incorreto";
        echo "<br>Tentativas: " . $_SESSION['count'];
    }else{
        echo "<br><br>Número limite de tentativas atingido!";
        
    }


}
if(isset($_POST['btnreset'])){
    $_SESSION['count'] = 0;
}

?>