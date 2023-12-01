<?php
include_once 'config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="css/estilos.css">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Loja de Sapatos</title>
</head>
<body>

    <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><img src="imagens/tenis-de-corrida.png" alt="Tênis de corrida"></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="listar_clientes.php">Funcionários</a></li>
            <li><a href="index.php">Produtos</a></li>
          </ul>
        </div>
      </nav>

      <section>
    
<?php

echo "<h2>Carrinho de compra</h2>";
// Adiciona produto ao carrinho
if (isset($_GET['codigo'])) {
   $proId = $_GET['codigo'];
   $quant = 1;

   // Verifica se o produto já está no carrinho
   $stmt = $conexao->prepare("SELECT * FROM tabcarrinho WHERE carProId = :proId");
   $stmt->bindParam(':proId', $proId);
   $stmt->execute();
   
?>

   <table>
      <tr>
         <th>Item</th>
         <th>Produto</th>
         <th>Quantidade</th>

      </tr>

   <?php
   if ($stmt->rowCount() > 0) {
      // Atualiza a quantidade se o produto já estiver no carrinho
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $quant += $row['carQtde'];
      $stmt = $conexao->prepare("UPDATE tabcarrinho SET carQtde = :qt WHERE carProId = :prod");
   } else {
      // Adiciona o produto ao carrinho se não estiver lá
      $stmt = $conexao->prepare("INSERT INTO tabcarrinho (carProId, carQtde ) VALUES (:prod, :qt)");
   }

   $stmt->bindParam(':prod', $proId);
   $stmt->bindParam(':qt', $quant);
   $stmt->execute();
}
/* listando os dados adicionados ao carrinho
   */
$sql = "SELECT tabcarrinho.*, tabprodutos.proDescricao AS descricao FROM tabcarrinho INNER JOIN tabprodutos ON tabcarrinho.carProId = tabprodutos.proId";

$stmt = $conexao->prepare($sql);
$stmt->execute();
while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo "<tr><td>{$linha['carId']}</td>";
   echo "<td>{$linha['descricao']}</td>";
   echo "<td>{$linha['carQtde']}</td></tr>";
}
echo "</table>";

?>

      </section>

      <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Desenvolvimento Fullstack</h5>
              <p class="grey-text text-lighten-4">Exemplo simples desenvolvido com base para exemplificar o desenvolvimento PHP com Banco de Dados</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Clientes</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Funcionários</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Produtos</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2023 Copyright Fullstack
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>
    
</body>
</html>