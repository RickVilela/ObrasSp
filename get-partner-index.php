<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");


$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query('SELECT * FROM parceiros ');

if($stmt->rowCount() > 0){
    foreach($stmt->fetchAll() as $value){
        echo "<div class=\"col-xl-4 col-md-6\"><div class=\" post-item position-relative h-100\"><div class=\"post-img position-relative overflow-hidden\"> <img src=\"". $value['caminhoImg'] . "\" class=\"img-fluid\" alt=\"\"></div><div class=\"post-content d-flex flex-column\" ><h3 class=\"post-title\">" .  $value['nomeEmpresa'] . "</h3><div class=\"meta d-flex align-items-center\"><div class=\"d-flex align-items-center\"><i class=\"bi bi-person\"></i> <span class=\"ps-2\">" . $value['nomeResponsavel'] . "</span></div><span class=\"px-3 text-black-50\">/</span><div class=\"d-flex align-items-center\"><i class=\"bi bi-folder2\"></i> <span class=\"ps-2\">". $value['categoria'] ."</span></div></div><p>" . $value['descricao'] . "</p><hr><a href=\"partners-details.php\" class=\"readmore stretched-link\"><span>Ler Mais</span><i class=\"bi bi-arrow-right\"></i></a></div></div></div></div>";
    }
}else{
    echo json_encode("Falha ao retornar dados!");
}
