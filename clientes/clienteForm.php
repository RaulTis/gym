<?php
 session_start();
 require_once('claseclientes.php');
 
 
 //if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$')
 if(!isset($_POST['save']))
		{
      if($_GET['nik']=='nuevo'){
            $id		      = -1;     $nombre		  = ''; $direccion	= '';     $colonia   = '';
    					   $ciudad	   = '';     $telefono		= ''; $observaciones = ''; $tipousu       = 1;
            $email	        = ''; $sexo		        = '';
            $estatus	      = ''; $password         = '';
     }
     else{
       $consulta=new Clientes;
       $resultado=$consulta->editarClientes($_GET['nik']);
     
       foreach($resultado as $row){
         $id		          = $row["cli_id"];            $nombre		= $row["cli_nombre"]; $direccion	= $row["cli_direccion"];
					    $colonia       = $row["cli_colonia"];       $ciudad	 = $row["cli_ciudad"]; $telefono		= $row["cli_telefono"];
         $observaciones = $row["cli_observaciones"]; $tipousu = $row["cli_tipousu"];$email     = $row["cli_email"];
         $sexo		        = $row["cli_sexo"];          $estatus	= $row["cli_estatus"];$password  = $row["cli_clave"];
       }
    }
  }
  else{
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos del Personal</title>

	<!-- Bootstrap -->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style_nav.css" rel="stylesheet">
	<style>
		.content { margin-top: 80px; }
	</style>
</head>
<body>
	<div class="container" style="margin-left:100px;">
		<div class="content"  style="position: relative; top: -50px;">
			<h3>Datos del Cliente</h3>
			<hr />
			<?php
				if(isset($_POST['save'])){
         $id		          = $_POST["cli_id"];
         $nombre		      = $_POST["cli_nombre"];
					    $direccion	    = $_POST["cli_direccion"];
					    $colonia       = $_POST["cli_colonia"];
    					$ciudad	       = $_POST["cli_ciudad"];
					    $telefono		    = $_POST["cli_telefono"];
         $observaciones = $_POST["cli_observaciones"];
         $tipousu       = $_POST["cli_tipousu"];
         $email	        = $_POST["cli_email"];
         $sexo		        = $_POST["cli_sexo"];
         $estatus	      = $_POST["cli_estatus"];
         $password      = $_POST["cli_clave"];
         
    
     $consulta2 =new Clientes;
     $resultado2=$consulta2->modificarClientes($id, $nombre, $direccion, $colonia, $ciudad, $telefono, $observaciones, $tipousu,
                                                 $email, $sexo, $estatus, $password);
     header("Location: clientes.php");
     //ob_end_flush();
				}
    
    if(isset($_POST['saveNuevo'])){
         $nombre		      = $_POST["cli_nombre"];
					    $direccion	    = $_POST["cli_direccion"];
					    $colonia       = $_POST["cli_colonia"];
    					$ciudad	       = $_POST["cli_ciudad"];
					    $telefono		    = $_POST["cli_telefono"];
         $observaciones = $_POST["cli_observaciones"];
         $tipousu       = $_POST["cli_tipousu"];
         $email	        = $_POST["cli_email"];
         $sexo		        =  $_POST["cli_sexo"];
         $estatus	      =  $_POST["cli_estatus"];
         $password      = $_POST["cli_clave"];
		       $consulta2=new Clientes;
         $resultado2=$consulta2->agregarClientes($nombre, $direccion, $colonia, $ciudad, $telefono, $observaciones, $tipousu,
                                                 $email, $sexo, $estatus, $password);
         
         header("Location: clientes.php");
    }
			?>
			<form class="form-horizontal" action="#" method="post">
    <?php
       if($_GET['nik']<>'nuevo'){ ?>
				        <div class="form-group">
						               <input type="hidden" name="cli_id" value="<?php echo $id; ?>" class="form-control" placeholder="ID" hidden>
				        </div>
     <?php
       }
     ?>
         
				<div class="form-group">
        <label class="col-sm-3 control-label">Nombre</label>
					   <div class="col-sm-7">
						     <input type="text" name="cli_nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre" required>
					    </div>
				</div>
    
				<div class="form-group">
					    <label class="col-sm-3 control-label">Direci&oacute;n</label>
					    <div class="col-sm-7">
						     <input type="text" name="cli_direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Dirección" required>
					    </div>
				</div>
        
				<div class="form-group">
					<label class="col-sm-3 control-label">Colonia</label>
					<div class="col-sm-5">
						<input type="text" name="cli_colonia" value="<?php echo $colonia; ?>" class="input-group date form-control"	placeholder="Colonia" required>
					</div>
				</div>
    
				<div class="form-group">
					<label class="col-sm-3 control-label">Ciudad</label>
					<div class="col-sm-5">
						<input type="text" name="cli_ciudad" value="<?php echo $ciudad; ?>" class="input-group date form-control"	placeholder="URL" required>
					</div>
				</div>
    
    <div class="form-group">
					<label class="col-sm-3 control-label">Tel&eacute;fono</label>
					<div class="col-sm-3">
						<input type="text" name="cli_telefono" value="<?php echo $telefono; ?>" class="input-group date form-control"	placeholder="Teléfono" required>
					</div>
				</div>
    
    <div class="form-group">
					<label class="col-sm-3 control-label">Observaci&oacute;n</label>
					<div class="col-sm-5">
      <textarea id="cli_observaciones" name="cli_observaciones" class="form-control md-textarea" rows="2" placeholder="Observación">
         <?php echo $observaciones; ?>
      </textarea>
     </div>
				</div>
    
     <div class="form-group">
					<label class="col-sm-3 control-label">Tipo de Usuario</label>
					<div class="col-sm-3">
					 <?php
          if($tipousu=="1"){
             echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                      <input  type="radio" name="cli_tipousu" value="1" checked> Cliente
                   </label>
                   <label class="btn btn-primary " value="express" style="width:44%">
                      <input type="radio" name="cli_tipousu" value="0">Administrador
                   </label>';
          }
          else
          {
             echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                      <input  type="radio" name="cli_tipousu" value="1"> Cliente
                   </label>
                   <label class="btn btn-primary " value="express" style="width:44%">
                      <input type="radio" name="cli_tipousu" value="0" checked>Administrador
                   </label>';
          } ?>
     </div>
				</div>
     
    <div class="form-group">
				 	<label class="col-sm-3 control-label">Email</label>
					 <div class="col-sm-6">
					   <input type="email" name="cli_email" value="<?php echo $email; ?>" class="input-group date form-control"	placeholder="Email" required>
					 </div>
				</div>
    <div class="form-group" style="margin-left:19%;">
       <div class="input-group col-sm-6">
           <b>Sexo</b>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <?php
             if($sexo=="F"){ 
                     echo '<label class="btn btn-success  active" value="regular"  style="width:35%">
                             <input  type="radio" name="cli_sexo" value="F" checked>Femenino
                           </label>';
                     echo '<label class="btn btn-warning " value="express" style="width:34%">
                            <input type="radio" name="cli_sexo" value="M">Masculino
                         </label>';
             }
             else
             {
                  echo '<label class="btn btn-success  active" value="regular"  style="width:35%">
                             <input  type="radio" name="cli_sexo" value="F">Femenino
                         </label>';
                   echo '<label class="btn btn-warning " value="express" style="width:34%">
                            <input type="radio" name="cli_sexo" value="M" checked>Masculino
                         </label>';
             }
             
             ?>  
       </div>
    </div>
      
    <div class="form-group">
					   <label class="col-sm-3 control-label">Clave</label>
					   <div class="col-sm-3">
						        <input type="password" name="cli_clave" value="<?php echo $password; ?>" class="input-group date form-control"
                     placeholder="URL" required>
					   </div>
				</div>
    
    <div class="form-group" style="margin-left:19%;">
         <div class="input-group col-sm-6">
             <b>Estatus</b>
             &nbsp;&nbsp;&nbsp;&nbsp;
             <?php
             if($estatus=="A"){
                echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                        <input  type="radio" name="cli_estatus" value="A" checked> Activo
                      </label>
                      <label class="btn btn-primary " value="express" style="width:34%">
                        <input type="radio" name="cli_estatus" value="I">Inactivo
                      </label>';
             }
             else
             {
                echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                        <input  type="radio" name="cli_estatus" value="A"> Activo
                      </label>
                      <label class="btn btn-primary " value="express" style="width:34%">
                        <input type="radio" name="cli_estatus" value="I" checked>Inactivo
                      </label>';
             } ?>
         </div>
    </div>
    
    <!-- Forma de Almacenar la Información -->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
      <?php
         if($_GET['nik']<>'nuevo') { ?>
						        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <?php
             }
          else
          {
           ?>
						        <input type="submit" name="saveNuevo" class="btn btn-sm btn-primary" value="Guardar datos">
          <?php
          } ?>
						    <a href="clientes.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
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
