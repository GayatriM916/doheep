<!----------------------------------->
<!--Creado por Ana Milena Arroyave;-->
<!----------------------------------->
<!-- conexion a la base de datos -->

<?php

//session_start();

//creamos la conexion

$string_con = "host = 'localhost' port= '5432' dbname = 'elementos' user = 'postgres' password = 'admin'";

$conexion = pg_connect($string_con) or die('Error en la conexion');

?>
