<?php
 session_start();
 require_once('articulosClase.php');
 
 //if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$')
 if(!isset($_POST['save']))
		{
      if($_GET['nik']=='nuevo'){
            $id		      = -1;     $codigo		  = ''; $descripcion	= '';
            $costo   = '';       $tipo	   = '';   $estatus		= '';
     }
     else{
       $consulta=new Articulos;
       $resultado=$consulta->editarArticulos($_GET['nik']);
     
       foreach($resultado as $row){
         $id		  = $row["art_id"];    $codigo	 = $row["art_codigo"]; $descripcion	= $row["art_descripcion"];
         $costo = $row["art_costo"]; $tipo	   = $row["art_tipo"];   $estatus		= $row["art_estatus"];
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
			<h3>Datos del Articulo</h3>
			<hr />
			<?php
				if(isset($_POST['save'])){
           $id		  = $_POST["art_id"];    $codigo	 = $_POST["art_codigo"]; $descripcion	= $_POST["art_descripcion"];
           $costo = $_POST["art_costo"]; $tipo	   = $_POST["art_tipo"];   $estatus		= $_POST["art_estatus"];
           $consulta2 =new Articulos;
           $resultado2=$consulta2->modificarArticulos($id, $codigo, $descripcion, $costo, $tipo, $estatus);
        header("Location: articulos.php");
				}
    
    if(isset($_POST['saveNuevo'])){
         $codigo	 = $_POST["art_codigo"]; $descripcion	= $_POST["art_descripcion"];
         $costo = $_POST["art_costo"]; $tipo	   = $_POST["art_tipo"];   $estatus		= $_POST["art_estatus"];
		       $consulta2=new Articulos;
         $resultado2=$consulta2->agregarArticulos($codigo, $descripcion, $costo, $tipo, $estatus);
         
         header("Location: articulos.php");
    }
			?>
			<form class="form-horizontal" action="#" method="post">
    <?php
       if($_GET['nik']<>'nuevo'){ ?>
				        <div class="form-group">
						               <input type="hidden" name="art_id" value="<?php echo $id; ?>" class="form-control" placeholder="ID" hidden>
				        </div>
     <?php
       }
     ?>
         
				<div class="form-group">
        <label class="col-sm-3 control-label">Codigo</label>
					   <div class="col-sm-7">
						     <input type="text" name="art_codigo" value="<?php echo $codigo; ?>" class="form-control" placeholder="Codigo" required>
					    </div>
				</div>
    
				<div class="form-group">
					    <label class="col-sm-3 control-label">Descripcion</label>
					    <div class="col-sm-7">
						     <input type="text" name="art_descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Descripcion" required>
					    </div>
				</div>
        
				<div class="form-group">
					<label class="col-sm-3 control-label">Costo</label>
					<div class="col-sm-5">
						<input type="text" name="art_costo" value="<?php echo $costo; ?>" class="input-group date form-control"	placeholder="Costo" required>
					</div>
				</div>
    
    <div class="form-group">
					<label class="col-sm-3 control-label">Tipo de Pago</label>&nbsp;&nbsp;&nbsp;
     <?php
       if($tipo=='Semana'){
          echo '<label class="btn btn-primary  active" value="regular"  style="width:15%">
                     <input  type="radio" name="art_tipo" value="Semana" checked>Semana
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                    <input type="radio" name="art_tipo" value="Quincena">Quincena
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                     <input type="radio" name="art_tipo" value="Mes">Mes
                 </label>';
       }
       else  if($tipo=='Quincena'){
          echo '<label class="btn btn-primary  active" value="regular"  style="width:15%">
                     <input  type="radio" name="art_tipo" value="Semana">Semana
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                    <input type="radio" name="art_tipo" value="Quincena" Checked>Quincena
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                     <input type="radio" name="art_tipo" value="Mes">Mes
                 </label>';
       } else {
          echo '<label class="btn btn-primary  active" value="regular"  style="width:15%">
                     <input  type="radio" name="art_tipo" value="Semana">Semana
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                    <input type="radio" name="art_tipo" value="Quincena">Quincena
                 </label>
                 <label class="btn btn-primary " value="express" style="width:14%">
                     <input type="radio" name="art_tipo" value="Mes" checked>Mes
                 </label>';
       } ?>
				</div>
    
    <div class="form-group" style="margin-left:19%;">
         <div class="input-group col-sm-6">
             <b>Estatus</b>
             &nbsp;&nbsp;&nbsp;&nbsp;
             <?php
             if($estatus=="I"){
                echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                        <input  type="radio" name="art_estatus" value="A"> Activo
                      </label>
                      <label class="btn btn-primary " value="express" style="width:34%">
                        <input type="radio" name="art_estatus" value="I" checked>Inactivo
                      </label>';
             }
             else
             {
                echo '<label class="btn btn-primary  active" value="regular"  style="width:35%">
                        <input  type="radio" name="art_estatus" value="A" checked> Activo
                      </label>
                      <label class="btn btn-primary " value="express" style="width:34%">
                        <input type="radio" name="art_estatus" value="I" >Inactivo
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
						    <a href="articulos.php" class="btn btn-sm btn-danger">Cancelar</a>
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
