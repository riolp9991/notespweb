<?php
defined("BASEPATH") or
	exit("No direct script access allowed"); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Iniciar</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/login.css">
</head>
<body>

<?php echo form_open("/", ["method" => "POST"]); ?>
<h1>Iniciar Sesion</h1>
<div class="content">
<?php if (isset($error)): ?>
<div class="error">
<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php if(isset($login_error)): ?>
<div class="error">
<?php echo $login_error ?>
</div>
<?php endif ?>
<input type="text" name="name" placeholder="Nombre de usuario">
<input type="password" name="password" placeholder="Contrasena">
<button type="submit">Acceder</button>
<?php echo anchor('/register', 'Registrarme') ?>

</div>

</form>

</body>
</html>
