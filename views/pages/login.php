<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Gestión de tareas Plataforma AV</title>
	<link rel="icon" href="<?= PUBLIC_PATH ?>/img/icon.png">
	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrap.min.css">
	<!-- modales confirm -->
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/jquery-confirm.css">
	<!-- //Meta tags -->
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrapValidator.min.css">
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/styles.css">
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/style.css" media="all">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
</head>

<body>
	<div class="preload hidden">
		<img src="<?= PUBLIC_PATH ?>/img/ajax-loader.gif" alt="preload">
	</div>

	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>GESTIÓN DE TAREAS</h3>

					<form id="frmLogin" class="signin-form">

						<div class="form-group">
							<div class="form-input input-group">
								<span class="fa fa-user" aria-hidden="true"></span>
								<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<div class="form-input input-group">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña" autocomplete="off">
							</div>
						</div>

						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox">
								<span class=""></span>
								<p class="remember"></p>
							</label>
							<button type="submit" class="btn theme-button">Ingresar</button>
						</div>
						<div class="new-signup">
							<a href="<?= PUBLIC_PATH ?>/recuperarPass" class="signuplink">Recuperar contraseña</a>
							<a href="<?= PUBLIC_PATH ?>/registrar" class="signuplink register-link">Registrarse</a>
						</div>
					</form>
				</div>

				<!-- copyright -->
				<div class="copy-right">
					<p>© 2020 Active Login Form. All rights reserved | Design by <a href="http://w3layouts.com/"
							target="_blank">W3Layouts</a></p>
				</div>
				<!-- //copyright -->
			</div>
		</div>
	</section>
	<!-- jquery -->
	<script src="<?= PUBLIC_PATH ?>/js/jquery3.4.1.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= PUBLIC_PATH ?>/js/bootstrap.min.js"></script>
	<!-- modales confirm -->
	<script src="<?= PUBLIC_PATH ?>/js/jquery-confirm.js"></script>
	<!-- bootstrap validator -->
	<script src="<?= PUBLIC_PATH ?>/js/bootstrapValidator.min.js"></script>

	<script src="<?= PUBLIC_PATH ?>/js/script.js"></script>
	<script src="<?= PUBLIC_PATH ?>/js/helpers.js"></script>
	<!-- <script src="<?= PUBLIC_PATH ?>/js/login.js"></script> -->
</body>

</html>