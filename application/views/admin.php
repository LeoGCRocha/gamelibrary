<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>/static/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/static/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/static/css/admin.css">
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
				<ul id="nav-mobile" class="right hide-on-med-and-down"></ul>
			</div>
			<?php
				if($this->session->is_admin){ ?>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li>
							<a href="<?php echo site_url('controller/logout'); ?>"class="waves-effect waves-light btn-small">
								Deslogar
							</a>
						</li>
					</ul>
				<?php	} ?>
		</div>
	</nav>

	<div id="menu-info" class="row">
		<a href="#" data-target="slide-out" class="sidenav-trigger">
			<i class="material-icons">menu</i><span id="span-interno">Informações da conta</span>
		</a>
	</div>

	<div id="admin-painel">
	 	<ul id="slide-out" class="sidenav">
		 <li>
		<div class="user-view">
			 <div class="background">
				 <img src="http://newnormative.com/wp-content/uploads/2018/09/thewitcher3.jpg">
			 </div>
			 <a><img id="img-perfil" class="circle" src="http://www.tntwestsoccer.com/wp-content/uploads/2016/05/NO-IMAGE-AVAILABLE-300x300.jpg"></a>
			 <a><span class="white-text name"><?php echo $admin['nome']; ?></span></a>
			 <a><span class="white-text email"><?php echo $admin['email']; ?></span></a>
		 </div></li>
		 <li><a class="modal-trigger" href="#modal-perfil"><i class="material-icons">create</i>Editar informações</a></li>
     <li><a href="<?php echo site_url('controller/logout'); ?>">Deslogar</a></li>
	 	</ul>
	</div>
	<!-- Modal p/ editar informações pessoais -->
	<div id="modal-perfil" class="modal">
	<div class="modal-content">
		<!-- Formulario pessoal -->
			<h4>Editar informações pessoais:</h4>
			<form action="<?php echo site_url('controller/salvar'); ?>" method="post">
				<div class="input-field">
					<input value="<?php echo $admin['id'] ?>" name="id" id="l-id" type="text" readonly>
				</div>
				<div class="input-field">
					<input value="<?php echo $admin['nome'] ?>" id="l-nome" name="nome" type="text" class="validate" required>
					<label for="l-nome">Nome</label>
				</div>
				<div class="input-field">
					<input value="<?php echo $admin['email'] ?>" id="l-email" name="email" type="text" class="validate" required>
					<label for="l-email">Email</label>
				</div>
				<div class="input-field">
					<input value="<?php echo $admin['telefone'] ?>" id="l-telefone" name="telefone" type="text" class="validate" required>
					<label for="l-telefone">Telefone</label>
				</div>
				<label>
					<?php if ($admin['sexo'] == 'masculino') { ?>
						<input id="u-sexo-m" name="sexo" value="masculino" type="radio" checked>
					<?php } else{ ?>
						<input id="u-sexo-m" name="sexo" value="masculino" type="radio">
					<?php }?>
					<span>Homem</span>
				</label>
				<label>
					<?php if ($admin['sexo'] == 'feminino') { ?>
						<input id="u-sexo-f" name="sexo" value="feminino" type="radio" checked>
					<?php } else { ?>
						<input id="u-sexo-f" name="sexo" value="feminino" type="radio">
					<?php }?>
					<span>Mulher</span>
				</label>
				<div class="wrapper">
					<button class="btn-large" type="submit">Confirmar<i class="material-icons right">send</i></button>
				</div>
			</form>
		<!-- Fim formulario pessoal -->
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
		</div>
	</div>
	<!-- Fim modal p/ editar informações pessoais -->
	<!-- Iniciio modal p/ deletar usuario -->
 	<div id="modal-delete" class="modal">
	    <div class="modal-content">
	      <h4 id="h4ModalDelete">Deletando []:</h4>
	      <p>Tem certeza que deseja deletar este usuario?</p>
	    </div>
	    <div class="modal-footer">
	      <a id="botaoConfirmarDeletar" href="#!" class="modal-close waves-effect waves-green btn-flat">Confirmar</a>
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
	    </div>
  	</div>
	<!-- Fim modal p/ deletar usuario -->
	<!-- Inicio modal p/ editar usuario  -->
	<div id="modal-editar" class="modal">
		<div class="modal-content">
			<h4>Editar usuario: </h4>
			<form action="<?php echo site_url('controller/editar_usuario'); ?>" method="post">
				<div class="input-field">
					<input id="u-id2" name="id" type="text" readonly='readonly'>
					<label for="u-id2">Id</label>
				</div>

				<div class="input-field">
					<input id="u-nome2" name="nome" type="text" class="validate" required>
					<label for="u-nome2">Nome</label>
				</div>

				<div class="input-field">
					<input id="u-email2" name="email" type="email" class="validate" required>
					<label for="u-email2">Email</label>
				</div>

				<label>
					<input id="u-sexo-m2" name="sexo" value="masculino" type="radio" checked>
					<span>Homem</span>
				</label>
				<label>
					<input id="u-sexo-f2" name="sexo" value="feminino" type="radio">
					<span>Mulher</span>
				</label>

				<div class="input-field">
					<input id="u-telefone2" name="telefone" type="tel" class="validate" minlength="12" maxlength="13" required>
					<label for="u-telefone2">Telefone</label>
				</div>

				<div class="wrapper">
					<button class="btn-large" type="submit">Editar<i class="material-icons right">send</i></button>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
		</div>
	</div>
	<!-- Fim modal p/editar usuario -->
	<ul class="sidenav" id="mobile-demo">
		<li class="wrapper">
			<img src="<?php echo base_url();?>/static/res/logo2.png" id="sidenavlogo" height="200">
			<h2 id="sidenavhtext">Game Library</h2>
		</li>
		<li>
			<hr><br>
		</li>
		<li>
			<a href="<?php echo site_url('controller/login_form'); ?>"><i class="material-icons left purple-text text-darken-4">person</i>Conta</a>
		</li>
	</ul>

	<div id="topsection">
		<img id="backimg" src="<?php echo base_url();?>/static/res/back.jpg">
		<span id="backmask"></span>
	</div>

	<div id="table-box">
		<div id="table-view-header" class="row">
	    <div class="col s12">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#view1">Visualizar Jogos</a></li>
	        <li class="tab col s3"><a class="active" href="#view2">Visualizar Usuarios</a></li>
	        <li class="tab col s3"><a href="#view3">Visualizar Compras</a></li>
	      </ul>
	    </div>
	    <div id="view1" class="col s12 view-tab">
	    	<?php if (count($exhib) > 0 ){ ?>
			<table>
				 <thead class="table-header">
					 <tr class>
						 <th>Id</th>
						 <th>Nome</th>
					 </tr>
				 </thead>
				 <tbody class="table-body">
				 	<?php
			 			foreach($exhib as $jAtual){ ?>
						<tr>
							<td><?php echo $jAtual['id']; ?></td>
							<td><?php echo $jAtual['nome']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			 </table>
			 <?php }else { ?>
			 	<h3> - Nenhum jogo cadastrado no BD - </h3>
			 <?php } ?>
		</div>
		<!-- VIEW USUARIOS -->
	    <div id="view2" class="col s12">
	    	<?php if (count($exhib2) > 0){ ?>
			<table>
				 <thead class="table-header">
					 <tr class>
						 <th>Id</th>
						 <th>Nome</th>
						 <th>Email</th>
						 <th>Sexo</th>
						 <th>Telefone</th>
						 <th>Wallet</th>
						 <th>Opções</th>
					 </tr>
				 </thead>
				 <tbody class="table-body">
				 	<?php
				 			foreach($exhib2 as $uAtual){ ?>
						<tr>
							<td><?php echo $uAtual['id']; ?></td>
							<td><?php echo $uAtual['nome']; ?></td>
							<td><?php echo $uAtual['email']; ?></td>
							<td><?php echo $uAtual['sexo']; ?></td>
							<td>
								<?php echo $uAtual['telefone']; ?>
							</td>
							<td><?php echo $uAtual['wallet']; ?></td>
							<td>
							<a class="modal-trigger"
								 href="#modal-delete" onclick="deletarUsuario(<?php echo $uAtual['id'] ?>, '<?php echo $uAtual['nome']; ?>')">
							  	<i class="material-icons">
							  	delete_forever
							  	</i>
							</a>
							<a class="modal-trigger"
								 href="#modal-editar" onclick="editarUsuario(<?php echo $uAtual['id']; ?>,'<?php  echo $uAtual['nome']; ?>','<?php echo $uAtual['email']; ?>','<?php echo $uAtual['telefone']; ?>','<?php echo $uAtual['sexo'] ?>');">
								<i class="material-icons">create</i>
							</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			 </table>
			 <?php }else { ?>
			 	<h3> - Nenhum usuario cadastrado no BD - </h3>
			 <?php } ?>
		</div>
	    <div id="view3" class="col s12">
			Test 3
		</div>
	  </div>
	</div>
	<!-- SCRIPTS PAGINA -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>/static/js/index.js"></script>
	<script src="<?php echo base_url();?>/static/materialize/js/materialize.min.js"></script>
	<script>
	$(document).ready(function(){
    	$('.sidenav').sidenav();
  	});
	$(document).ready(function(){
		$('.modal').modal();
	});
	$(document).ready(function(){
    	$('.tabs').tabs();
	});
	function deletarUsuario(userId = 0, userNome = ""){
		$("#h4ModalDelete").text('Deletar '+userNome+':');
		$("#botaoConfirmarDeletar").attr('href','./deletarUsuario/'+userId);
	}
	function editarUsuario(userId = 0,userNome = "",userEmail = "",userTelefone = "",userSexo = ""){
		$("#u-id2").val(userId);
		$("#u-nome2").val(userNome);
		$("#u-email2").val(userEmail);
		$("#u-telefone2").val(userTelefone);
		if(userSexo == "feminino"){
			$("#u-sexo-f2").attr('checked',true);
			$("#u-sexo-m2").attr('checked',false);
		}
		$(document).ready(function() {
		 M.updateTextFields();
	 	});
	}
	</script>
</body>
</html>
