<?php
ob_start();
   session_start();
   require_once('claseUsuario.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos del Personal</title>

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content { margin-top: 80px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="content"  style="position: relative; top: -50px;">
			<h3>Transmicion de Radio</h3>
			<hr />
			<?php
				     if(isset($_POST['save'])){
                    $nombre = $_POST["usu_usuario"];
				       $contrasena = $_POST["usu_clave"];
    
              $usuarios=new Usuarios;
              $resultado2=$usuarios->agregarUsuario($nombre, sha1($contrasena));
              if($resultado2['exito']=='si')
              {
                   header("Location:index.php");
                   ob_end_flush();
				  }
                 }
			?>
			<form class="form-horizontal" action="#" method="post">
				<div class="form-group">
        <label class="col-sm-3 control-label">Usuario</label>
					   <div class="col-sm-4">
						     <input type="text" name="usu_usuario" value="" class="form-control" placeholder="Nombre de Usuario" required>
					    </div>
				</div>
				<div class="form-group">
					  <label class="col-sm-3 control-label">Contraseña</label>
					    <div class="col-sm-4">
						     <input type="password" name="usu_clave" value="" class="form-control" placeholder="Contrseña" required>
					    </div>
				</div>
        
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						   <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
     				<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
            </div>
               <?php
                  if(isset($resultado2)) 
                     if($resultado2['exito']=='no'){ ?>
                        <br />
                        <center>
                        <span class="btn btn-sm btn-danger">
                          El Usuario ya esta registrado
                        </span>
                        </center>
                      <?php
                     }
               ?>
				
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
	function seleccionar() {
	    $("#selectdep option[value='1']").attr("selected", true);
	}
	</script>
</body>
</html>
