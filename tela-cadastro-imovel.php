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
         <div class="hamburger">
         <div id="bar1" class="bar"></div>
         <div id="bar2" class="bar"></div>
         <div id="bar3" class="bar"></div>
      </div>
      <aside class="sidebar">
         <nav>
            <ul class="menu">
               <li class="menu-item"><a href="#" class="menu-link">Locação</a></li>
               <li class="menu-item"><a href="tela-vantagens.php" class="menu-link">Vantagens</a></li>
               <li class="menu-item"><a href="tela-cadastro-imovel.php" class="menu-link">Cadastrar imoveis</a></li>
               <li class="menu-item"><a href="tela-meus-imoveis.php" class="menu-link">Meus imoveis</a></li>
            </ul>
         </nav>
      </aside>
    </div>
    <?php 
    include("conexao.php");
   ?><php>
      

<form action="gravar.php" method="POST" enctype="multipart/form-data">
        
		<label for="telefone">Contato:</label><br>
    <input type="text" name="telefone"><br><br>

    <label for="mensalidade">Preço diário:</label><br>
        <input type="text" name="mensalidade"><br><br>
    
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

<label for="descricao">Insira a descrição do imóvel:</label><br>
<textarea name="descricao" cols="30" rows="5"></textarea><br><br>


<label for="imagem">Imagem:</label>
		<input type="file" name="imagem"/>
		<br>

		<input type="submit" value="Enviar"/>
	</form>

</body>
<script src="./scripts/script.js">

   </script>
</html>