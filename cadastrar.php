<?php
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
        <div id="corpo-form-cad">
        <h1> CADASTRAR</h1>
        <form method="POST"> 
             <input type="text" name="nome" placeholder="Nome" maxlength="30">
            <input type="email" name="email" placeholder="Email" maxlength="40">
              <input type="password" name="senha" placeholder="Senha" maxlength="15" >
               <input type="password" name="confiSenha"placeholder="Confirmar Senha">
                <input type="submit" value="cadastrar">
                <a class="a2" href="index.php">Voltar para login<strong></strong></a>
        </form>
        </div>
        <?php

        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['confiSenha']);

            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
            {
                $u->conectar("pbrg2","localhost","root","");
                if($u->msgErro == "")
                {
                    if($senha == $confirmarSenha)
                    {
                        if($u->cadastrar($nome,$email,$senha))
                        {
                            ?>
                            <div id="msg-sucesso">
                            echo "Cadastrado com sucesso! Acesse para entrar!";
                        </div>
                            <?php

                        }else{
                            ?>
                            <div class="msg-erro">
                            email ja cadastrado!
                        </div>
                            <?php
                        }

                    }else{

                        ?>
                            <div class="msg-erro">
                        senha e confirmar senha nao correspondem
                        </div>
                            <?php
                    }
                   

                }else
                {
                    ?>
                            <div class="msg-erro">
                                <?php echo "Erro:".$u->msgErro;?>
                    </div>
                            <?php
                }


            }else
            {
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
