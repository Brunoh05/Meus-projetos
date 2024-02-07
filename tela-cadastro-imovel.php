<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="./css/estiloP.css">
   <link rel="stylesheet" href="./css/cadastro-imovel.css">
   <title>PBRG</title>
</head>
<body>
    <div id="pp">
      <img id="logo" src="./img/logo.PNG" alt="">
         <nav>
            <a class="opcoes" href="tela-locacao.php">Locação</a>
         </nav>
         <nav>
            <a class="opcoes" href="tela-vantagens.php">Vantagens</a>
         </nav>
         <nav>
            <a class="opcoesE" href="#">Cadastrar imoveis</a>
         </nav>
         <nav>
            <a class="opcoes" href="tela-meus-imoveis.php">Meus imoveis</a>
         </nav>
         <nav>
            <a class="opcoes" href="sair.php">LOGOUT</a>
         </nav>
         <div class="hamburger">
         <div id="bar1" class="bar"></div>
         <div id="bar2" class="bar"></div>
         <div id="bar3" class="bar"></div>
      </div>
      <aside class="sidebar">
         <nav>
            <ul class="menu">
               <li class="menu-item"><a href="tela-locacao.php" class="menu-link">Locação</a></li>
               <li class="menu-item"><a href="tela-vantagens.php" class="menu-link">Vantagens</a></li>
               <li class="menu-item"><a href="#" class="menu-link">Cadastrar imoveis</a></li>
               <li class="menu-item"><a href="tela-meus-imoveis.php" class="menu-link">Meus imoveis</a></li>
               <li class="menu-item"><a href="sair.php" class="menu-link">LOGOUT</a></li>
            </ul>
         </nav>
      </aside>
    </div>
    <?php 
    include("conexao.php");
   ?><php>
      

<form id="form" class="form" action="gravar.php" method="POST" enctype="multipart/form-data">
        
   <div class="form-control">
		<label for="telefone">Contato:</label><br>
    <input type="text" name="telefone" id="telefone">
    <small></small><br><br>
   </div>

   <div class="form-control">
    <label for="mensalidade">Preço Diário:</label><br>
        <input type="text" name="mensalidade" id="mensalidade">
        <small></small><br><br>
   </div>
    
        <label for="selecao">Selecione o tipo do imóvel</label><br>
    <select name="selecao">
    <!--	enum('praia', 'campim', 'comum', 'apartamento -->
    <option value="apartamento">apartamento</option>
        <option value="campim">campim</option>
        <option value="casa">Casa</option>
        <option value="praia">Praia</option>
    </select><br><br>

    <label for="status">Selecione o estado atual</label><br>
    <select name="status">

        <option value="ocupado">OCUPADO</option>
        <option value="desocupado">DESOCUPADO</option>
    </select><br><br>

    <label for="cidade">Escolha uma cidade</label><br>
    <select name="cidade">
    <!--'jaraguadosul','saojose','balneariocamburiu','criciuma','florianopolis' -->
    <option value="jaraguadosul">Jaraguá do Sul</option>
    <option value="saojose">São José</option>
    <option value="balneariocamburiu">Balneário Camburiú</option>
    <option value="criciuma">Criciúma</option>
    <option value="florianopolis">Florianópolis</option>
</select><br><br>

   <div class="form-control">
   <label for="descricao">Insira a descrição do imóvel:</label><br>
   <textarea name="descricao" id="descricao" cols="30" rows="5"></textarea>
   <small></small><br><br>
   </div>

   <div class="form-control">
<label for="imagem">Imagem:</label>
		<input type="file" name="imagem" id="imagem"/>
      </div><br>

		<input type="submit" value="Enviar"/>

	</form>

   <div class="centro">
      <a href="https://discord.com/"><img class="icones" src="img/discord.svg"></a>
      <a href="https://x.com/GabrielHas98423?t=cpjRFAMSOKlflZjwScHZRw&s=08"><img class="icones" src="img/twitter-x.svg"></a>
      <a href="https://wa.me/qr/JYNU42NBHTLAF1"><img class="icones" src="img/whatsapp.svg"></a>
    </div>

</body>
<script src="./scripts/script.js"></script>
   <script src="./scripts/validacao.js"></script>
</html>