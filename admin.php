<?php

session_start();

setcookie("ck_authorized", "true", 0, "/");

if(!isset($_SESSION["email"])):header("location: login.php");
else: $login = $_SESSION["email"];
endif;    

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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin- Dashboard</title>

    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/favicon.ico" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">OBRAS SP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Novo Parceiro</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Consulta
            </div>

    
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="parceiros-admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Parceiros</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="index.php" target="_blank">
                <i class="fa fa-external-link" aria-hidden="true"></i>
                    <span>Acessar Obras SP</span></a>
            </li>


        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Obras SP</span>
                                <img class="img-profile rounded-circle"
                                    src="./assets/img/undraw_profile.svg">
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1" id="exit">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Novo Parceiro</h1>
                        
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-9 ml-3">
                            <form class="row g-3" action="admin.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                  <label for="inputEmail4" class="form-label">Nome da Empresa</label>
                                  <input type="text" class="form-control" name="nomeEmpresa" id="nomeEmpresa">
                                </div>
                                <div class="col-md-6">
                                  <label for="inputPassword4" class="form-label">Nome do Responsável</label>
                                  <input type="text" class="form-control" name="nomeResponsavel" id="nomeResponsavel">
                                </div>
                                <div class="col-12">
                                  <label for="inputAddress" class="form-label">Descrição</label>
                                  <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição da empresa">
                                </div>
                                <div class="col-12">
                                  <label for="inputAddress2" class="form-label">Endereço</label>
                                  <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua, n°">
                                </div>
                                <div class="col-md-6">
                                  <label for="inputCity" class="form-label">Cidade</label>
                                  <input type="text" class="form-control" name="cidade" id="cidade">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Estado</label>
                                    <select id="estado" name="estado" class="form-select">
                                      <option selected>Escolher...</option>
                                      <option value="ac">Acre</option> 
                                      <option value="al">Alagoas</option> 
                                      <option value="am">Amazonas</option> 
                                      <option value="ap">Amapá</option> 
                                      <option value="ba">Bahia</option> 
                                      <option value="ce">Ceará</option> 
                                      <option value="df">Distrito Federal</option> 
                                      <option value="es">Espírito Santo</option> 
                                      <option value="go">Goiás</option> 
                                      <option value="ma">Maranhão</option> 
                                      <option value="mt">Mato Grosso</option> 
                                      <option value="ms">Mato Grosso do Sul</option> 
                                      <option value="mg">Minas Gerais</option> 
                                      <option value="pa">Pará</option> 
                                      <option value="pb">Paraíba</option> 
                                      <option value="pr">Paraná</option> 
                                      <option value="pe">Pernambuco</option> 
                                      <option value="pi">Piauí</option> 
                                      <option value="rj">Rio de Janeiro</option> 
                                      <option value="rn">Rio Grande do Norte</option> 
                                      <option value="ro">Rondônia</option> 
                                      <option value="rs">Rio Grande do Sul</option> 
                                      <option value="rr">Roraima</option> 
                                      <option value="sc">Santa Catarina</option> 
                                      <option value="se">Sergipe</option> 
                                      <option value="sp">São Paulo</option> 
                                      <option value="to">Tocantins</option> 
                                    </select>
                                  </div>
                                <div class="col-md-2">
                                    <label for="inputZip" class="form-label">CEP</label>
                                    <input type="text" name="cep" class="form-control" id="cep">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputState" class="form-label">Categoria</label>
                                  <select id="categoria" name="categoria" class="form-select">
                                    <option selected>Escolher...</option>
                                    <option>Arquitetura</option>
                                    <option>Pintura</option>
                                    <option>Materiais</option>
                                    <option>Alvenaria</option>
                                    <option>Elétrica</option>
                                    <option>Ferramentas</option>
                                  </select>
                                </div>  
                        
                                <div class="col-md-8">
                                    <label for="file" class="form-label"> Imagem Empresa </label>
                                    <input type="file" class="form-control" required name="arquivo">
                                </div>
                                
                                <div class="row align-items-center " style="display: flex; align-items: center; justify-content: center;">
                                  <button type="submit" class="btn btn-success mt-5" style="width: 200px; height: auto;" name="submit" id="btnCadastrar">Cadastrar</button>
                                </div>
                              </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
  
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Core plugin JavaScript-->


    <!-- Custom scripts for all pages-->
    <script src="assets/js/jquery-min.js"></script>
    <script src="./assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/admin.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>