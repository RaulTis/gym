<?php
require_once('../claseconectar.php');
class Clientes extends Conectar{
    private $db;
    public function __construct(){
    $this->db=parent::conectar();
    }

public function listarClientes(){
        $query='call spListarClientes()';
        $datos=$this->db->execute($query);
        $arreglo=array();
        while(!$datos->EOF)
        {
            $arreglo[]=array('cli_id'=>$datos->fields('cli_id'),
                                     'cli_nombre'=>$datos->fields('cli_nombre'),
                                     'cli_sexo'=>$datos->fields('cli_sexo'),
                                     'cli_direccion'=>$datos->fields('cli_direccion'),
                                     'cli_colonia'=>$datos->fields('cli_colonia'),
                                     'cli_estatus'=>$datos->fields('cli_estatus')
									 );
            $datos->MoveNext();
        }//fin de while
        return $arreglo;
    }//Fin de Public Function
    
	#funcion de eliminar
public function borrarCliente($borrar)
     {   
        $borrar=htmlspecialchars($borrar);
        $query="DELETE FROM clientes WHERE cli_id=$borrar";        
        $datos=$this->db->execute($query);
        $Arreglo=array();
        $Arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
        return  $Arreglo;
    }//fin de la funcion eliminar
	
  public function editarClientes($edicion)
  {
        $edicion=htmlspecialchars($edicion);
        $query="SELECT * FROM clientes WHERE  cli_id=$edicion";
        $datos=$this->db->execute($query);
        while(!$datos->EOF)
        {
            $arreglo[]=array('cli_id'=>$datos->fields('cli_id'),
                             'cli_nombre'=>$datos->fields('cli_nombre'),
                             'cli_direccion'=>$datos->fields('cli_direccion'),
                             'cli_colonia'=>$datos->fields('cli_colonia'),
                             'cli_ciudad'=>$datos->fields('cli_ciudad'),
                             'cli_telefono'=>$datos->fields('cli_telefono'),
                             'cli_observaciones'=>$datos->fields('cli_observaciones'),
                             'cli_tipousu'=>$datos->fields('cli_tipousu'),
                             'cli_sexo'=>$datos->fields('cli_sexo'),
                             'cli_estatus'=>$datos->fields('cli_estatus'),
                             'cli_clave'=>$datos->fields('cli_clave'),
                             'cli_email'=>$datos->fields('cli_email')
									 );
            $datos->MoveNext();
        }//fin de while
        
        return $arreglo;
  } 
    
public function modificarClientes($id, $nombre, $direccion, $colonia, $ciudad, $telefono, $observaciones, $tipousu,
                                                 $email, $sexo, $estatus, $password)
     {
        $nombre=htmlspecialchars($nombre);    $direccion=htmlspecialchars($direccion);  $colonia=htmlspecialchars($colonia);
        $ciudad=htmlspecialchars($ciudad);    $telefono=htmlspecialchars($telefono);
        $observaciones=trim(htmlspecialchars($observaciones));
        $tipousu=htmlspecialchars($tipousu);  $email=htmlspecialchars($email);          $sexo=htmlspecialchars($sexo);
        $estatus=htmlspecialchars($estatus);  $password=htmlspecialchars($password);
        $query="UPDATE clientes SET
                            cli_nombre='$nombre', cli_direccion='$direccion', cli_colonia='$colonia',
                            cli_ciudad='$ciudad',  cli_telefono='$telefono',  cli_observaciones='$observaciones',
                            cli_tipousu=$tipousu,  cli_email='$email',  cli_sexo='$sexo',
                            cli_estatus='$estatus',  cli_clave='$password'
                            WHERE cli_id=$id";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
    		return  $arreglo;   
    }//fin de la funcion modificar
	
public function agregarClientes($nombre, $direccion, $colonia, $ciudad, $telefono, $observaciones, $tipousu,
                                                 $email, $sexo, $estatus, $password)
     {
        $nombre=htmlspecialchars($nombre);     $direccion=htmlspecialchars($direccion);    $colonia=htmlspecialchars($colonia);
        $ciudad=htmlspecialchars($ciudad);     $telefono=htmlspecialchars($telefono);
        $observaciones=trim(htmlspecialchars($observaciones));
        $tipousu=htmlspecialchars($tipousu);   $email=htmlspecialchars($email);            $sexo=htmlspecialchars($sexo);
        $estatus=htmlspecialchars($estatus);   $password=htmlspecialchars($password);
        
        $query="insert into clientes (cli_nombre, cli_direccion, cli_colonia, cli_ciudad, cli_telefono, cli_observaciones, ".
               "cli_tipousu, cli_email, cli_sexo, cli_estatus, cli_clave) values ".
               "('$nombre', '$direccion', '$colonia', '$ciudad', '$telefono', '$observaciones',".
               "$tipousu, '$email', '$sexo', '$estatus', '$password')";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
		  return  $arreglo;   
    } //fin de la funcion modificar

}
?>