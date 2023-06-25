<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$id = $_POST['id'];


$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare('DELETE FROM parceiros WHERE id=:id ');

$stmt->bindValue(':id', $id);

$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt);
}else{
    echo json_encode("Erro ao Remover!");
}
