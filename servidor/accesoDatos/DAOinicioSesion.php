<?php

/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
require("conexion.php");

class DAOinicioSesion{

    var $inicioSesionExitoso;
    function __construct() {
        $this->inicioSesionExitoso = 0;
    }

    
    //Esta funcion es para manejar el accseso de nuestros usuarios a la aplicacion, recibe sus dos datos de acceso
    function iniciarSesion($correo='', $pass=''){
        //Variable para el decifrado de las contraseñas que estan en la base de datos
        //$passwordenBD = '$2a$07$yMoJrJpwEPrmVnZx4KIyNuOAiOMQksjkV1EW0YRgVe33eYe/yT60y';
        
        //Veridicamos pasamos las contraseñas a 
        /*if( crypt($contra, $passwordenBD) == $passwordenBD) {
            //echo 'Es igual';
            $contra = $passwordenBD;
        }
        */
        $sql = "SELECT correo, tipo_usuario FROM usuarios WHERE correo='$correo' AND password ='$pass'";//sentencia de la consulta
        if ($resultado = mysql_query($sql)){//obtenemos el resultado
            if (mysql_num_rows($resultado) > 0){
                //echo true;
                $datos = mysql_fetch_assoc($resultado);//obtnrmos los datos de la consulta y los almacenamos en esta variable
                $usuCorreo = $datos["correo"];//separamos los datos de la consulta
		$usuTipo = $datos["tipo_usuario"];
		
		if(strcmp($usuTipo, "Cliente")==0){//si el tipo de usuario es igual a cliente
                    $this->inicioSesionExitoso = 1;
                }else{
                    $this->inicioSesionExitoso = 2;
                }
            }else{
                //Hubo un error en la comprobacion de datos
                $verificarCorreo = "SELECT password FROM usuarios WHERE correo='$correo'";
                
                $resVerificarDatos = mysql_query($verificarCorreo) or die ("No se pudo verificar los datos: ". mysqli_error());
                if (mysql_num_rows($resVerificarDatos) > 0){
                    $this->inicioSesionExitoso = 4;
                }else{
                    $this->inicioSesionExitoso = 3;
                }
                
            }
        }

        
        return $this->inicioSesionExitoso;
    }//Fin de la funcion iniciarSesion







    //Esta funcion es para devolver la contraseña del ususario
    public function darContraseniaUsuario($usuario='')
    {
        $SQLsacarContras = "SELECT password FROM usuarios WHERE correo='$usuario'";
        if ($r = mysql_query($sacarContras, $con)){//obtenemos el resultado
            if (mysql_num_rows($r) > 0){
                $traido = mysql_fetch_assoc($r);
                $passwordenBD = $traido["password"];
            }
        }
    }//Fin de la funcion darContraseniaUsuario

    
    
}

?>