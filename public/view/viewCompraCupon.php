<?php
session_start();
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php'); 
    include_once(PLUGIN_PATH);
	include_once(CONTROLLER_PATH.'CuponesController.php');
	error_reporting(E_ALL ^ E_NOTICE);

	if (isset($_SESSION['usuario'])) {
		$userActual = $_SESSION['usuario'];
		if ($userActual == null) {
			var_dump($_SESSION['usuario']);
			header("location:index.php");
		}
	} else {
		//header("location:../index.php");
		header("location:index.php");
	}


?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Compra de Tickets</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<?= head() ?>
</head>
<body>
<?= menu() ?>

	<h1>Compra de Tickets</h1>
<h1><?= $userActual[0] ?></h1>
	<form action="../controller/CuponesController.php" method="POST">
			<div class="row error">
                <?= isset($errores)?$errores:'' ?>
            </div>
	<input type="hidden" name="Usu" value="<?= $userActual[0] ?>">

		<label for="ofertas">Ofertas Disponibles</label>
		<select name="ofertas" id="">
			<option value="">Seleccione una oferta</option>
			<?php
			$ofertas = mostrarDatosTabla();
				foreach($ofertas as $oferta){	
			?>
			<option value="<?= $oferta['cod_oferta'] ?>"><?= $oferta['titulo'] ?></option>
			<?php
				}
			?>
		</select><br><br>


		<label for="tarjeta">Número de Tarjeta:</label>
		<input type="text" class="form-control" id="tarjeta" name="tarjeta"><br><br>

		<label for="expiracion">Fecha de Expiración (MM/AA):</label>
		<input type="text" class="form-control" id="expiracion" name="expiracion"><br><br>

		<label for="cvv">CVV:</label>
		<input type="text" class="form-control" id="cvv" name="cvv"><br><br>

		<input type="submit" name="accion" value="Comprar">
	</form>
    <?= footer() ?>
</body>
</html>