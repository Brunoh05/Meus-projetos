<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "pbrg2";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/estiloP.css">
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
            <a class="opcoes" href="tela-cadastro-imovel.php">Cadastrar imoveis</a>
         </nav>
         <nav>
            <a class="opcoesE" href="#">Meus imoveis</a>
         </nav>
         <div class="hamburger">
         <div id="bar1" class="bar"></div>
         <div id="bar2" class="bar"></div>
         <div id="bar3" class="bar"></div>
      </div>
      <aside class="sidebar">
         <nav>
            <ul class="menu">
               <li class="menu-item"><a href="tela-lacacao.php" class="menu-link">Locação</a></li>
               <li class="menu-item"><a href="tela-vantagens.php" class="menu-link">Vantagens</a></li>
               <li class="menu-item"><a href="tela-cadastro-imovel.php" class="menu-link">Cadastrar imoveis</a></li>
               <li class="menu-item"><a href="#" class="menu-link">Meus imoveis</a></li>
            </ul>
         </nav>
      </aside>
    </div>
    <?php 
    include("conexao.php");
   ?><php>
      
      <div class="centro">
      <a href="https://discord.com/"><img class="icones" src="img/discord.svg"></a>
      <a href="https://x.com/GabrielHas98423?t=cpjRFAMSOKlflZjwScHZRw&s=08"><img class="icones" src="img/twitter-x.svg"></a>
      <a href="https://wa.me/qr/JYNU42NBHTLAF1"><img class="icones" src="img/whatsapp.svg"></a>
    </div>

</body>
   <script src="./scripts/script.js"></script>
</html>