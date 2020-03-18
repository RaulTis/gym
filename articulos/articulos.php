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
			   <center><h1>Registro Art&iacute;culos</h1></center>
		</div>
<header>    
    <div class="container">
         <?php
						require_once('articulosClase.php');
						$consulta=new Articulos;
            if(isset($_GET['aksi']) == 'delete'){
                $query2=$consulta->borrarArticulos($_GET["nik"]);
            }
						$query1=$consulta->listarArticulos();
          ?>
          <br />
          <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
              <thead>
                 <tr>
									<td></td>
                  <td>ID</td>
									<td>C&oacute;digo</td>
									<td>Descripci&oacute;n</td>
                  <td>Costo</td>
                  <td>Tipo</td>
                  <td>Estatus</td>
                  <td>Opcion</td>
                </tr>
              </thead>
              <?php
							foreach($query1 as $row)
              {
                echo '
                   <tr>
										  <td width="50"><span class="glyphicon glyphicon-user btn-primary btn-sm"></span></td>
                      <td width="10">'.$row["art_id"].'</td>
											<td width="100">'.$row["art_codigo"].'</td>
											<td width="10">'.$row["art_descripcion"].'</td>
                      <td width="150">'.$row["art_costo"].'</td>
                      <td width="150">'.$row["art_tipo"].'</td>
                      <td width="150">'.$row["art_estatus"].'</td>
                       <td><a href="articulosForm.php?nik='.$row['art_id'].'" title="Editar datos"
                               class="btn btn-primary btn-sm">
                               <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="articulos.php?aksi=delete&nik='.$row['art_id'].'" title="Eliminar"
                               onclick="return confirm(\'Esta seguro de borrar los datos '.$row['art_descripcion'].'?\')"
                               class="btn btn-primary"><span class="glyphicon glyphicon-trash"
                               aria-hidden="true"></span>
                            </a>
                          </td>
                        </tr>';
              }
                       ?>
               <tr>
                  <a href="articulosForm.php?nik=nuevo">
                  <button class="btn btn-sm btn-success">
                       Agregar Articulos  
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