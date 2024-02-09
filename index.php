<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['id_usuario'])) {

    // Obtém o id do usuário
    $id_usuario = $_SESSION['id_usuario'];
}
require_once 'conexao.php';
$u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Projeto login</title>
        <link rel="stylesheet" href="CSS/arquivo.css">
    </head>
    <body>
        <div id="corpo-form">
            <div class="overlay">
                <h1 class="nome-logo">PBRG</h1>
                <h1>ENTRAR</h1>
                <form method="POST"> 
                    <input type="email" placeholder="Usuario" name="email">
                    <input type="password" placeholder="Senha" name="senha">
                    <input type="submit"  value="ACESSAR">
                    <a class="a1" href="cadastrar.php">Ainda nao possui cadastro<strong></strong></a>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['email']))
        {
        
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
           

            if( !empty($email) && !empty($senha))
            {
                $u->conectar("pbrg2","localhost","root","");
                if($u->msgErro == "")

                if($u->logar($email,$senha)){

                    header("location: tela-locacao.php");

                }else{
                    ?>
                    <div class="msg-erro">
                    Email e/ou senha estao incorretos!
                </div>
                    <?php
                }
                else{
                    ?>
                    <div class="msg-erro">
                   <?php echo "Erro: ".$u->msgErro ?>;
                </div>
                    <?php
                   
                }

            }else{
                ?>
                    <div class="msg-erro">
                    Preencha todos os campos!
                </div>
                    <?php
            }
        }

        ?>

    </body>
</html>

