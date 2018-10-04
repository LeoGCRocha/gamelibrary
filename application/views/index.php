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
						<a class="modal-trigger" href="#cadastromodal"><i class="material-icons left">person_add</i>Cadastro</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="cadastromodal" class="modal">
		<div class="modal-content">

			<div class="wrapper2">
				<h4>Cadastro</h4>
				<a href="#!" class="btn modal-close purple darken-4 waves-effect waves-light"><i class="material-icons">close</i></a>
			</div>

			<br>

			<form action="<?php echo site_url('controller/do_cadastro'); ?>" method="post">

				<div class="input-field">
					<input id="u-nome" name="nome" type="text" class="validate" required>
					<label for="u-nome">Nome</label>
				</div>

				<div class="input-field">
					<input id="u-email" name="email" type="email" class="validate" required>
					<label for="u-email">Email</label>
				</div>

				<div class="input-field">
					<input id="u-senha" name="senha" type="password" class="validate" required>
					<label for="u-senha">Senha</label>
				</div>
				<div class="input-field">
					<input id="u-senha2" type="password" class="validate" required>
					<label for="u-senha2">Senha de novo, por favor</label>
				</div>

				<label>
					<input id="u-sexo-m" name="sexo" value="masculino" type="radio" checked>
					<span>Homem</span>
				</label>
				<label>
					<input id="u-sexo-f" name="sexo" value="feminino" type="radio">
					<span>Mulher</span>
				</label>

				<div class="input-field">
					<input id="u-telefone" name="telefone" type="tel" class="validate" minlength="12" maxlength="13" required>
					<label for="u-telefone">Telefone</label>
				</div>

				<div class="wrapper">
					<button class="btn-large" type="submit">Enviar<i class="material-icons right">send</i></button>
				</div>

			</form>
		</div>
	</div>

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
		<a class="modal-trigger" href="#cadastromodal"><i class="material-icons left purple-text text-darken-4">person_add</i>Cadastro</a>
		</li>
	</ul>

	<div id="topsection">
		<img id="backimg" src="<?php echo base_url();?>/static/res/back.jpg">
		<span id="backmask"></span>
	</div>

	<div class="section wrapper" id="mainsection">
		<div class="carousel" id="show">
			<?php if(isset($exhib)): ?>
				<?php foreach($exhib as $game): ?>
				<a class="carousel-item" href="#">
					<img src="<?php echo base_url();?>static/res/games/codbo4.png">
					<span><?php echo $game['nome'] ?></span><br>
					<span>R$ <?php echo $game['preco'].replace('.', ',') ?></span>
				</a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>/static/materialize/js/materialize.min.js"></script>
	<script src="<?php echo base_url();?>/static/js/index.min.js"></script>
</body>
</html>
