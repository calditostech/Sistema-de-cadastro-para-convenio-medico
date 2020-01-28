<?php

require_once 'conexao.php';


session_start();


if(isset($_SESSION['logado'])):
  header('Location:TelaLogin.php');
endif;

$id = $_SESSION['id'];
$sql = "select * from sistemateste where id = '$id'";
$resultado = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conexao);
?>

    <html lang="pt-br">
       <head>
           <meta charset="utf-8">
           <title>SaudeVita</title>
           <link rel="icon" href="css/familia2.jpg">
           <link rel = "stylesheet" href="css/estilo.css">
        </head>
        <body>
          <header>Saude Vita</header><h5>O Convenio da Familia</h5>
          <h3>Ola,<?php echo $dados['nome']; ?> </h3>
          <a href = "logout.php">Sair</a>
    
       </body>
    </html>
