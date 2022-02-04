<?php
defined("BASEPATH") or
	exit("No direct script access allowed"); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registrarme</title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/login.css">
</head>
<body>

<?php echo form_open("register", ["method" => "POST"]); ?>
<h1>Registrar Usuario</h1>
<div class="content">
<?php if (isset($error)): ?>
<div class="error">
<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php if(isset($success)): ?>
<div class="success">
<?php echo $success ?>
</div>
<?php endif ?>
<input type="text" name="name" placeholder="Nombre de usuario">
<input type="password" name="password" placeholder="Contrasena">
<input type="password" name="checkpassword" placeholder="Repetir Contrasena">
<button type="submit">Registrar</button>
<?php echo anchor('/', 'Ya poseo una cuenta') ?>
</div>

</form>

</body>
</html>
