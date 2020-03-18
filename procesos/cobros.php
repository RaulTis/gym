<?php
  session_start();
   if(!isset($_SESSION['autorizado']) && !$_SESSION['autorizado']=='abcd4567$')
   {
      header("Location: ../index.php");    
   }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Registro de Articulos</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/escudo.ico">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
		<?php
    if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$')
		{
		?>
		<div>
			   <center><h1>Registro de Cobros</h1></center>
		</div>
<header>    
    <div class="container">
         <?php
						require_once('cobrosClase.php');
						$consulta=new Cobros;
            if(isset($_GET['aksi']) == 'delete'){
                $query2=$consulta->borrarCobros($_GET["nik"]);
            }
						$query1=$consulta->listarCobros();
          ?>
          <br />
          <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
              <thead>
                 <tr>
									<td></td>
                  <td>ID</td>
									<td>Fecha</td>
                  <td>Nombre</td>
                  <td>Descripci&oacute;n</td>
                  <td>Tipo</td>
                  <td>Cantidad</td>
                  <td>Opcion</td>
                </tr>
              </thead>
              <?php
							foreach($query1 as $row)
              {
                echo '
                   <tr>
										  <td width="50"><span class="glyphicon glyphicon-user btn-primary btn-sm"></span></td>
                      <td width="10">'.$row["cob_id"].'</td>
											<td width="100">'.$row["cob_fecha"].'</td>
                      <td width="150">'.$row["cli_nombre"].'</td>
                      <td width="150">'.$row["art_descripcion"].'</td>
                      <td width="150">'.$row["cob_tipo"].'</td>
                      <td width="150">'.$row["cob_cantidad"].'</td>
                      
                       <td>
                            <a href="cobros.php?aksi=delete&nik='.$row['cob_id'].'" title="Eliminar"
                               onclick="return confirm(\'Esta seguro de borrar los datos '.$row['cli_nombre'].'?\')"
                               class="btn btn-primary"><span class="glyphicon glyphicon-trash"
                               aria-hidden="true"></span>
                            </a>
                          </td>
                        </tr>';
              }
              
                       ?>
             
              <!--a href="cobrosForm.php?nik='.$row['cob_id'].'" title="Editar datos"
                               class="btn btn-primary btn-sm">
                               <span class="glyphicon glyphicon-edit"></span>
                            </a-->
             
             
               <tr>
                  <a href="cobrosForm.php?nik=nuevo">
                  <button class="btn btn-sm btn-success">
                       Agregar Cobro  
									</button>
                  </a>
                  
                  <a href="../formMenu.php">
                  <button class="btn btn-sm btn-outline-primary">
                        Regresar Menu
									</button>
                  </a>
                </tr>
             </table>
          </div>
    </div>
	</header>
<?php
  }
  else
     echo "<br /><br /><br /><br /><h1>Usuario No Permitido";
?>
</body>
</html>