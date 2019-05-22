<?php
	require_once('acts/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Social Posts">
	<meta name="keywords" content="Banco, Imagem, Social, Posts, Redes Sociais, Midia">
	<meta name="author" content="Bruno Gomes">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<title>Social Posts</title>
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/manifest.json"><link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="img/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="img/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-toggle.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="css/textext.plugin.autocomplete.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/amsify.suggestags.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#"><img src="../img/logo.png" width="40" ></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#"></a>
		      </li>      
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Banco de Imagens
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="gerenciamento-imagens.php">Nova Imagem</a>
		          <a class="dropdown-item" href="gerenciamento-imagens.php">Gerenciar Imagens</a>          
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Categorias
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="gerenciamento-categorias.php?novo">Nova Categoria</a>
		          <a class="dropdown-item" href="gerenciamento-categorias.php?list">Gerenciar Categorias</a>          
		        </div>
		      </li>		      
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Usuários
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="gerenciamento-usuarios.php">Novo Usuário</a>		          
		          <a class="dropdown-item" href="#">Gerenciar Usuários</a> 		                   
		        </div>
		      </li>		        
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Planos
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="gerenciamento-planos.php">Novo Plano</a>
		          <a class="dropdown-item" href="gerenciamento-planos.php">Gerenciar Planos</a>          
		        </div>
		      </li>	
		      <li class="nav-item">
		        <a class="nav-link" href="recados.php">Recados</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link" href="configuracoes.php">Configurações</a>
		      </li>
		    </ul>
		    <ul class="navbar-nav mr-auto">
		    	<li class="nav-item">
		        	<a class="nav-link nav-info" href="#">Olá Bruno Gomes, o seu plano é Top Stander</a>
		      	</li>
		    	<li class="nav-item dropdown">
		        <a class="nav-link nav-user dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Administrador
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Meus dados</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Sair</a>
		        </div>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
		