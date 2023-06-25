<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="../Profesor/styles/practica7.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="Estilo_Plantel_Docente.css">
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
		

		<div class='submit'>

		<?php
		//Incluyendo La conexión con la base de datos
		include ("../Login/conexion_bd.php");
		?>

<?php
		$consult1 = "SELECT p.Primer_Nombre, p.Segundo_Nombre, p.Primer_Apellido, p.Segundo_Apellido
					from usuario u
					JOIN cargoporusuario cu on u.id_contraseña = cu.id_contraseña 
					JOIN personas p on p.id_personas = fk_contraseña_id_personas
					where cu.id_cargo = 11";
		
		$Nombres = mysqli_query($conexion, $consult1);


		// Crear la tabla HTML
		echo '<table class="Lista_Profes">';
		echo '<tr><th>Plantel Docente</th></tr>';

		// Recorrer los resultados de la consulta y mostrar los nombres en la tabla
		while ($fila = mysqli_fetch_assoc($Nombres)) {
			echo '<tr><td>';
			echo '<form action="Gestion_Docentes.php" method="post">';
			echo '<input type="hidden" name="usuario" value="' . 
			$fila['Primer_Nombre'] ." ".$fila['Segundo_Nombre'] .
			" ".$fila['Primer_Apellido'] ." ".$fila['Segundo_Apellido'] . '">';
			echo '<a href="#" onclick="this.parentNode.submit()">' . 
			$fila['Primer_Nombre'] ." ".$fila['Segundo_Nombre'] .
			" ".$fila['Primer_Apellido'] ." ".$fila['Segundo_Apellido'] . '</a>';
			echo '</form>';
			echo '</td></tr>';
		}

		echo '</table>';

		// Cerrar la conexión a la base de datos
		mysqli_close($conexion);
?>
        </div>
			
	</main>