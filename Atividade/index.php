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
        <h2>Produtos para venda</h2>

<?php        

      function mostrarDados($linha)
        {
           echo "<div class='col s12 m4'>";
           echo "<div class='card'>";
           echo "<div class='card-image'>";
           echo "<td><img src='imagens/{$linha['proImagem']}.jpg'><br></div>";
           echo "<div class='card-content'><p>Descrição do Card 3</p></div>";
           echo "<div class='card-action'><a href='#' class='btn'>Botão 3</a></div></div>";
        }
        echo "<hr>";
        $consulta = $conexao->prepare('Select * from tabprodutos');
        $consulta->execute();
        $f = $consulta->rowCount();
        
        echo "<table class='responsive-table centered'>";
        $li = 1;
        echo "<tr>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
           echo "<td><img width='300' height='300' src='imagens/{$linha['proImagem']}.jpg'><br>";
           echo "<a href='carrinho.php?codigo={$linha['proId']}'>{$linha['proDescricao']}</a><br>";
           echo "R$ {$linha['proPreco']}<br>";
        
           echo "<a href='carrinho.php?codigo={$linha['proId']}' class='waves-effect waves-light btn'>Comprar";
           echo "<i class='small material-icons'>local_grocery_store</i></a>";
        ?>   
        
              <!--
          Sizes:
          tiny: 1rem
          small: 2rem
          medium: 4rem
          large: 6rem
          -->
        
          
           </td>
        <?php
           $li++;
           if ($li == 4) {
              $li = 1;
              echo "</tr><tr>";
           }
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