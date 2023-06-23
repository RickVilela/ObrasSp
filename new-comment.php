<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$nome = $_POST['nome'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];



$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare('INSERT INTO comentarios (nome, email, comentario) VALUES (:nome, :email, :comentario)');
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':comentario', $comentario);


$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt);
}else{
    echo json_encode("Nenhum comentário!");
}
