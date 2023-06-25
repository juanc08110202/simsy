<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="../Profesor/styles/practica7.css" rel="stylesheet" type="text/css" />
    <link href="../Profesor/styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="../Profesor/styles/formulario.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Registro</title>
</head>

<body>
	<header>
		<a href="" class='logo'>
			<img src="../img/logo.jpg" />
		</a>
		<nav>
			<a class="ultimos" href="../index.html">Inicio</a>
			
		</nav>
		<div class="options">
			<img src="../Profesor/img/Search.png" />
			<img src="../Profesor/img/User.png" />
		</div>

	</header>
	<main>
		<h1>Plantel Docente </h1>
        <?php
        $nombreUsuario = $_POST['usuario']; 
        echo 'Bienvenido, ' . $nombreUsuario;
        ?>
