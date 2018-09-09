<?php
session_start();
/**
 * @author Carlos-Elguedo, Rafael Castellar, Zamir Martelo
 * @copyright 2016
 */


$ID = $_SESSION["id_usuario"];


    session_destroy();
    //echo "Entro";
    /*$ver = "SELECT * FROM usuarios_linea WHERE usuarios_linea.correo = '$correo'";
    if ($res = mysql_query($ver, $con)){//obtenemos el resultado
        if (mysql_num_rows($res) > 0){
            //echo "Es mayor a cero";
            //si ya esta en la tabla de usuarios online
            $eliminar = "DELETE FROM sif.usuarios_linea WHERE usuarios_linea.correo = '$correo'";
            mysql_query($eliminar, $con) or die ("No elimino en Onlines: ". mysql_error());
        }else{
            
            echo "No esta en la tabla online";
            
        }
    }//fin de la consulta
    else{
        echo "Error: ".mysql_error();
    }
    */
    echo "<script>
    alert('Cerro sesion correctamente');
    location.href = '../../index.html';
    </script>";
//header("Location: http://localhost/SIF/www/index.html");

?>