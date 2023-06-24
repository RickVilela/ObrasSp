<?php

  include("conexao.php");

  if(isset($_REQUEST['submit'])){
    $nomeEmpresa = $_REQUEST['nomeEmpresa'];
    $nomeResponsavel = $_REQUEST['nomeResponsavel'];
    $descricao = $_REQUEST['descricao'];
    $endereco = $_REQUEST['endereco'];
    $cidade = $_REQUEST['cidade'];
    $estado = $_REQUEST['estado'];
    $cep = $_REQUEST['cep'];
    $categoria = $_REQUEST['categoria'];

  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = $_POST['nomeEmpresa']. "_". md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
    $caminhoImg =  $diretorio . $novo_nome;

    trim(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)); //efetua o upload

    $sql_code = "INSERT INTO parceiros ( nomeEmpresa , nomeResponsavel, descricao, endereco, cidade, estado, cep, categoria, caminhoImg) VALUES('$nomeEmpresa', '$nomeResponsavel', '$descricao', '$endereco', '$cidade', '$estado', '$cep', '$categoria', trim('$caminhoImg'))";

    if($mysqli->query($sql_code))
      $msg = "Arquivo enviado com sucesso!";
    else
      $msg = "Falha ao enviar arquivo.";

  }
}
?>
