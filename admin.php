<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

<div class="container-sm">

    <form class="row g-3" action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nome da Empresa</label>
          <input type="text" class="form-control" name='nomeEmpresa' id="nomeEmpresa">
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

    
  Arquivo: <input type="file" required name="arquivo">
           

        <div class="col-12">
          <button type="submit" class="btn btn-success" name="submit" id="btnCadastrar">Cadastrar</button>
        </div>
      </form>
</div>

<!-- Principal Arquivo JS  -->
    
<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/admin.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>