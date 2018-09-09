<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
require("conexion.php");

class DAOinsertador{

    public function __construct() {
        
    }


    ////Esta funcion inserta una imagen de perfil en la base de datos  
    public function insertarImagenPerfil($ID, $ruta) {
        
        $estado = "NO-OK";
        $tipo = "";
        
        $sqltraerTipo = "SELECT tipo_usuario FROM usuarios WHERE id = $ID";
        
        $res = mysql_query($sqltraerTipo) or die ("No pudo traer el tipo de usuario: " . mysql_error());
        
        if(mysql_num_rows($res) > 0){
            $datos = mysql_fetch_assoc($res);
            $tipo = $datos["tipo_usuario"];
        }
        
        if(strcmp($tipo, "Cliente")==0){
            $insrto = mysql_query("UPDATE `sif`.`clientes` SET `ruta_imagen` = '$ruta' WHERE `clientes`.`id_usuario` = '$ID';") or die ("No se guardo la imagen del trabajador: " . mysql_error());
            $estado = "OK";
        }
        if(strcmp($tipo, "Trabajador")==0){
            $insrto = mysql_query("UPDATE `sif`.`trabajadores` SET `ruta_imagen` = '$ruta' WHERE `trabajadores`.`id_usuario` = '$ID';") or die ("No se guardo la imagen del trabajador: " + mysql_error());
            $estado = "OK";
        }
        
        return $estado;
    }
    
    
    
    ////Esta funcion inserta un trabajo a un usuario, recibe los datos corrrespondientes
    public function insertarTrabajo($id_usuario, $ruta, $contador, $titulo, $descripcion) {
        
        $sql_guardarTrabajo = "INSERT INTO trabajos"
                . " ( id_usuario, id_trabajador, rutaTrabajo, contador, titulo, descripcion)"
                . " VALUES"
                . " ($id_usuario, (SELECT id_trabajador FROM trabajadores WHERE id_usuario = '$id_usuario'), '$ruta', $contador, '$titulo' , '$descripcion');";
        
        $resul_guardarTrabajo = mysql_query($sql_guardarTrabajo) or die("No se guardo en la tabla Trabajos: ".mysql_error());
    }
    
    






    //Esta funcion inserta el primer mensaje y crea un enlace entre dos usuarios
    public function insertarPrimerMensaje($de, $para, $mensaje, $asunto){
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");

            

            //esta sentencia para insertar un nuevo enlace: un nuevo chat entre dos usuarios
            $sql_enlaces = "INSERT INTO `enlaces`(`de`, `para`, `asunto`, `mensaje`, `fecha`, `hora`, `fecha_hora`) VALUES ($de, $para, '$asunto', '$mensaje', '$fecha', '$hora', '$fecha_y_hora')";
	    
            $resul_enlace = mysql_query($sql_enlaces) or die("No Inserto el enlace en la tabla: ".mysql_error());
            
            
            
	    //sentencia para guardar el mensaje
   	    $sql_mensajes = "INSERT INTO mensajes (de, para, enviador, mensaje, id_enlace, fecha, hora, fecha_hora) VALUES ($de, $para, $de, '$mensaje', (SELECT id_enlace FROM enlaces WHERE de = $de AND para = $para), '$fecha', '$hora', '$fecha_y_hora');";
            

	    $resul_mensaje = mysql_query($sql_mensajes) or die("No se guardo en la tabla mensajes: ".mysql_error());
	
	    echo "OK";
    }
    
    
    
    ////Esta funcion inserta un mensaje en la base de datos
    public function enviarMensaje($de, $para, $mensaje, $asunto) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");

        //sentencia para guardar el mensaje
   	$sql_mensajes = "INSERT INTO mensajes"
                . " (de, para, enviador, mensaje, id_enlace, fecha, hora, fecha_hora)"
                . " VALUES"
                . " ($de, $para, $de, '$mensaje', (SELECT `id_enlace` FROM `enlaces` WHERE `de` = $de AND `para` = $para), '$fecha', '$hora', '$fecha_y_hora');";
            

	$resul_mensaje = mysql_query($sql_mensajes) or die("No se guardo en la tabla mensajes: ".mysql_error());
	
