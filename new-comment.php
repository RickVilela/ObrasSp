<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$nome = $_POST['nome'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];
$id_post = $_POST['id_post'];

$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare('INSERT INTO comentarios (nome, email, comentario, id_post) VALUES (:nome, :email, :comentario, :id_post)');
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':comentario', $comentario);
$stmt->bindValue(':id_post', $id_post);

$stmt->execute();

if($stmt->rowCount() >= 1){
    echo json_encode($stmt);
}else{
    echo json_encode("Nenhum comentário!");
}
