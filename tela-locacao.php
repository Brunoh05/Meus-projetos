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

    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/locacao.css">
    <link rel="stylesheet" href="./css/estiloP.css">
    <title>PBRG</title>
</head>
<body>
    <div id="pp">
      <img id="logo" src="./img/logo.PNG" alt="">
      <nav>
         <a class='opcoesE' href="#">Locação</a>
      </nav>
      <nav>
         <a class="opcoes" href="tela-vantagens.php">Vantagens</a>
      </nav>
      <nav>
         <a class="opcoes" href="tela-cadastro-imovel.php">Cadastrar imoveis</a>
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
    session_start();
    echo "<h1 class='nome'>Bem-vindo(a),  ".$_SESSION['login']."!</h1>";
    ?><php> 
      

    <!-- barra de pesquisa -->
     
    <div>
        <form action="" method="POST">
          <div id="pes">
            <input type="text" name="txtBuscar1" id="barraPesquisa" placeholder="pesquisar: valor, cidade e tipo...">
            <button type="submit" name="btnBuscar1" id="botaoBuscar">Buscar</button>
          </div>
        </form>
    </div>

<!-- CONTAINER INICIAL-->
<div class="container">
  <!-- Bootstrap GRID - Inicia linha - linha só pode 3 colunuas -->
  <div class="row row-cols-3">

     <?php

                if(isset($_POST['btnBuscar1'])){
                    $pesquisa = $_POST['txtBuscar1'];

                    if($pesquisa == "Jaraguá do Sul" || $pesquisa == "jaraguá do sul" || $pesquisa == "jaraguá do Sul" || 
                       $pesquisa == "Jaragua do sul" || $pesquisa == "jaragua do sul" || $pesquisa == "Jaraguá do sul"){
                      $pesquisa = "jaraguadosul";
                    }
                    if($pesquisa == "Balneário Camboriú" || $pesquisa == "balneário camboriú" || $pesquisa == "Balneário camboriú" ||
                       $pesquisa == "Balneario Camboriu" || $pesquisa == "balneario camboriu" || $pesquisa == "balneário Camboriú"){
                      $pesquisa = "balneariocamburiu";
                    }
                    if($pesquisa == "São José" || $pesquisa == "são josé" || $pesquisa == "são José" || 
                       $pesquisa == "São josé" || $pesquisa == "são jose" || $pesquisa == "São Jose"){
                      $pesquisa = "saojose";
                    }
                    if($pesquisa == "Casa de praia" || $pesquisa == "casa de praia" || $pesquisa == "Casa de Praia"){
                      $pesquisa = "praia";
                    }
                    if($pesquisa == "Casa de campim" || $pesquisa == "casa de campim" || $pesquisa == "Casa de Campim"){
                      $pesquisa = "campim";
                    }

                    $sql_code = "SELECT * FROM imovel 
                    WHERE cidades LIKE '%$pesquisa%'
                    OR tipo_casa LIKE '%$pesquisa%'
                    OR valor LIKE '%$pesquisa%'";
                    
                    //echo "if: pesquisa";
                }else{
                    $sql_code = "SELECT * FROM imovel";
                    //echo "else: tudo";
                }

                $sql_query = $con->query($sql_code);
                while($dados = $sql_query->fetch_assoc()){
                        $tipo_casa = $dados['tipo_casa'];
                        $tipo = "";

                        if ($tipo_casa == "praia" || $tipo_casa == "campim"){
                          $tipo = "casa de ";
                        }else{
                          $tipo = "";
                        }

                        $cidades = $dados['cidades'];

                        if ($cidades == "jaraguadosul")
                        { $cidade = "Jaraguá do Sul";
                        }elseif($cidades == "saojose")
                        { $cidade = "São José";
                        }elseif($cidades == "balneariocamburiu")
                        { $cidade = "Balneário Camboriú";
                        }elseif($cidades == "criciuma")
                        { $cidade = "Criciúma";
                        }elseif($cidades == "florianopolis")
                        { $cidade = "Florianópolis"; 
                        }

                        $status_atual = $dados['status_atual'];
                        $status = $dados['status_atual'];

                        if ($status_atual == "ocupado") 
                        {
                        echo "<style> .status-ocupado{
                          background-color: #ff6961;
                          color: #ffffff;
                         }
                        .nome{
                        text-align: right;
                        padding-right: 15px;
                        }
                         </style>";
                         $status = "OCUPADO";
                        } 
                        else if ($status_atual == "desocupado")
                        {
                        echo "<style> .status-desocupado{ 
                          background-color: #90ee90; 
                          color: #000000; 
                          }
                                                  .nome{
                        text-align: right;
                        padding-right: 15px;
                        }
                          
                          </style>";
                          $status = "DESOCUPADO";
                        }
                        else 
                        {
                          echo "<style> .status-{
                          background-color: #d3d3d3; 
                          color: #993399; 
                          }
                                                  .nome{
                        text-align: right;
                        padding-right: 15px;
                        }
                          </style>";
                          $status = "INDEFINIDO";
                        }


            ?>
      <!-- Bootstrap COL - Cria uma nova coluna para cada imovel - ESTÁ NA REPETIÇÃO-->
      <div class="col">
        <!-- DIV IMOVEL apenas serve para dar um padding Y -->
        <div id="imovel" class=" py-6">
          <!-- CARD - apresenta as informações do imovel -->
          <div class="card shadow-sm">
          <a href="pagina-ampliada-informacoes.php?id=<?php echo $dados['id_imovel']; ?>"> <!-- Adicione um link com o ID do imóvel -->
            <img class="bd-placeholder-img card-img-top" width="50%" height="225" src="<?php echo $dados['imgURL']; ?>"
              xmlns="http://www.w3.org/2000/svg" role="img" >         
            <div class="card-body">
              <p class=card-text>TIPO DE IMOVEL: <?php echo $tipo.$dados['tipo_casa'] ?></p>
              <p class=card-text>VALOR DIÁRIO: R$<?php echo $dados['valor'] ?></p>
              <p class=card-text>TELEFONE DO PROPRIETÁRIO: <?php echo $dados['telefone'] ?></p>
              <p class=card-text>CIDADE: <?php echo $cidade; ?></p>
              <p class="status-<?php echo $status_atual; ?>" id="centro"><?php echo $status ?></p>
            </div>
            </a>
          <!-- CARD - apresenta as informações do imovel -->
          </div>          
        <!-- DIV IMOVEL apenas serve para dar um padding Y -->
        </div>
      <!-- Bootstrap COL - Cria uma nova coluna para cada imovel - ESTÁ NA REPETIÇÃO-->
      </div>

   <?php } ?> <!-- Encerra a repetição, precisa fechar a ROW e o Container abaixo -->
  <!-- Bootstrap GRID - Final linha -->
  </div>
