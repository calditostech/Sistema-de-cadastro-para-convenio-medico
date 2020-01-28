<!DOCTYPE html>
    <html lang="pt-br">
       <head>
       	   <meta charset="utf-8">
       	   <title>SaudeVita</title>
           <link rel="icon" href="css/familia2.jpg">
       	   <link rel = "stylesheet" href="css/estilo.css">
       	</head>
       	<body>
          <header>Saude Vita</header><h5>O Convenio da Familia</h5>
       </body>
    </html>
<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];


$sql = "insert into sistemateste (nome,login,senha) values ('$nome','$login','$senha')";

$salvar = mysqli_query($conexao,$sql);
$linhas = mysqli_affected_rows($conexao);
mysqli_close($conexao);

?>
<h1>Confirmação de Cadastro</h1>
<a href="TelaLogin.php"><h4>Voltar</h4>

<?php

if($linhas == 1){
	print"Cadastro efetuado com sucesso";
}else{
	print"Cadastro nao efetuado";
}


?>