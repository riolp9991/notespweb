<?
var_dump($_SESSION);

if (!isset($_SESSION['id'])) {
	redirect('/', 'refresh');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/node.css">
	<title>Home</title>
</head>

<body>
	<header>
		<nav>
			<h1><?php echo ucwords($field); ?></h1>
			<ul>
				<li>
					<?php echo anchor('/', 'Salir') ?>
				</li>
				<li><a href="#">Notas</a></li>
				<li><a href="#">To-Do</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<?php if (isset($field)) : ?>
			<?php require_once APPPATH . "/views/" . $field . ".php"; ?>
		<?php endif; ?>
	</div>
</body>

</html>