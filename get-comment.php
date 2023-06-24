<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");


$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query('SELECT * FROM comentarios');

$qtdComentarios = $stmt->rowCount();

if($stmt->rowCount() > 0){
    echo "<h4 class=\"comments-count\"> $qtdComentarios Comentários </h4>";
    foreach($stmt->fetchAll() as $value){
        echo "<div class=\"d-flex\"><div><h5><a>" . $value['nome']. "</a> <a  class=\"reply\"><i class=\"bi bi-reply-fill\"></i> Reply</a></h5><time datetime=\"2020-01-01\">01 Jan 2022</time><p>" . $value['comentario'] . "</p></div></div>";
    }
    
}else{
    echo json_encode("Falha ao retornar dados!");
}
