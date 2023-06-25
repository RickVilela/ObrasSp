<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$nomeEmpresa = $_POST['nomeEmpresa'];
$nomeResponsavel = $_POST['nomeResponsavel'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$categoria = $_POST['categoria'];
$id = $_POST['id'];


$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare('UPDATE parceiros SET nomeEmpresa=:nomeEmpresa, nomeResponsavel=:nomeResponsavel, endereco=:endereco, cidade=:cidade, estado=:estado, cep=:cep, categoria=:categoria WHERE id=:id ');
$stmt->bindValue(':nomeEmpresa', $nomeEmpresa);
$stmt->bindValue(':nomeResponsavel', $nomeResponsavel);
$stmt->bindValue(':endereco', $endereco);
$stmt->bindValue(':cidade', $cidade);
$stmt->bindValue(':estado', $estado);
$stmt->bindValue(':cep', $cep);
$stmt->bindValue(':categoria', $categoria);
$stmt->bindValue(':id', $id);

$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt);
}else{
    echo json_encode("Nenhum comentário!");
}
