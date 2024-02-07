<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Imóvel</title>
    <link rel="stylesheet" href="./css/ampliada.css">
</head>
<body>

<?php
include("conexao.php");
?><?php


// Verifique se o ID do imóvel foi passado como parâmetro na URL
if (isset($_GET['id'])) {
    $id_imovel = $_GET['id'];

    // Conecte-se ao banco de dados (você já está incluindo "conexao.php" na página atual)
    // Faça a consulta SQL para buscar as informações do imóvel com base no ID
    $sql_code = "SELECT * FROM imovel WHERE id_imovel = $id_imovel";
    $sql_query = $con->query($sql_code);

    // Verifique se o imóvel foi encontrado
    if ($sql_query->num_rows > 0) {
        $dados = $sql_query->fetch_assoc();
        // Agora, você pode exibir as informações do imóvel na página de detalhes

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
    font-size: 20px;
    text-align: center;
    }</style>";
    $status = "OCUPADO";
    } 
    else if ($status_atual == "desocupado")
    {
    echo "<style> .status-desocupado{ 
    background-color: #90ee90; 
    color: #000000; 
    font-size: 20px;
    text-align: center;
    }</style>";
    $status = "DESOCUPADO";
    }
    else 
    {
    echo "<style> .status-ocupado{
    background-color: #ff6961;
    color: #ffffff;
    font-size: 20px;
    text-align: center;
    }</style>";
    $status = "OCUPADO";
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Coloque aqui as meta tags, links CSS e o título da página -->
</head>
<body>
    <!-- Exiba as informações do imóvel na página de detalhes -->
    <div id="centro">
    <h1>Mais detalhes do Imovel</h1>
    <table class="tabela">
        <tr class="emcima">
            <td class="cima1">
                <img src="<?php echo $dados['imgURL']; ?>" alt="Imagem do Imóvel">
            </td>
        </tr>
        <tr>
            <td>
                <p>DESCRIÇÃO: <?php echo $dados['descricao'] ?></p>
                <p>TIPO DE IMOVEL: <?php echo $tipo.$dados['tipo_casa']; ?></p>
                <p>VALOR DIÁRIO: R$<?php echo $dados['valor']; ?></p>
                <p><a href="https://api.whatsapp.com/send?phone=55<?php echo $dados['telefone']; ?>">
    TELEFONE DO PROPRIETÁRIO: <?php echo $dados['telefone']; ?>
  </a></p>
                <p>CIDADE: <?php echo $cidade; ?></p>
                <p class="status-<?php echo $status_atual; ?>"> <?php echo $status; ?></p>
            </td>
        </tr>
    </table>
    </div>
    <div id="centro2">
        <button class="btn"><a href="tela-locacao.php">VOLTAR</a></button>
    </div>
    <!-- Adicione outras informações conforme necessário -->

</body>
</html>
<?php
    } else {
        // Caso o imóvel não seja encontrado, você pode exibir uma mensagem de erro ou redirecionar para uma página de erro
        echo "Imóvel não encontrado.";
    }
} else {
    // Caso nenhum ID de imóvel tenha sido passado como parâmetro na URL, você pode exibir uma mensagem de erro ou redirecionar para uma página de erro
    echo "ID do imóvel não especificado.";
}
?>
