<?php SESSION_START(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/bootstrap4.5.0/css/bootstrap.min.css">
  <title><?= $title ?></title>
  <style>
    .ajax-load {
      background: url(public/images/ajax-loader.gif) no-repeat fixed center;
      background-size: 4% 9%;
      opacity: 0.5;
    }

    .form-check-input {
      width: 18px;
      height: 18px;
    }

    .button-link {
      background: none;
      border: none;
      padding: 0;
      font-family: arial, sans-serif;
      color: #069;
      cursor: pointer;
    }

    .button-link:focus {
      outline: none;
    }

    .justify-content {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="card text-black bg-light mb-3">
    <div class="card-header">
      <h4><?= $title ?></h4><br>
      <a class="btn btn-outline-primary " href="adicionar">Adicionar um veículo</a>
      <a class="btn btn-outline-primary " href="relatorio">Exibir relatório</a>
    </div>
  </div>

  <?php
  #Success message
  if (isset($_SESSION['success'])) {
    if ($_SESSION['success']['success'] == 1) {
      echo '<div class="alert alert-success">';
      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      echo $_SESSION["success"]["msg"] . '</div>';
      SESSION_DESTROY();
    } else {
      echo '<div class="alert alert-danger">';
      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      echo $_SESSION["success"]["msg"] . '</div>';
      SESSION_DESTROY();
    }
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-10">
        <input class="form-control " type="text" id="listSearch" placeholder="Pesquisa...">
      </div>
      <div class="col-2">
        <button class="btn btn-outline-success btn-rounded" id="searchSubmit">Buscar</button>
      </div>
    </div><br>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"></th>
          <th scope="col">Descrição</th>
          <th scope="col">Placa</th>
          <th scope="col">Marca</th>
          <th class="justify-content" scope="col">Editar</th>
        </tr>
      </thead>
      <tbody id="tableList">
      </tbody>
      <div class="d-flex justify-content-right"><button class="btn btn-danger" type="submit" onClick="deleteFunction()">Excluir selecionados</button></div><br>
    </table>
    <nav id='pagination'>

    </nav>
  </div>
</body>
<script type="text/javascript" src="public/javascript/jquery.min.js"></script>
<script type="text/javascript" src="public/bootstrap4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="App/views/javascript/list.js"></script>
<script>
  function deleteFunction() {
    swal.fire({
      title: "Deseja prosseguir?",
      icon: "warning",
      toast: true,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: "Sim! Excluir",
      cancelButtonColor: '#FF6347',
      cancelButtonText: "Não! Cancelar",
    }).then((result) => {
      if (result.value) {
        let registros = $('input:checked').map(function() {
          return this.value;
        }).get().join();
        window.location.href = `deletar/${registros}`;
      }
    })
  }
</script>

</html>