<!-- CONTAINER FINAL-->
</div>



<!-- NÃO SEI O QUE VOCÊS QUEREM FAZER COM TUDO ISSO 
Para abrir uma página de detalhes é necessário apenas passar o campo ID no post

a pagina detalhes da locação pesquisa no banco o ID informado e aí trás todas
as informações. Não é o método posto que deve mostrar as informações.


<a href="pagina-apliada-informacoes.php">
<a href="pagina-apliada-informacoes.php?
imgURL=<?php echo $dados['imgURL']; ?>&
tipo_casa=<?php echo $tipo.$dados['tipo_casa']; ?>&
valor=<?php echo $dados['valor']; ?>&
telefone=<?php echo $dados['telefone']; ?>&
cidade=<?php echo $cidade; ?>">

-->


  <div class="centro">
      <a href="https://discord.com/"><img class="icones" src="img/discord.svg"></a>
      <a href="https://x.com/GabrielHas98423?t=cpjRFAMSOKlflZjwScHZRw&s=08"><img class="icones" src="img/twitter-x.svg"></a>
      <a href="https://wa.me/qr/JYNU42NBHTLAF1"><img class="icones" src="img/whatsapp.svg"></a>
    </div>


</body>



  <script src="./scripts/bootstrap.js"></script>
  <script src="./scripts/script.js"></script>
  <script src="/docs/5.3/dist/scripts/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>