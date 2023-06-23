<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$nomeEmpresa = $_POST['nomeEmpresa'];
$nomeResponsavel = $_POST['nomeResponsavel'];
$descricao = $_POST['descricao'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$categoria = $_POST['categoria'];


$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare('INSERT INTO dadosParceiros (nomeEmpresa, nomeResponsavel, descricao, endereco, cidade, estado, cep, categoria) VALUES (:nomeEmpresa, :nomeResponsavel, :descricao, :endereco, :cidade, :estado, :cep, :categoria)');
$stmt->bindValue(':nomeEmpresa', $nomeEmpresa);
$stmt->bindValue(':nomeResponsavel', $nomeResponsavel);
$stmt->bindValue(':descricao', $descricao);
$stmt->bindValue(':endereco', $endereco);
$stmt->bindValue(':cidade', $cidade);
$stmt->bindValue(':estado', $estado);
$stmt->bindValue(':cep', $cep);
$stmt->bindValue(':categoria', $categoria);

$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt);
}else{
    echo json_encode("Falha ao retornar dados!");
}


