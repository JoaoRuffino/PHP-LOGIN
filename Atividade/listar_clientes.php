
<?php

include_once ('config.php');
include_once('cabecalho.html');


$consulta = $conexao->prepare('Select * from tabfuncionarios');
$consulta->execute();
?>
<title>Lista de Funcionários</title>
</head>


<body>
   <h2>Listagem de Funcionários</h2>
   <table>
      <tr>
         <th>Código</th>
         <th>Nome</th>
         <th>Senha</th>
         <th>Email</th>
         <th>Cargo</th>
         <th>Usuario</th>
         <th>Foto</th>
      </tr>
      <?php
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr><td>{$linha['funId']}</td>";
         echo "<td>{$linha['funNome']}</td>";
         echo "<td>{$linha['funSenha']}</td>";
         echo "<td>{$linha['funEmail']}</td>";
         echo "<td>{$linha['funCargo']}</td>";
         echo "<td>{$linha['funUsuario']}</td>";
         echo "<td><img style='width:60px' src='imagens/{$linha['funFoto']}.jpg'</td>";
        
      }
      echo "</table> <br/><br/>";
      echo "<a href='form_cadastrar_clientes.php' class='btn'>Adicionar Funcionário</a>";
      
   
      ?>



