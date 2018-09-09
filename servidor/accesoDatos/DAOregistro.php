<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
require("conexion.php");
require("DAOselector.php");

class DAOregistro{

    var $usuarioNuevo;
    var $selector;

    public function __construct($nuevoUsuario) {
        $this->usuarioNuevo = $nuevoUsuario;
        $this->selector = new DAOselector();
        /*
        foreach ( $this->usuarioNuevo as $i => $nombrevalor )
        {
            //echo "Es ". $i . " - " . $nombrevalor; 
        }
        */
    }


    public function registrarUsuario()
    {
        $registroExitoso = false;
        $email = $this->usuarioNuevo->get_Correo();
        //echo "Entro en registrar usuario ". $email;
        if($this->existeUsuario($email)){
            //echo "Ya existe un usuario con ese correo";
            $registroExitoso = false;
        }else{
            //echo "No hay usuario con ese correo. Tipo: ". $this->usuarioNuevo->get_Tipo();
            $correo = $this->usuarioNuevo->get_Correo();
            $pass = $this->usuarioNuevo->get_Pass();
            $tipo = $this->usuarioNuevo->get_Tipo();
            $nombres = $this->usuarioNuevo->get_Nombres();
            $fecha = $this->usuarioNuevo->get_FechaNac();
            $edad = $this->usuarioNuevo->get_Edad();

            //Pocedemos a ingresar el usuario en la base de datos, pero antes comprobamos que tipo de usuario es
            if($tipo == "Cliente"){//si es de tipo cliente lo guardamos en la tabla cliente y usuarios    
                
                $sqlInsertarUsuario = "INSERT INTO usuarios ".
					"(correo, password, tipo_usuario) ".
					"VALUES ".
					"('$correo', '$pass', '$tipo')";

                $resultadoInsertarUsuario = mysql_query( $sqlInsertarUsuario) or die("No se registro en la tablas Usuario: ".mysql_error());//resalizamos las sentecias

                if($resultadoInsertarUsuario == true){
                    $id_usuarioNuevo = $this->selector->darIdUsuario($correo);

                    $sqlInsertarCliente = "INSERT INTO clientes ".
					"(id_usuario, nombre, correo, edad, fecha_naci, ciudad) ".
					"VALUES ".
					"($id_usuarioNuevo,'$nombres', '$correo', $edad, '$fecha', 'Cartagena')";
                    
                    $resultadoInsertarCliente = mysql_query( $sqlInsertarCliente) or die("No se registro en las tablas Cliente: ".mysql_error());//resalizamos las sentecias

                    if($resultadoInsertarCliente == true){
                        //Registro de cliente satisfactorio
                        $registroExitoso = true;
                    }

                }
            
            }else{//Entonces es un usuario trabajador
                $sqlInsertarUsuario = "INSERT INTO usuarios ".
					"(correo, password, tipo_usuario) ".
					"VALUES ".
					"('$correo', '$pass', '$tipo')";

                $resultadoInsertarUsuario = mysql_query( $sqlInsertarUsuario) or die("No se registro en la tablas Usuario: ".mysql_error());//resalizamos las sentecias

                if($resultadoInsertarUsuario == true){
                    $id_usuarioNuevo = $this->selector->darIdUsuario($correo);

                    $sqlInsertarTrabajador = "INSERT INTO trabajadores ".
					"(id_usuario, nombre, correo, edad, fecha_naci, ciudad) ".
					"VALUES ".
					"($id_usuarioNuevo,'$nombres', '$correo', $edad, '$fecha', 'Cartagena')";
                    
                    $resultadoInsertarTrabajador = mysql_query( $sqlInsertarTrabajador) or die("No se registro en las tablas Trabajador: ".mysql_error());
                    
                    
                    
                    $id_trabajador = $this->selector->darIdTrabajador($id_usuarioNuevo);
                    
                    $sqlCrearPerfil = "INSERT INTO perfil (id_usuario, id_trabajador) VALUES ($id_usuarioNuevo, $id_trabajador)";
                    
                    $resp_insertar_perfil = mysql_query( $sqlCrearPerfil ) or die("No se registro en la tabla perfil: ".mysql_error());

                    
                    
                    $sqlCrearServicio = "INSERT INTO servicio (id_usuario, id_trabajador) VALUES ($id_usuarioNuevo, $id_trabajador)";
                    
                    $resp_insertar_servicio = mysql_query( $sqlCrearServicio ) or die("No se registro en la tabla servicio: ".mysql_error());
                    
                    
                    
                    if($resultadoInsertarTrabajador == true){
                        //Registro de cliente satisfactorio
                        $registroExitoso = true;
                    }

                }
            }//Fin del else para el usuario tipo trabajador
            
            
            
        }

        return $registroExitoso;
    }








    //Funcion para saber si un usuario con esos datos ya existe en la base de datos
    public function existeUsuario($email='')
    {
        $retorno = false;
        $sql = "SELECT * FROM `usuarios` WHERE correo = '$email'";//sentencia para comprobar si existe un correo ya registrado

        $yaEsta = mysql_query($sql) or die("No se pudo ejecutar la consulta para saber si existe el usuario: " . mysql_error());//obtenemos el resultado de la consulta

        if (mysql_num_rows($yaEsta) > 0){//obtenemos el array de la consulta
        	$retorno = true;
        }else{//si no esta ya el correo en bd
            $retorno = false;
        }

        return $retorno;
    }

    //Funcion para el cifrado de datos
    function crypt_blowfish_bydinvaders($password, $digito = 7) {
        $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $salt = sprintf('$2a$%02d$', $digito);
        for($i = 0; $i < 22; $i++){
            $salt .= $set_salt[mt_rand(0, 22)];
        }
        return crypt($password, $salt);
    }
}//Fin de la clase

?>