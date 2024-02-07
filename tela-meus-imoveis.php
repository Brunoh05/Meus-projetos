<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "pbrg2";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-9">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">

    <link rel="stylesheet" href="./css/meus-imoveis.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
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
         <nav>
            <a class="opcoes" href="sair.php">LOGOUT</a>
         </nav>
         <div class="hamburger">
         <div id="bar0" class="bar"></div>
         <div id="bar1" class="bar"></div>
         <div id="bar2" class="bar"></div>
      </div>
      <aside class="sidebar">
         <nav>
            <ul class="menu">
               <li class="menu-item"><a href="tela-lacacao.php" class="menu-link">Locação</a></li>
               <li class="menu-item"><a href="tela-vantagens.php" class="menu-link">Vantagens</a></li>
               <li class="menu-item"><a href="tela-cadastro-imovel.php" class="menu-link">Cadastrar imoveis</a></li>
               <li class="menu-item"><a href="#" class="menu-link">Meus imoveis</a></li>
               <li class="menu-item"><a href="sair.php" class="menu-link">LOGOUT</a></li>
            </ul>
         </nav>
      </aside>
    </div>
    <?php
// Supondo que você já capturou o id_usuario na sessão após o login

// Verifica se a sessão e o id_usuario estão definidos

session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}
else{
    $id_usuario = $_SESSION['id_usuario'];
}


// Conexão com o banco de dados (utilize suas credenciais)

// Realize a conexão
$conn = new mysqli($host, $username, $password, $db);

// Verifique se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id_usuario = $conn->real_escape_string($id_usuario);

$sql = "SELECT * FROM imovel WHERE id_usuario = '$id_usuario'";

// Realize a consulta e atribua o resultado a $result
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Consulta SQL para obter os imóveis associados ao usuário logado



// Exiba os imóveis em um formulário para edição
?>


    <!-- Exibição dos imóveis em um formulário -->

        <?php while ($row = $result->fetch_assoc()) { ?>
                <form action="atualizar_imovel.php" method="POST">

      <div class="col">

        <div id="imovel" class=" py-4">

        <div class="card shadow-sm">
 
            <div class="card-body">

            <div class="form-control">
                <h2>Imóvel ID: <?php echo $row['id_imovel']; ?></h2>
                <input type="hidden" name="id_imovel" value="<?php echo $row['id_imovel']; ?>">

                <label for="selecao">Descrição:</label><br> 
                <input type="text" name="descricao" value="<?php echo $row['descricao']; ?>"><br><br>
                
                <label for="selecao">Contato:</label><br> 
                <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"><br><br>

    <label for="cidade">Escolha uma cidade:</label><br>

        <select name="cidade">
        <option value="jaraguadosul" <?php echo $row['cidades'] == 'jaraguadosul' ? "selected" : ""; ?>>Jaraguá do Sul</option>
        <option value="saojose" <?php echo $row['cidades'] == 'saojose' ? "selected" : ""; ?>>São José</option>
        <option value="balneariocamburiu" <?php echo $row['cidades'] == 'balneariocamburiu' ? "selected" : ""; ?>>Balneário Camboriú</option>
        <option value="criciuma" <?php echo $row['cidades'] == 'criciuma' ? "selected" : ""; ?>>Criciúma</option>
        <option value="florianopolis" <?php echo $row['cidades'] == 'florianopolis' ? "selected" : ""; ?>>Florianópolis</option>
    </select><br><br>

    <label for="selecao">Selecione o tipo do imóvel:</label><br> 
        <select name="selecao">
        <!--	enum('praia', 'campim', 'comum', 'apartamento -->
        <option value="apartamento">Apartamento</option>
            <option value="campim">Campim</option>
            <option value="casa">Casa</option>
            <option value="praia">Praia</option>
        </select><br><br>

        
        <label for="mensalidade">Preço Diário:</label><br>
        <input type="text" name="mensalidade" value="<?php echo $row['valor']; ?>">
            <small></small><br><br>
        

    <label for="status">Selecione o estado atual</label><br>
        <select name="status">

            <option value="ocupado" <?php echo $row['status_atual'] == 'ocupado' ? "selected" : ""; ?>>OCUPADO</option>
            <option value="desocupado"<?php echo $row['status_atual'] == 'desocupado' ? "selected" : ""; ?>>DESOCUPADO</option>
        </select><br><br>

                <!-- Adicione outros campos e valores do imóvel -->

                <input type="submit" value="Salvar alterações">


                </div>

            </div>

      </div>

  </div>

</div>
</form>
<?php } ?>



    
    

      
      <div class="centro">
      <a href="https://discord.com/"><img class="icones" src="img/discord.svg"></a>
      <a href="https://x.com/GabrielHas98422?t=cpjRFAMSOKlflZjwScHZRw&s=08"><img class="icones" src="img/twitter-x.svg"></a>
      <a href="https://wa.me/qr/JYNU41NBHTLAF1"><img class="icones" src="img/whatsapp.svg"></a>
    </div>

</body>
    <?php 
    include("conexao.php");
   ?><php>
    
   <script src="./scripts/script.js"></script>
</html>