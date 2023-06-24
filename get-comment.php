<?php
header('Content-Type: text/html; iso-8859-1');
header("Access-Control-Allow-Origin: *");

$id = $_REQUEST['id'];

$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query("SELECT * FROM comentarios where id_post='$id' ");

$qtdComentarios = $stmt->rowCount();

if($stmt->rowCount() > 0){
    if($qtdComentarios == 1){ 
        echo "<h4 class=\"comments-count\"> $qtdComentarios Comentário </h4>";
    }else{
        echo "<h4 class=\"comments-count\"> $qtdComentarios Comentários </h4>";
    }
   
    foreach($stmt->fetchAll() as $value){
        echo "<div class=\"d-flex\"><div><h5><a>" . $value['nome']. "</a> <a  class=\"reply\"><i class=\"bi bi-reply-fill\"></i> Reply</a></h5><time datetime=\"2020-01-01\">01 Jan 2022</time><p>" . $value['comentario'] . "</p></div></div>";
    }
    
}else{
    echo "<h4 class=\"comments-count\"> Nenhum Comentário </h4>";
}
