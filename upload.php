<?php 

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if(isset($_REQUEST['submit'])){
    $nomeEmpresa = $_REQUEST['nomeEmpresa'];
    $nomeResponsavel = $_REQUEST['nomeResponsavel'];
    $descricao = $_REQUEST['descricao'];
    $endereco = $_REQUEST['endereco'];
    $cidade = $_REQUEST['cidade'];
    $estado = $_REQUEST['estado'];
    $cep = $_REQUEST['cep'];
    $categoria = $_REQUEST['categoria'];

  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = $_POST['nomeEmpresa']. "_". md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
    $caminhoImg =  $diretorio . $novo_nome;

    trim(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)); //efetua o upload

    $pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

    $stmt = $pdo->prepare('INSERT INTO parceiros ( nomeEmpresa , nomeResponsavel, descricao, endereco, cidade, estado, cep, categoria, caminhoImg) VALUES(:nomeEmpresa, :nomeResponsavel, :descricao, :endereco, :cidade, :estado, :cep , :categoria, :caminhoImg)');
    $stmt->bindValue(':nomeEmpresa', $nomeEmpresa);
    $stmt->bindValue(':nomeResponsavel', $nomeResponsavel);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':endereco', $endereco);
    $stmt->bindValue(':cidade', $cidade);
    $stmt->bindValue(':estado', $estado);
    $stmt->bindValue(':cep', $cep);
    $stmt->bindValue(':categoria', $categoria);
    $stmt->bindValue(':caminhoImg', $caminhoImg);

    $stmt->execute();

    if($stmt->rowCount() >= 1){
      echo json_encode($stmt);
    }else{
      echo json_encode("Nenhum comentário!");
  }
    
  }
}
