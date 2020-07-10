<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/bootstrap4.5.0/css/bootstrap.min.css">
  <style>
    th {
      font-size: 17px;
    }
  </style>
  <title><?= $title ?></title>
</head>

<body>
  <div>
    <div class="card text-black bg-light mb-3">
      <div class="card-header">
        <h4><?= $title ?></h4><br>
        <a class="btn btn-outline-primary " href="listar">Voltar</a>
        <a class="btn btn-outline-primary " href="adicionar">Adicionar um veículo</a>
      </div>
    </div>
    <div class="container">
      <table class="table table-striped table-bordered table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th colspan='2' scope="col">Descrição</th>
            <th scope="col">placa</th>
            <th scope="col">RENAVAM</th>
            <th scope="col">Modelo</th>
            <th scope="col">Fabricação</th>
            <th scope="col">Km</th>
            <th scope="col">Cor</th>
            <th scope="col">Marca</th>
            <th scope="col">Preço</th>
            <th scope="col">Fipe</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $html = "";
          foreach ($data as $k => $v) {
            echo "<tr>";
            echo "<td>{$v['id']}</td>";
            echo "<td colspan = '2'>{$v['descricao']}</td>";
            echo "<td class = 'align-middle'>{$v['placa']}</td>";
            echo "<td class = 'align-middle'>{$v['codigo_renavam']}</td>";
            echo "<td class = 'align-middle'>{$v['ano_modelo']}</td>";
            echo "<td class = 'align-middle'>{$v['ano_fabricacao']}</td>";
            echo "<td class = 'align-middle'>{$v['km']}</td>";
            echo "<td class = 'align-middle'>{$v['cor']}</td>";
            echo "<td class = 'align-middle'>{$v['marca']}</td>";
            echo "<td class = 'align-middle'>{$v['preco']}</td>";
            echo "<td class = 'align-middle'>{$v['preco_fipe']}</td>";
            echo "</tr>";
          }

          ?>
        </tbody>
      </table>
    </div>
</body>

</html>