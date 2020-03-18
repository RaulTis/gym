<?php
  session_start();
   if(!isset($_SESSION['autorizado']) && !$_SESSION['autorizado']=='abcd4567$'){
      header("Location: index.php");    
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/escudo.ico">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	   <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
   	<link rel="stylesheet" href="css/estilos.css">
	   <title>Registro de Radio Frecuencias</title>
    
</head>

<body>
		<?php
  if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$')
		{
		?>
		<div>
			   <center><h1>Transmisiones de Radio</h1></center>
		</div>
<header>    
    <div class="container">
         <?php
						require_once('claseReproductor.php');
						$reproductor=new Reproductor;
            if(isset($_GET['aksi']) == 'delete'){
                $query2=$reproductor->borrarReproductor($_GET["nik"]);
            }
						$query1=$reproductor->listarReproductor();
          ?>
          <br />
          <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
              <thead>
                 <tr>
									<td></td>
                  <td>ID</td>
									<td>Fecha</td>
									<td>Hora</td>
                  <td>Usuario</td>
                  <td>Titulo</td>
                  <td>URL</td>
                  <td>Opcion</td>
                </tr>
              </thead>
              <?php
							foreach($query1 as $row)
              {
                echo '
                   <tr>
										  <td width="50"><span class="glyphicon glyphicon-user btn-primary btn-sm"></span></td>
                      <td width="10">'.$row["rep_id"].'</td>
											<td width="100">'.$row["rep_fecha"].'</td>
											<td width="10">'.$row["rep_hora"].'</td>
                      <td width="150">'.$row["usu_usuario"].'</td>
                      <td width="150">'.$row["rep_titulo"].'</td>
                      <td width="150">
											    <a href="'.$row["rep_url"].'">
													 <button class="btn btn-sm">
													    <img src="img/radio.jpg" width="50"/>
													 </button>
													</a>
											 </td>
                       <td><a href="reproductorForm.php?nik='.$row['rep_id'].'" title="Editar datos"
                               class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit">
															</span>
                            </a>
                            <a href="formInicio.php?aksi=delete&nik='.$row['rep_id'].'" title="Eliminar"
                               onclick="return confirm(\'Esta seguro de borrar los datos '.$row['rep_titulo'].'?\')"
                               class="btn btn-primary"><span class="glyphicon glyphicon-trash"
                               aria-hidden="true"></span>
                            </a>
                          </td>
                        </tr>';
              }
                       ?>
               <tr>
                  <a href="reproductorForm.php?nik=nuevo">
                  <button class="btn btn-sm btn-success">
                       Agregar Transmisi&oacute;n  
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