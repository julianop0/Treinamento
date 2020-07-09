<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=<?= $hrefBootstrap ?>>
	<style>
		.error {
			color: red;
			font-style: italic;
		}

		.red {
			color: red;
		}
	</style>
	<title><?= $title ?></title>
</head>

<body>
	<div class="card text-black bg-light mb-3">
		<div class="card-header">
			<h4><?= $title ?><h4>
		</div>
	</div>
	<div class="container">
		<form method="post" action="<?= $formAction ?>" id="formVehicle" class="form">
			<b class="red"> *</b><b><i> Campos obrigatórios</i></b><br><br>
			<div class="form-group">
				<label for="descricao">Descrição </label><b class="red"> *</b>
				<input type="text" name="descricao" id="descricao" class="form-control" autofocus value="<?php echo isset($dataUpdate) ? $dataUpdate["descricao"] : "" ?>"><br>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="placa">Placa </label><b class="red"> *</b>
						<input type="text" name="placa" id="placa" class="form-control" placeholder="AAA0A00" value="<?php echo isset($dataUpdate) ? $dataUpdate["placa"] : "" ?>"><br>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="codigoRenavam">Código RENAVAM </label><b class="red"> *</b>
						<input type="text" name="codigoRenavam" id="codigoRenavam" class="form-control" placeholder="00000000000" value="<?php echo isset($dataUpdate) ? $dataUpdate["codigo_renavam"] : "" ?>"><br>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="anoModelo">Ano do modelo </label><b class="red"> *</b>
						<input type="text" name="anoModelo" id="anoModelo" class="form-control" min="0" placeholder="0000" value="<?php echo isset($dataUpdate) ? $dataUpdate["ano_modelo"] : "" ?>"><br>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="anoFabricacao">Ano de fabricação </label><b class="red"> *</b>
						<input type="text" name="anoFabricacao" id="anoFabricacao" class="form-control" min="0" placeholder="0000" value="<?php echo isset($dataUpdate) ? $dataUpdate["ano_fabricacao"] : "" ?>"><br>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="cor">Cor </label><b class="red"> *</b>
						<input type="text" name="cor" id="cor" class="form-control" value="<?php echo isset($dataUpdate) ? $dataUpdate["cor"] : "" ?>"><br>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="km">KM </label><b class="red"> *</b>
						<input type="number" name="km" id="km" class="form-control" min="0" value="<?php echo isset($dataUpdate) ? $dataUpdate["km"] : "" ?>"><br>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="marca">Marca </label><b class="red"> *</b>
						<input type="text" name="marca" id="marca" class="form-control" value="<?php echo isset($dataUpdate) ? $dataUpdate["marca"] : "" ?>"><br>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="preco">Preço </label><b class="red"> *</b>
						<input type="number" name="preco" id="preco" class="form-control" value="<?php echo isset($dataUpdate) ? $dataUpdate["preco"] : "" ?>"><br>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="precoFipe">Preço FIPE </label><b class="red"> *</b>
						<input type="number" name="precoFipe" id="precoFipe" class="form-control" value="<?php echo isset($dataUpdate) ? $dataUpdate["preco_fipe"] : "" ?>"><br>
					</div>
				</div>
			</div>

			<a href="<?= $hrefCancel ?>" class="btn btn-warning">Cancelar</a>
			<button type="submit" id="enviar" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</body>
<script type="text/javascript" src="<?= $hrefJquery ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="<?= $hrefMask ?>"></script>
<script src="<?= $hrefValidation ?>"></script>

</html>