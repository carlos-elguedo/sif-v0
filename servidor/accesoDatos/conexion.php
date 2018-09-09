<?php

/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */

$server = "localhost";//variables para conexion
$username = "root";
$password = "carlosmen";
$database = "sif";
 
$con = mysql_connect($server, $username, $password) or die ("No se conecto: " . mysql_error());//nos conectamos
 
mysql_select_db($database, $con) or die("No base de datos" . mysql_error());//seleccionamos la base de datos


?>