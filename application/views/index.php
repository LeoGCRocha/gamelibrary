<?php $this->load->helper('url'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>/static/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/static/materialize/css/materialize.min.css">
	<title>Game Library</title>
</head>
<body class="black">

	<nav class="purple darken-4">
		<div class="container">
			<div class="nav-wrapper">
				<a href="<?php echo site_url('controller/index'); ?>" class="brand-logo left">
					Game Library
                    <img src="<?php echo base_url(); ?>/static/res/logo.png">
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li>
						<a href="<?php echo site_url('controller/login_form'); ?>"><i class="material-icons left">person</i>Login</a>
					</li>
					<li>
						<a href="<?php echo site_url('controller/reg_form'); ?>"><i class="material-icons left">person_add</i>Cadastro</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<li class="wrapper">
			<img src="<?php echo base_url();?>/static/res/logo2.png" id="sidenavlogo" height="200">
			<h2 id="sidenavhtext">Game Library</h2>
		</li>
		<li>
			<hr><br>
		</li>
		<li>
			<a href="<?php echo site_url('controller/login_form'); ?>"><i class="material-icons left purple-text text-darken-4">person</i>Login</a>
		</li>
		<li>
			<a href="<?php echo site_url('controller/reg_form'); ?>"><i class="material-icons left purple-text text-darken-4">person_add</i>Cadastro</a>
		</li>
	</ul>

	<img id="backimg" src="<?php echo base_url();?>/static/res/back.jpg">
	<span id="backmask"></span>

	<div class="section wrapper" id="mainsection">
		<h1>Só a ponta do teste</h1>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>/static/js/index.js"></script>
	<script src="<?php echo base_url();?>/static/materialize/js/materialize.min.js"></script>
</body>
</html>
