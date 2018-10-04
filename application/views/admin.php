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
			 <a><span class="white-text name">[@nome]</span></a>
			 <a><span class="white-text email">[@email]</span></a>
		 </div></li>
		 <li><a href="#!"><i class="material-icons">create</i>Editar informações</a></li>
     <li><a href="<?php echo site_url('controller/login_form'); ?>">Deslogar</a></li>
	 	</ul>
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
	        <li class="tab col s3"><a class="active" href="#view1">Visualizar Jogos</a></li>
	        <li class="tab col s3"><a href="#view2">Visualizar Usuarios</a></li>
	        <li class="tab col s3"><a href="#view3">Visualizar Compras</a></li>
	      </ul>
	    </div>
	    <div id="view1" class="col s12 view-tab">
				<table>
				 <thead class="table-header">
					 <tr class>
							 <th>Id</th>
							 <th>Nome</th>
					 </tr>
				 </thead>
				 <tbody class="table-body">
					 <tr>
						 <td>1</td>
						 <td>The Witcher</td>
					 </tr>
					 <tr>
						 <td>2</td>
						 <td>The Forest</td>
					 </tr>
					 <tr>
						 <td>3</td>
						 <td>Dark Souls</td>
					 </tr>
				 </tbody>
			 </table>
			</div>
	    <div id="view2" class="col s12">
				Test 2
			</div>
	    <div id="view3" class="col s12">
				Test 3
			</div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>/static/js/index.js"></script>
	<script src="<?php echo base_url();?>/static/materialize/js/materialize.min.js"></script>
	<script>
	$(document).ready(function(){
    $('.tabs').tabs();
  });
	</script>
</body>
</html>
