<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/practica7.css" rel="stylesheet" type="text/css" />
	<link href="./styles/formulario.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
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
			<img src="./img/Search.png" />
			<img src="./img/User.png" />
		</div>

	</header>
	<main>
		<h1>Registro de usuario </h1>
		<form method="post">
			<div class='field'>
				<label>Primer Nombre</label>
				<input name= "PrimerNombre" type='text' minlength="3" maxlength="15" required pattern="[A-Za-z]+" />
			</div>
			<div class='field'>
				<label>Segundo Nombre</label>
				<input name='SegundoNombre' type='name' minlength="3" maxlength="15" required pattern="[A-Za-z]+" />
			</div>
			<div class='field'>
				<label>Primer Apellido</label>
				<input name='PrimerApellido' type='name'minlength="3" maxlength="15" required pattern="[A-Za-z]+" />
			</div>
			<div class='field'>
				<label>Segundo Apellido</label>
				<input name='SegundoApellido' type='name' minlength="3" maxlength="15" required pattern="[A-Za-z]+" />
			</div>
			<div class='field'>
				<label>Tipo de Documento</label>
				<select name='TipoDocumento'  type='TipoDocuemnto' required value="">
					<option selected disabled>--</option>
					
					<?php
					include ("../Login/conexion_bd.php");

					//Recuperar la estructura de laconsulta que esta dentro del 
					//procedimiento almacenado

					$consultaListadoTipoDocumento = "call recuperarTipoDocumento()";

					$resultadoConsultaTipoDocumento = mysqli_query($conexion, $consultaListadoTipoDocumento);

					if ($resultadoConsultaTipoDocumento){
						while ($fila=mysqli_fetch_assoc($resultadoConsultaTipoDocumento)){
							echo '<option value="'.$fila['Id_Tipo_Documento'].'">'.$fila['Nomenclatura'].'</option>';
						}
					}

					mysqli_close($conexion);

					?>

				</select>
				</div>
			<div class='field'>
				<label>Numero del Documento</label>
				<input name='N_Documento' type='name' minlength="3" maxlength="15" required pattern="[0-9]+" />
			</div>
			<div class='field'>
				<label>Edad</label>
				<input name='Edad' type='name' minlength="1" maxlength="3" required pattern="[0-9]+" />
			</div>
			<div class='field'>
				<label>Cargo</label>
				<select name='Cargo'  type='cargo' required value="">
				<option selected disabled>--</option>
					
					<?php
					include ("../Login/conexion_bd.php");

					//Recuperar la estructura de laconsulta que esta dentro del 
					//procedimiento almacenado

					$consultaListadoCargos = "call recuperarcargos()";

					$resultadoConsultaCargos = mysqli_query($conexion, $consultaListadoCargos);

					if ($resultadoConsultaCargos){
						while ($fila=mysqli_fetch_assoc($resultadoConsultaCargos)){
							echo '<option value="'.$fila['id_cargo'].'">'.$fila['perfiles'].'</option>';
						}
					}

					mysqli_close($conexion);

					?>

				</select>
			</div>
			<div class='field'>
				<label>Email</label>
				<input name='Email' type='email'  />
			</div>
			<div class='field'>
				<label>Direccion </label>
				<input name='Direccion' type='Direccion' minlength="5" maxlength="30"  />
			</div>
			<div class='field'>
				<label>Localidad</label>
				<select name='Localidad'  type='Localidad' required value="">
					<option selected disabled>--</option>
					
					<?php
					include ("../Login/conexion_bd.php");

					//Recuperar la estructura de laconsulta que esta dentro del 
					//procedimiento almacenado

					$consultaListadoLocalidades = "call recuperarLocalidades()";

					$resultadoConsultaLocalidad = mysqli_query($conexion, $consultaListadoLocalidades);

					if ($resultadoConsultaLocalidad){
						while ($fila=mysqli_fetch_assoc($resultadoConsultaLocalidad)){
							echo '<option value="'.$fila['Id_Localidades'].'">'.$fila['Localidad'].'</option>';
						}
					}

					mysqli_close($conexion);

					?>
				</select>

			</div>
			<div class='field'>
				<label>Eps</label>
				<select name='Eps' type='eps' required value="">
					<option selected disabled>--</option>
					<?php

					include ("../Login/conexion_bd.php");

					//Recuperar la estructura de laconsulta que esta dentro del 
					//procedimiento almacenado

					$consultaListadoEPS = "call recuperarEps()";

					$resultadoConsultaEps = mysqli_query($conexion, $consultaListadoEPS);

					if ($resultadoConsultaEps){
						while ($fila=mysqli_fetch_assoc($resultadoConsultaEps)){
							echo '<option value="'.$fila['CodEPS'].'">'.$fila['NombreEps'].'</option>';
						}
					}

					mysqli_close($conexion);

					?>
				</select>
			</div>
			<div class='field'>
				<label>Ciudad</label>
				<select name='Ciudad' type='Ciudad' required value="">
					<option selected disabled>--</option>
					<?php

					include ("../Login/conexion_bd.php");

					//Recuperar la estructura de laconsulta que esta dentro del 
					//procedimiento almacenado

					$consultaListadoCiudades = "call recuperarciudad()";

					$resultadoConsultaCiudades = mysqli_query($conexion, $consultaListadoCiudades);

					if ($resultadoConsultaCiudades){
						while ($fila=mysqli_fetch_assoc($resultadoConsultaCiudades)){
							echo '<option value="'.$fila['id_ciudad'].'">'.$fila['Ciudad'].'</option>';
						}
					}

					mysqli_close($conexion);

					?>

				</select>
			</div>
			<div class='field'>
				<label>Contraseña</label>
				<input name='Contraseña1' type='password'  minlength="8" maxlength="20" required pattern="[A-Za-z0-9]+"/>
			</div>
		</div>
		<div class='field'>
			<label>Confirmar Contraseña</label>
			<input name='Contraseña2' type='password'  minlength="8" maxlength="20" required pattern="[A-Za-z0-9]+"/>
		</div>
			<div class='field'>
				<label>Teléfono</label>
				<input name='Telefono' type='tel'minlength="10" maxlength="10" required pattern="[0-9]+" />
			</div>
			
			<div class='gustos'>
				<label>Acepta Politicas internas?</label>
				<div><input name='Politicas' type='radio' />Sí</div>
				<div><input name='Politicas' type='radio' />No</div>
			</div>
			<div class='textBox'>
				<label>Otros datos </label>
				<textarea></textarea>
			</div>
			<div class='submit'>
				<button type="submit" value="Registrar" name="Registrar">
					REGISTRAR
				</button>
			</div>
		</form>
		<script>
			document.querySelector('form').addEventListener('submit', function(event) {
			var Contraseña1 = document.getElementById('Contraseña1').value;
			var Contraseña2 = document.getElementById('Contraseña2').value;
				
			if (Contraseña1 !== Contraseña2) {
			alert("Las contraseñas no coinciden");
			event.preventDefault(); // Evita que el formulario se envíe si las contraseñas no coinciden
			}
			});
		</script>

	</main>

<?php
include ("Validar_Registro.php");
?>

</body>

</html>