<!-- Lo que se hace aca es iniciar una sesion ya que esta se guarda o ejecuta desde
el servidor, luego se le pasa el usuario y despues incluye la conexion con la BD
 --> 
 <?php
 // Recuperar el usuario y contraseña ingresado en el registro
 // es decir, antes de encriptar
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    if ('Admin123' == $_POST['password'] && $usuario == 'Admin') {
        session_start();

    
    $_SESSION['password']=$password;
    $_SESSION['usuario']=$usuario;
    
    header("location:../acceso/acceso.php");

    }elseif ('Admin123' != $_POST['password'] && $usuario != 'Admin'){

    include('conexion_bd.php');

    $consulta="SELECT Contraseña FROM usuario WHERE usuario='$usuario' LIMIT 1";
    $resultado = mysqli_query($conexion, $consulta);
    }
    if ($resultado){
        $fila = mysqli_fetch_assoc($resultado);

        if ($fila){

            $contraseñaAlmacenada = $fila['Contraseña'];

            //varificar la contraseña
            if (password_verify($password, $contraseñaAlmacenada)) {

                header("location:../acceso/acceso.php");

    session_start();

    
    $_SESSION['password']=$password;
    $_SESSION['usuario']=$usuario;
    
    header("location:../acceso/acceso.php");
        
    }else{
        ?>
        <?php
        include("login.html");
        ?>
        <h3 class="bad" >Error en la autenticacion</h3>
        
        <?php
        
    }

    
    mysqli_free_result($resultado);
    mysqli_close($conexion);
            }

        }
    

    

    

    



