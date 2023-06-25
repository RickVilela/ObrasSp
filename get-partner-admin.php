<?php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");


$pdo = new PDO('mysql:dbname=obrassp;host=localhost', 'root', '');

$stmt = $pdo->query('SELECT * FROM parceiros ');

if($stmt->rowCount() > 0){
    foreach($stmt->fetchAll() as $value){

        $id = $value['id'];

        echo "<tr>
                <td id='valor_id$id'>". $value['id'] . "</td>
                <td id='valor_nomeEmpresa$id'>". $value['nomeEmpresa'] . "</td>
                <td id='valor_nomeResponsavel$id'> " . $value['nomeResponsavel'] .  "</td>
                <td id='valor_endereco$id'>" . $value['endereco'] . "</td>
                <td id='valor_cidade$id'>". $value['cidade'] . "</td>
                <td id='valor_estado$id'>". $value['estado'] . "</td>
                <td id='valor_cep$id'>". $value['cep'] . "</td>
                <td id='valor_categoria$id'>". $value['categoria'] . "</td>
                <td><button class=\"btn btn-success btn-sm rounded-0\" onclick=\"editar(" . $value['id'] . ")\" type=\"button\" id=\"btn-editar\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\"><i class=\"fa fa-edit\"></i></button>
                    <button class=\"btn btn-primary btn-sm rounded-0\" type=\"button\" id=\"btn-salvar\" onclick=\"salvar(" . $value['id'] . ")\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add\"><i class=\"fa fa-save\"></i></button>
                    <button class=\"btn btn-danger btn-sm rounded-0\" type=\"button\" id=\"btn-excluir\" onclick=\"excluir(" . $value['id'] . ")\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\"><i class=\"fa fa-trash\"></i></button>
                </td>
            </tr>";
         
    }
}else{
    echo json_encode("Falha ao retornar dados!");
}
