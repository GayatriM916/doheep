<!----------------------------------->
<!--Creado por Ana Milena Arroyave;-->
<!----------------------------------->
<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#Logo {
	position: absolute;
	width: 148px;
	height: 80px;
	z-index: 1;
	left: 152px;
	top: 0px;
}
#apDiv1 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
	left: 150px;
	top: 10px;
}
#loguito {
	position: absolute;
	width: 148px;
	height: 93px;
	z-index: 1;
	left: 0px;
	top: 3px;
}
#apDiv2 {
	position: absolute;
	width: 148px;
	height: 93px;
	z-index: 1;
	left: 150px;
	top: 1px;
}
body {
	
}
#imagencabezera {
	position: absolute;
	width: 1062px;
	height: 290px;
	z-index: 2;
	left: 150px;
	top: 92px;
}
#contenido {
	position: absolute;
	width: 1000px;
	height: 412px;
	z-index: 3;
	left: 162px;
	top: 405px;
	background-color: #CCCCCC;
}
#Mascota {
	position: absolute;
	width: 175px;
	height: 325px;
	z-index: 1;
	left: 827px;
	top: 86px;
}
#apDiv3 {
	position: absolute;
	width: 1092px;
	height: 395px;
	z-index: 1;
	left: 43px;
	top: 6px;
	background-color: #FFFFFF;
}
#contenidoextra {
	position: absolute;
	width: 1000px;
	height: 320px;
	z-index: 4;
	left: 162px;
	top: 1069px;
	background-color: #999999;
}
#Titulo {
	position: absolute;
	width: 824px;
	height: 5px;
	z-index: 5;
	left: 263px;
	top: 0px;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 25px;
	text-align: center;
}
</style>


<!--Scripts-->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!--<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>-->
<div id="logo">
</head>
<body>

<div id="Logo"><img src="bootstrap/imágenes/Sin-título-1.png"></div><div id="Titulo">
  <p>&nbsp;</p>
  <p>DOHEPP</p>
</div>
<div id="imagencabezera"><img src="bootstrap/imágenes/imágenes/Captura.png">

</div>
<div id="contenido">
<div class="">
<div class="row-fluid">
		<div class="span9">
			<div class="modal-body">
				<div class="well">
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="login">
              <form class="form-horizontal" action='login.php' method="POST">
                <fieldset>
                  <div id="legend">
                    <legend class="">INGRESAR AL SISTEMA</legend>
                  </div>
                  <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="idcard">Usuario</label>
                    <div class="controls">
                      <input type="text" id="idcard" name="idcard" placeholder="" class="input-large" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="contrasena">Contraseña</label>
                    <div class="controls">
                      <input type="password" id="contrasena" name="contrasena" placeholder="" class="input-large" required>
                    </div>
                  </div>
				  <?php
				  $string_con = "host = 'localhost' port= '5432' dbname = 'elementos' user = 'postgres' password = 'admin'";
                  $conexion = pg_connect($string_con) or die('Error en la conexion');
				  $resulpry = pg_query("SELECT proyecto FROM t_proyectos");
				  $procmb = "";
				   if (pg_num_rows($resulpry) > 0){
                		 while($fila = pg_fetch_assoc($resulpry)){
                              $procmb = $procmb."<option>".$fila['proyecto']."</option>";
                			 }
                	  }else{
                			   $procmb += "<option>Error!</option>";
                	  }
                	  pg_close($conexion);
					  echo '<div class="control-group">
							<label class="control-label" for="pry">Proyecto</label>
							<div class="controls">
								<select id="pry" name="pry" class="input-large">'
							      .$procmb.
							  	'</select>
							</div>
							</div>'
				  ?>
				  
                  <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                      <button class="btn btn-primary ">Ingresar</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div id="Mascota"><img src="bootstrap/imágenes/imágenes/Chiqui.png"></div>
</div>


</body>
</html>
