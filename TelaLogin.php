<?php
require_once 'conexao.php';

session_start();

if(isset($_POST['btn'])):
   $erros = array();
   $nome =  mysqli_escape_string($conexao, $_POST['nome']);
   $senha = mysqli_escape_string($conexao, $_POST['senha']);
  

  if(empty($nome) or empty($senha)):
    $erros[] = "<li> o campo login/senha precisa ser preenchido </li>";

  else:
     $sql = "SELECT nome FROM sistemateste WHERE nome = '$nome'";
     $resultado = mysqli_query($conexao, $sql);
     if(mysqli_num_rows($resultado) > 0):
      $senha = ($senha);

       
     $sql = "SELECT * FROM sistemateste WHERE nome = '$nome' AND senha = '$senha'";

     $resultado = mysqli_query($conexao,$sql);

     if(mysqli_num_rows($resultado) == 1):
      $dados = mysqli_fetch_array($resultado);
      mysqli_close($conexao);


      $_SESSION['logado'] = true;
      $_SESSION['id'] = $dados['id'];
      header("Location: logado.php");
     else:
      $erros[] = "<li> Usuario e senha nao conferem </li>"; 
     endif;

     else:
    
     $erros[] = "<li> Usuario inexistente </li>";

     endif;

     endif;

     endif;
?>


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
          <?php
          if (!empty($erros)):
            foreach($erros as $erro):
              echo $erro;
            endforeach;
          endif;

          ?>
          <div class = "container">
            <form class = "login" action="logado.php" method ="post">
            <h3>Faça seu login</h3>
            NOME:<br><input type ="text" name="nome" class="campo" placeholder="Nome:"><br><br>
            SENHA:<br><input type="password" name="senha"class="campo"placeholder="Senha:"><br><br>
            <button id = "btn" type="submit" onclick="alert('Bem Vindo a Saude Vita')">Logar</button>
            <br><br>
          </form>
          <form class="cadastro" method="post" action="processa.php">
             <h3>Não realizou cadastro?,cadastre aqui:</h3>
            NOME:<br><input type ="text" name="nome" class="campo"><br>
            LOGIN:<br><input type="text" name="login"class="campo"><br>
            SENHA:<br><input type="password" name="senha"class="campo"><br><br>
            <button>Cadastrar</button>
          </form>
            </div>
            <script>
              var botao = document.getElementById('btn')

              botao.addEventListener('bem vindos',function(){
                alert('Bem vindos')
              })

            </script>
       </body>
    </html>
