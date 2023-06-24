<?php
header('Content-Type: text/html; iso-8859-1');
header("Access-Control-Allow-Origin: *");


$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query('SELECT * FROM parceiros LIMIT 0, 5 ');

if($stmt->rowCount() > 0){
    foreach($stmt->fetchAll() as $value){
        echo "<div class=\"post-item mt-3\"><img src=\" ". $value['caminhoImg'] ." \"><div><h4><a href=\"partners-details.php?id=" . $value['id'] . " \"> " . $value['nomeEmpresa'] . "</a></h4></div></div>";
    }
}else{
    echo json_encode("Falha ao retornar dados!");
}
