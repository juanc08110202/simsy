<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estilo_acceso.css">

	
	<title>Seleccion de perfil</title>
</head>

<body>
 

<?php
//Incluyendo La conexión con la base de datos
include ("../Login/conexion_bd.php");

?>

<div class = "encabezado">
	<H1>SELECCION DE PERFIL<H1>

</div>

<div class = "perfiles">
	<H3>Instituto Pedagogico Nuestra Señora de las Lajas<H3>

<?php

// Iniciar la sesión para obtener el usuario de validar.php
session_start();

// Obtener el dato de la variable de sesión (usuario y contraseña)
$usuario = $_SESSION['usuario'];
$contraseña = $_SESSION['password'];

// con el nombre del usuario realizar la consulta de su ID_contraseña para
// relacionarla mas adelante
$consult1 = "SELECT Id_contraseña FROM usuario WHERE usuario = '$usuario'";

// Ejecuta la consulta
$result1 = mysqli_query($conexion, $consult1);

// El resultado de la consulta es asignado a una variable $Id
    $Id = mysqli_fetch_assoc($result1);

    // Se guarda el valor del Id_contraseña que corresponde al ID del usuario
	// el cual se relaciona con la tabla cargo.
	$Id_contraseña = $Id["Id_contraseña"];


	if ($Id_contraseña) {

		$consult2 = "SELECT c.perfiles
		FROM usuario u
		JOIN cargoporusuario cu ON u.id_Contraseña = cu.id_contraseña
		join cargo c on cu.id_cargo = c.id_cargo
		where u.id_contraseña = $Id_contraseña";

		$result2 = mysqli_query($conexion, $consult2);

		// se obtiene el número de filas resultantes de una consulta SELECT en MySQLi.
		if (mysqli_num_rows($result2) > 0) {

		// Mostrar los roles con botones
		echo "Perfiles del usuario $usuario:<br>";
	
		while ($rol = mysqli_fetch_assoc($result2)) {
			$perfil = $rol['perfiles'];

			if ($perfil == 'Administrador'){
				// Generar un botón para cada rol
			echo "<form method='POST' action='../Administrador/Admin.html'>";
			echo "<input type='submit' value='$perfil'>";
			echo "</form>";

			}elseif($perfil == 'Rector'){
				// Generar un botón para cada rol
			echo "<form method='POST' action='../Rector/Rector.html'>";
			echo "<input type='submit' value='$perfil'>";
			echo "</form>";

			}elseif($perfil == 'Coordinador'){
				// Generar un botón para cada rol
			echo "<form method='POST' action='../Coordinador/Coordinador.html'>";
			echo "<input type='submit' value='$perfil'>";
			echo "</form>";

			}elseif($perfil == 'Profesor'){
				// Generar un botón para cada rol
			echo "<form method='POST' action='../Profesor/Profesor.html'>";
			echo "<input type='submit' value='$perfil'>";
			echo "</form>";

			}elseif($perfil == 'Secretaria'){
				// Generar un botón para cada rol
			echo "<form method='POST' action='../Secretaria/Secretaria.html'>";
			echo "<input type='submit' value='$perfil'>";
			echo "</form>";
			}
			
		}
	} else {
		echo 'El usuario no cuenta con ningun perfil asociado';
	}
		mysqli_close($conexion);
	}

?>
		
</div>

<div class = "encabezado">
	<H3>Usted cuenta con estos perfiles de usuario.<br>
Por favor, seleccione el perfil con el cual desea trabajar
<H3>
</div>


</body>
