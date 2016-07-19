<!----------------------------------->
<!--Creado por Ana Milena Arroyave;-->
<!----------------------------------->
<?php
session_start();

//creamos la conexion

$string_con = "host = 'localhost' port= '5432' dbname = 'elementos' user = 'postgres' password = 'admin'";

$conexion = pg_connect($string_con) or die('Error en la conexion');


//obtenemos variables de usuario
$id = strip_tags($_POST['idcard']);
$password = strip_tags($_POST['contrasena']);
$proyecto = strip_tags($_POST['pry']);

// mysql_select_db("moneylender",$conexion);

$resulpry = pg_query("SELECT usu_pry FROM t_login_usuario WHERE usu_id='".$id."' ;");
$pry = "";
while ($fr = pg_fetch_array($resulpry)) {
	$pry = $fr['usu_pry'];
}

if($pry == "ALMACEN"){
	$resultado1 = pg_query("SELECT * FROM t_login_usuario WHERE usu_id='".$id."' ;");
}else if($pry == "GERENCIA"){
	$resultado1 = pg_query("SELECT * FROM t_login_usuario WHERE usu_id='".$id."' ;");
}else{
   $resultado1 = pg_query("SELECT * FROM t_login_usuario WHERE usu_id='".$id."' and usu_pry = '".$proyecto."';");
}
if (pg_num_rows($resultado1) == 0){
	echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=index.php">
                </head>
            </html>
            ';
}else{
$resultado = pg_query("SELECT * FROM t_login_usuario where usu_id='".$id."' and usu_contrasena = '".$password."';");
$cmax = pg_num_rows($resultado);
if(pg_num_rows($resultado) == 0){
	echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=index.php">
                </head>
            </html>
            ';
}else{
while ($fila = pg_fetch_array($resultado)) {
	
    $usu_id = $fila['usu_id'];
    $usuariobd = $fila['usu_nombre'];
    $usrpassbd = $fila['usu_contrasena'];
    $usrtipobd = $fila['usu_tipo'];
	$cedula = $fila['usu_ced'];
	$pry = $fila['usu_pry'];

    if($id==$usu_id & $password==$usrpassbd & ($usrtipobd=="1" or $usrtipobd == "3") ){// administrador
        $_SESSION['id'] = $usu_id;
        $_SESSION['usuario'] = $usuariobd;
        $_SESSION['tipousuario'] = $usrtipobd;
		$_SESSION['pry'] = $pry;
		$_SESSION['cedula'] = $cedula;
        echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=admin/home.php">
                </head>
            </html>
            ';
    }else if($id==$usu_id & $password==$usrpassbd & $usrtipobd=="4"){
	  $_SESSION['id'] = $usu_id;
      $_SESSION['usuario'] = $usuariobd;
      $_SESSION['tipousuario'] = $usrtipobd;
	  $_SESSION['pry'] = $proyecto;
      $_SESSION['cedula'] = $cedula;      
	  echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=admin/home_almacen.php">
                </head>
            </html>
            ';
		
		
	}else if($id==$usu_id & $password==$usrpassbd & $usrtipobd=="5"){
	  $_SESSION['id'] = $usu_id;
      $_SESSION['usuario'] = $usuariobd;
      $_SESSION['tipousuario'] = $usrtipobd;
	  $_SESSION['pry'] = $pry;
      $_SESSION['cedula'] = $cedula;      
	  echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=admin/home_coordinador.php">
                </head>
            </html>
            ';
		
		
	}else if($id==$usu_id & $password==$usrpassbd & $usrtipobd=="6"){
	  $_SESSION['id'] = $usu_id;
      $_SESSION['usuario'] = $usuariobd;
      $_SESSION['tipousuario'] = $usrtipobd;
	  $_SESSION['pry'] = $proyecto;
      $_SESSION['cedula'] = $cedula;      
	  echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=admin/home_gerente.php">
                </head>
            </html>
            ';
		
		
	}elseif ($id==$usu_id & $password==$usrpassbd & $usrtipobd=="2") {// usuario normal
      $_SESSION['id'] = $usu_id;
      $_SESSION['usuario'] = $usuariobd;
      $_SESSION['tipousuario'] = $usrtipobd;
	  $_SESSION['pry'] = $pry;
	  $_SESSION['cedula'] = $cedula;
        echo'
            <html>
                <head>
                    <meta http-equiv="REFRESH"
                    content="0;url=index.php">
                </head>
            </html>
            ';
    }
	
}
}	

}




pg_close($conexion);

?>
