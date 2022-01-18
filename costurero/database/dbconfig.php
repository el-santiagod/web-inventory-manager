<?php
//Conexion a la base de datos
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "argos_inventario";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
$dbconfig = mysqli_select_db($connection,$db_name);

if($dbconfig)
{
    //echo"Database conectada";
}
else
{
    echo"Database Failed";
    
}
?>