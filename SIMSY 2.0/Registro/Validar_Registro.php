<?php

include ("../Login/conexion_bd.php");

if (isset($_POST['Registrar'])) {
    
        $Nom1 = trim($_POST['PrimerNombre']);
        $Nom2 = trim($_POST['SegundoNombre']);
        $Apell1 = trim($_POST['PrimerApellido']);
        $Apell2 = trim($_POST['SegundoApellido']);
        $Tipo_Documento = trim($_POST['TipoDocumento']);
        $N_Doc = trim($_POST['N_Documento']);
        $Edad = trim($_POST['Edad']);
        $Cargo = trim($_POST['Cargo']);
        $Email = trim($_POST['Email']);
        $Direccion = trim($_POST['Direccion']);
        $Localidad = trim($_POST['Localidad']);
        $Eps = trim($_POST['Eps']);
        $Ciudad = trim($_POST['Ciudad']);
        $Cont1 = trim($_POST['Contraseña1']);
        $Cont2 = trim($_POST['Contraseña2']);
        $Tel = trim($_POST['Telefono']);
        $Politicas = trim($_POST['Politicas']);
        $Primera_letra = $Apell2[0];
        $usuario = "$Nom1.$Apell1.$Primera_letra";

        $nom3 = "";
        $documentInt = intval($N_Doc);
        $edadInt = intval($Edad);
        $telefonoInt = intval($Tel);
        $idCargoInt = intval($Cargo);

     // Encriptamos la contraseña

     $passwordEncriptada = password_hash($Cont1, PASSWORD_DEFAULT);

     //Variable para almacenar la estructura del insert creada en el procedimiento
     //almacenado registrousuario()

     $sqlInsertUsuario = "call registrousuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

     //Variable para ir validando la ejecucion del procedimiento almacenado

     $preparacionConsulta = mysqli_prepare($conexion, $sqlInsertUsuario);

     if ($preparacionConsulta) {
         mysqli_stmt_bind_param($preparacionConsulta, "ssssssiississi", $Nom1, $Nom2, 
         $nom3, $Apell1, $Apell2, $Tipo_Documento, $documentInt, $edadInt, $Email,$Direccion,
         $telefonoInt, $usuario, $passwordEncriptada, $idCargoInt);

         mysqli_stmt_execute($preparacionConsulta);

         if(mysqli_stmt_affected_rows($preparacionConsulta)>0){
             ?>
         <h3>Registro exitoso!</h3>
         <?php
         }else {
             ?>
         <h3>Registro Incorrecto!</h3>
         <?php
         }
     }

 }

?>
