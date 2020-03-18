<?php
 session_start();
 if(!isset($_SESSION['autorizado']) && !$_SESSION['autorizado']=='abcd4567$'){
      header("Location: index.php");    
 }
 
 require_once('cobrosClase.php');
 if(isset($_POST['saveNuevo'])){
           $descripcion= $_SESSION['descripcion'];
           $id		      = $_SESSION['id'];       $fecha	= $_SESSION['fecha'];  $hora	    =$_SESSION['hora'];
           $idCliente = $_SESSION['idCliente']; $cliente=$_SESSION['cliente']; $codigo   = $_SESSION['codigo'];
           $tipo	    	= $_SESSION['tipo'];      $costo = $_SESSION['costo'];
           $cantidad	= $_POST['cob_cantidad'];
         
		       $consulta2=new Cobros;
         $resultado2=$consulta2->agregarCobros($fecha, $hora, $idCliente, $codigo, $tipo, $costo, $cantidad);
         
         header("Location: cobros.php");
    }
 else
 if(isset($_POST['buscarCodigo']))
 {
       $consulta=new Cobros;
       $resultado=$consulta->editarArticulos($_POST['cob_idCodigo']);
      
       foreach($resultado as $row){
           $codigo = $row['art_codigo'];
           $descripcion=$row['art_descripcion'];
           $costo=$row['art_costo'];
           $tipo=$row['art_tipo'];
       }
       if(isset($descripcion)){
          $id= $_SESSION['id'];
          $fecha=$_SESSION['fecha'];
          $hora=$_SESSION['hora'];
          $idCliente=$_SESSION['idCliente'];
          $cliente= $_SESSION['cliente'];
          $_SESSION['codigo']=$codigo;
          $_SESSION['tipo']=$tipo;
          $_SESSION['costo']=$costo;
          $cantidad=$_SESSION['cantidad'];
          $_SESSION['descripcion']=$descripcion;
       }
       else{
         $id= $_SESSION['id'];
         $fecha=$_SESSION['fecha'];
         $hora=$_SESSION['hora'];
         $idCliente=$_SESSION['idCliente'];
         $cliente=$_SESSION['cliente'];
         $codigo=$_SESSION['codigo'];
         $tipo=$_SESSION['tipo'];
         $costo=$_SESSION['costo'];
         $cantidad=$_SESSION['cantidad'];
         $descripcion=$_SESSION['descripcion'];
       }
 }
 else
 if(isset($_POST['buscar']))
 {
       $consulta=new Cobros;
       $resultado=$consulta->editarClientes($_POST['cli_id']);
       foreach($resultado as $row){
           $idCliente=$row['cli_id'];
           $cliente=$row["cli_nombre"];
       }
       $id= $_SESSION['id'];
       $fecha=$_SESSION['fecha'];
       $hora=$_SESSION['hora'];
       $_SESSION['idCliente']=$idCliente;
       $_SESSION['cliente']=$cliente;

       $codigo=$_SESSION['codigo'];
       $tipo=$_SESSION['tipo'];
       $costo=$_SESSION['costo'];
       $cantidad=$_SESSION['cantidad'];
       $descripcion=$_SESSION['descripcion'];
 }
 else if(!isset($_POST['save']))
		{
      if($_GET['nik']=='nuevo'){
            setlocale(LC_TIME,"es_MX");
            $id		      = ''; $fecha	 =strftime("%Y-%m-%d") ;; $hora	   = strftime("%H:%M");
            $idCliente ='';  $cliente=''; $codigo	   = '';
            $tipo		    = ''; $costo  =''; $cantidad= ''; $descripcion='';
            $_SESSION['id']=$id;
            $_SESSION['fecha']=$fecha;
            $_SESSION['hora']=$hora;
            $_SESSION['idCliente']=$idCliente;
            $_SESSION['cliente']=$cliente;
            $_SESSION['codigo']=$codigo;
            $_SESSION['tipo']=$tipo;
            $_SESSION['costo']=$costo;
            $_SESSION['cantidad']=$cantidad;
            $_SESSION['descripcion']=$descripcion;
     }
  }
  else{
       $consulta=new Cobros;
       $resultado=$consulta->editarCobros($_GET['nik']);
     
       foreach($resultado as $row){
         $id		  = $row["cob_id"];            $fecha	= $row["cob_fecha "];  $hora	= $row["cob_hora"];
         $idCliente = $row["cob_idCliente"]; $cliente=$row["cli_nombre "]; $codigo	 = $row["cob_idCodigo"];
         $tipo		= $row["cob_tipo"];          $costo = $row["cob_costo"];   $cantidad	   = $row["cob_cantidad"];
         $descripcion=$row["art_descripcion"];
         
         $_SESSION['id']=$id;
         $_SESSION['fecha']=$fecha;
         $_SESSION['hora']=$hora;
         $_SESSION['idCliente']=$idCliente;
         $_SESSION['cliente']=$cliente;
         $_SESSION['codigo']=$codigo;
         $_SESSION['tipo']=$tipo;
         $_SESSION['costo']=$costo;
         $_SESSION['cantidad']=$cantidad;
         $_SESSION['descripcion']=$descripcion;
       }
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
			<h3>Datos de Cobros</h3>
			<hr />
			<?php
				if(isset($_POST['save'])){
     
           $descripcion= $_SESSION['descripcion'];
           $id		      = $_SESSION['id'];       $fecha	= $_SESSION['fecha'];  $hora	    =$_SESSION['hora'];
           $idCliente = $_SESSION['idCliente']; $cliente=$_SESSION['cliente']; $codigo   = $_SESSION['codigo'];
           $tipo	    	= $_SESSION['tipo'];      $costo = $_SESSION['costo'];  
           $cantidad	= $_POST['cob_cantidad'];
           
           $consulta2 =new Cobros;
           $resultado2=$consulta2->modificarCobros($id, $fecha, $hora, $idCliente, $codigo, $tipo, $costo, $cantidad);
           
        header("Location: cobros.php");
				}
    
    
			?>
   
			<form class="form-horizontal" action="#" method="post">
				<div class="form-group">
        <label class="col-sm-3 control-label">Cliente</label>
					   <div class="col-sm-7">
						     <input type="text" name="cli_id" value="<?php echo $idCliente; ?>" class="form-control" placeholder="ID Cliente" required>
					    </div>
				</div>
    
    <div class="form-group">
					    <label class="col-sm-3 control-label">Nombre</label>
					    <div class="col-sm-7">
						     <input type="text" name="cli_nombre" value="<?php echo $cliente; ?>" class="form-control" placeholder="Cliente" disabled>
					    </div>
				</div>
    <div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						   <input type="submit" name="buscar" class="btn btn-sm btn-primary" value="Buscar Cliente">
					</div
    </div>
   </form>
  </div>
  </div>
  
 	<div class="container" style="margin-top:-7%; margin-left:-20px;">
	 	<div class="content"  style="position: relative; top: -50px;">
    <form class="form-horizontal" action="#" method="post">
				  <div class="form-group">
					    <label class="col-sm-3 control-label">Codigo</label>
					    <div class="col-sm-5">
						      <input type="text" name="cob_idCodigo" value="<?php echo $codigo; ?>" class="input-group date form-control"	placeholder="Codigo">
					    </div>
				  </div>
    
     <div class="form-group">
					  <label class="col-sm-3 control-label">Descripci&oacute;n</label>
					    <div class="col-sm-5">
						     <input type="text" name="art_descripcion" value="<?php echo $descripcion; ?>"
               class="input-group date form-control"	placeholder="Descripcion" disabled>
					    </div>
				 </div>
    
    <div class="form-group">
					<label class="col-sm-3 control-label">Tipo</label>
					<div class="col-sm-5">
						<input type="text" name="art_tipo" value="<?php echo $tipo; ?>" class="input-group date form-control"	placeholder="Tipo" disable>
					</div>
    </div>
    
     <div class="form-group">
					<label class="col-sm-3 control-label">Costo</label>
					<div class="col-sm-5">
						<input type="text" name="art_costo" value="<?php echo $costo; ?>" class="input-group date form-control"	placeholder="Costo" disable>
					</div>
     </div>

      <div class="form-group">
					   <label class="col-sm-3 control-label">&nbsp;</label>
					    <div class="col-sm-6">
						      <input type="submit" name="buscarCodigo" class="btn btn-sm btn-primary" value="Buscar Codigo">
					    </div
      </div>
    </form>
   </div>
   </div>

	<div class="container" style="margin-top:-7%; margin-left:-20px;">
	 	<div class="content"  style="position: relative; top: -50px;">
    <form class="form-horizontal" action="#" method="post">
     
     <div class="form-group">
					<label class="col-sm-3 control-label">Cantidad</label>
					<div class="col-sm-5">
						<input type="text" name="cob_cantidad" value="<?php echo $cantidad; ?>" class="input-group date form-control"	placeholder="Cantidad">
					</div>
     </div>
         
    <!-- Forma de Almacenar la Información -->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
      <?php
         if($_GET['nik']<>'nuevo') { ?>
						        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Registrar Cobro">
          <?php
             }
          else
          {
           ?>
						        <input type="submit" name="saveNuevo" class="btn btn-sm btn-primary" value="Registar datos">
          <?php
          } ?>
						    <a href="cobros.php" class="btn btn-sm btn-danger">Cancelar</a>
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
