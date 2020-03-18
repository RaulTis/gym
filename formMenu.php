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
    <title>Sistema de Gimnasio</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
    
<body>
 <div id="header">
			<ul class="nav">
				<li><a href="">Inicio</a></li>
				<li><a href="">Catalogos</a>
					<ul>
						<li><a href="clientes/clientes.php">Clientes</a></li>
						<li><a href="articulos/articulos.php">Articulos</a></li>
					</ul>
				</li>
				<li><a href="">Procesos</a>
					<ul>
						<li><a href="procesos/cobros.php">Registro de Cobro</a></li>
					</ul>
				</li>
    
				<li><a href="">Reportes</a>
    					<ul>
				      		<li><a href="">Registro de Entradas de Cliente</a></li>
            <li><a href="">Registro de Cobro</a></li>
					    </ul>
    </li>
    <li><a href="salir.php">Salir</a>
    </li>
			</ul>
		</div>
 
  <center>
     <img src="img/gym.jpg" width="65%"  height="60%" />
  </center>
  
</body>



</html>