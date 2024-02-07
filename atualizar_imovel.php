<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Projeto login</title>
        <link rel="stylesheet" href="CSS/cadastro-efetuado.css">
    </head>
<?php
session_start();

// Verifica se a sessão e o id_usuario estão definidos
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Restante do seu código...

}
  $id_usuario = $_SESSION['id_usuario'];
$host = "localhost";
$username = "root";
$password = "";
$db = "pbrg2";


echo "
<h1>Você atualizou seu imovel com sucesso!</h1>
<div id='centro2'>
<button class='btn'><a href='tela-locacao.php'>VOLTAR</a></button>
</div>";


        echo "<div class='null'>";
        //ADICIONADO NO BANCO DE DADOS A URL
        $conn = mysqli_connect($host, $username, $password, $db) or die("Impossível Conectar");

        //$query ="INSERT INTO  imovel VALUES (?,?,?,?,?,?,?,?)";
        $query = "UPDATE imovel SET descricao = ?, status_atual = ?, cidades = ?, telefone = ?, valor = ?, tipo_casa = ?, id_usuario = ? WHERE id_imovel = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        $desc = $_POST['descricao'];
        $status = $_POST['status'];
        $cidade = $_POST['cidade'];
        $telefone = $_POST['telefone'];
        $valor = $_POST['mensalidade'];
        $tipoImovel = $_POST['selecao'];
        $codusuario = $_SESSION['id_usuario'];
        $id_imovel = $_POST['id_imovel'];
        
        mysqli_stmt_bind_param($stmt, "ssssssii", $desc, $status, $cidade, $telefone, $valor, $tipoImovel, $codusuario, $id_imovel);
        mysqli_stmt_execute($stmt);
        
        var_dump(mysqli_error($conn));
        
        echo "</div>";
        
?>