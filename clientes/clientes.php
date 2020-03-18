<?php
  session_start();
   if(!isset($_SESSION['autorizado']) && !$_SESSION['autorizado']=='abcd4567$')
   {
      header("Location: index.php");    
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Cliente(s)</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/escudo.ico">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
		<?php
  if(isset($_SESSION['autorizado']) && $_SESSION['autorizado']=='abcd4567$')
		{
		?>
		<div>
			   <center><h1>Registro de Cliente(s)</h1></center>
		</div>
<header>    
    <div class="container">
         <?php
						require_once('claseclientes.php');
						$consulta=new Clientes;
            if(isset($_GET['aksi']) == 'delete'){
                $query2=$consulta->borrarCliente($_GET["nik"]);
            }
						$query1=$consulta->listarClientes();
          ?>
          <br />
          <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
              <thead>
                 <tr>
									<td></td>
                  <td>ID</td>
									<td>Nombre</td>
									<td>Sexo</td>
                  <td>Direccion</td>
                  <td>Colonia</td>
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
                      <td width="10">'.$row["cli_id"].'</td>
											<td width="100">'.$row["cli_nombre"].'</td>
											<td width="10">'.$row["cli_sexo"].'</td>
                      <td width="150">'.$row["cli_direccion"].'</td>
                      <td width="150">'.$row["cli_colonia"].'</td>
                      <td width="150">'.$row["cli_estatus"].'</td>
                       <td><a href="clienteForm.php?nik='.$row['cli_id'].'" title="Editar datos"
                               class="btn btn-primary btn-sm">
                               <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="clientes.php?aksi=delete&nik='.$row['cli_id'].'" title="Eliminar"
                               onclick="return confirm(\'Esta seguro de borrar los datos '.$row['cli_nombre'].'?\')"
                               class="btn btn-primary"><span class="glyphicon glyphicon-trash"
                               aria-hidden="true"></span>
                            </a>
                          </td>
                        </tr>';
              }
                       ?>
               <tr>
                  <a href="clienteForm.php?nik=nuevo">
                  <button class="btn btn-sm btn-success">
                       Agregar Cliente  
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