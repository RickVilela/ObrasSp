<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");


$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query('SELECT * FROM parceiros ');

if($stmt->rowCount() > 0){
    foreach($stmt->fetchAll() as $value){
        echo json_encode($value);
    }
}else{
    echo json_encode("Falha ao retornar dados!");
}