	echo "OK";
    }
    ////Esta funcion inserta un mensaje desde el chat en la base de datos 
    public function enviarMensaje_chat($de, $para, $mensaje, $enlace) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");

        //sentencia para guardar el mensaje
   	//$sql_mensajes = "INSERT INTO mensajes (de, para, enviador, mensaje, id_enlace, fecha, hora, fecha_hora) VALUES ($de, $para, $de, '$mensaje', (SELECT id_enlace FROM enlaces WHERE de = $de AND para = $para), '$fecha', '$hora', '$fecha_y_hora');";
        $sql_mensajes = "INSERT INTO mensajes (de, para, enviador, mensaje, id_enlace, fecha, hora, fecha_hora) VALUES ($de, $para, $de, '$mensaje', $enlace, '$fecha', '$hora', '$fecha_y_hora');";

	$resul_mensaje = mysql_query($sql_mensajes) or die("No se guardo en la tabla mensajes chat:  ".mysql_error());
	
	echo "OK";
    }

    ////Esta funcion inserta una nota en la base de datos
    public function enviarNota($id_usuario_enviador, $para, $n, $t, $enlace) {
        
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");
        
        $sql_insertar_cot = "INSERT INTO cotizaciones
                    (id_trabajador, array_cantidades, array_descripciones, array_valores, total, hora, fecha, fecha_hora, para, nota, mensaje_nota, titulo)
                     VALUES
                    ($id_usuario_enviador, '', '', '', 0, '$hora', '$fecha', '$fecha_y_hora', $para, 1, '$n', '$t')";
    
        $resul = mysql_query($sql_insertar_cot) or die("Error insertando cotizacion: ".mysql_error());
        
        
        $sql = "SELECT id_cotizacion FROM cotizaciones";//sentencia de la consulta
        $cot = -1;
        if ($resultado = mysql_query($sql)){//obtenemos el resultado
            //obtnrmos los datos de la consulta y los almacenamos en esta variable
            while($datos = mysql_fetch_array($resultado)){
                $cot = $datos["id_cotizacion"];
            }
        }    
        
        $sql_mensaje = "INSERT INTO mensajes
                    (de, para, mensaje, enviador, id_enlace, fecha, hora, fecha_hora, cotizacion, id_cotizacion)
                     VALUES 
                    ($id_usuario_enviador, $para, '', $id_usuario_enviador, $enlace, '$fecha', '$hora', '$fecha_y_hora', 1, $cot)";
                    
        $resul2 = mysql_query($sql_mensaje) or die("Error insertando mensaje de cotizacion: ".mysql_error());
        
        echo "OK";
        
    }
    
    
    
    
    ////Esta funcion inserta una factura desde el chat en la base de datos
    public function enviarFactura($id_usuario_enviador, $para, $cantidades, $descripciones, $valores, $total, $enlace) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");
        
        $total = substr($total, 2, strlen($total));
        
        
        $sql_insertar = "INSERT INTO cotizaciones
                    (id_trabajador, array_cantidades, array_descripciones, array_valores, total, hora, fecha, fecha_hora, para, nota, mensaje_nota, titulo)
                     VALUES
                    ($id_usuario_enviador, '$cantidades', '$descripciones', '$valores', '$total', '$hora', '$fecha', '$fecha_y_hora', '$para', 0, '', '')";
    
        $resul = mysql_query($sql_insertar) or die("Error insertando cotizacion: ".mysql_error());
        
        
        
        $sql = "SELECT id_cotizacion FROM cotizaciones";//sentencia de la consulta
        $cot = -1;
        if ($resultado = mysql_query($sql)){//obtenemos el resultado
            //obtnrmos los datos de la consulta y los almacenamos en esta variable
            while($datos = mysql_fetch_array($resultado)){
                $cot = $datos["id_cotizacion"];
            }
        }
        
        
        $sql_mensaje = "INSERT INTO mensajes
                (de, para, mensaje, enviador, id_enlace, fecha, hora, fecha_hora, cotizacion, id_cotizacion)
                VALUES 
                ($id_usuario_enviador, $para, '', '$id_usuario_enviador', $enlace, '$fecha', '$hora', '$fecha_y_hora', 1, $cot)";
                    
        $resul2 = mysql_query($sql_mensaje) or die("Error insertando mensaje de cotizacion: ".mysql_error());
    
        echo "OK";
        
    }


    ////Esta funcion inserta una factura de mas de dos filas en la base de datos
    public function enviarFacturaGrande($id_usuario_enviador, $para, $cantidades, $descripciones, $valores, $total, $enlace) {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");
        
        $total = substr($total, 2, strlen($total));
        
        
        $sql_insertar = "INSERT INTO cotizaciones
                    (id_trabajador, array_cantidades, array_descripciones, array_valores, total, hora, fecha, fecha_hora, para, nota, mensaje_nota, titulo, grande)
                     VALUES
                    ($id_usuario_enviador, '$cantidades', '$descripciones', '$valores', '$total', '$hora', '$fecha', '$fecha_y_hora', '$para', 0, '', '', 1)";
    
        $resul = mysql_query($sql_insertar) or die("Error insertando cotizacion: ".mysql_error());
        
        
        
        $sql = "SELECT id_cotizacion FROM cotizaciones";//sentencia de la consulta
        $cot = -1;
        if ($resultado = mysql_query($sql)){//obtenemos el resultado
            //obtnrmos los datos de la consulta y los almacenamos en esta variable
            while($datos = mysql_fetch_array($resultado)){
                $cot = $datos["id_cotizacion"];
            }
        }
        
        
        $sql_mensaje = "INSERT INTO mensajes
                (de, para, mensaje, enviador, id_enlace, fecha, hora, fecha_hora, cotizacion, id_cotizacion)
                VALUES 
                ($id_usuario_enviador, $para, '', '$id_usuario_enviador', $enlace, '$fecha', '$hora', '$fecha_y_hora', 1, $cot)";
                    
        $resul2 = mysql_query($sql_mensaje) or die("Error insertando mensaje de cotizacion: ".mysql_error());
    
        echo "OK";
        
    }
    
    
    
    public function insertarImagenChat($de, $para, $id_enlace, $ruta, $contador){
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $fecha_y_hora = date("Y-m-d H:i:s");

        $sql_mensajes = "INSERT INTO mensajes (de, para, mensaje, enviador, imagen, contador_img, id_enlace, fecha, hora, fecha_hora) VALUES ($de, $para, '', $de , '$ruta', $contador, $id_enlace, '$fecha', '$hora', '$fecha_y_hora');";

        $resul_mensaje = mysql_query($sql_mensajes) or die("No se guardo en la tabla mensajes: ".mysql_error());

        echo "OK";
    }
    
    
    
    
    
    
    
}//Fin de la clase


?>