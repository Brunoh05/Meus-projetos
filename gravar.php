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

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'img/';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['imagem']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$tmp = explode('.', $_FILES['imagem']['name']);
$fileExtension = end($tmp);
if (array_search($fileExtension, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
    // Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
        // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nomeFinal = time().'.jpg';
    } else {
        // Mantém o nome original do arquivo
        $nomeFinal = $_FILES['imagem']['name'];
    }
    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nomeFinal)) {
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        echo "
            <style>}</style>
            <h1>Você cadastrou um imovel com sucesso!</h1>
            <div id='centro2'>
            <button class='btn'><a href='tela-locacao.php'>VOLTAR</a></button>
            </div>";
       // $URLImagem = $_UP['pasta'] . $nomeFinal;
       // echo '<br /><a href="'. $URLImagem . '">Clique aqui para acessar o arquivo</a>';
  

        //ADICIONADO NO BANCO DE DADOS A URL
        $conn = mysqli_connect($host, $username, $password, $db) or die("Impossível Conectar");

        $query ="INSERT INTO  imovel VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $query);
        $codusuario =  $_SESSION['id_usuario']; //remover
        $desc = $_POST['descricao'];
        $codimovel = 0; //remover
        $status = $_POST['status'];
        $tipoCasa = $_POST['selecao'];
        $cidade = $_POST['cidade'];
        $valor = $_POST['mensalidade'];
        $imgURL =  $_UP['pasta'] . $nomeFinal;
        $telefone = $_POST['telefone'];

        mysqli_stmt_bind_param($stmt, "dsdsssdsd", $codusuario, $desc, $codimovel, $status, $tipoCasa, $cidade, $valor, $imgURL, $telefone);
        mysqli_stmt_execute($stmt);
        

       // echo "<br />Imagem salva no banco de dados com sucesso!";
    } else {
        // Não foi possível fazer o upload, provavelmente a pasta está incorreta
        echo "Não foi possível enviar o arquivo, tente novamente";
    }     
}
/*
if ($imagem != NULL) {
    $nomeFinal = time() . '.jpg';
    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal);

        $mysqlImg = addslashes(file_get_contents($nomeFinal));

        $conn = mysqli_connect($host, $username, $password, $db) or die("Impossível Conectar");

        $query = "INSERT INTO imovel (img_img) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "b", $mysqlImg);
        mysqli_stmt_execute($stmt);

        unlink($nomeFinal);

        header("location: exibir.php");
    }
} else {
    echo "Você não realizou o upload de forma satisfatória.";
}

*/
?>