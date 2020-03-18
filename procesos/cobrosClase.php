<?php
require_once('../claseconectar.php');
class Cobros extends Conectar{
    private $db;
    public function __construct(){
    $this->db=parent::conectar();
    }

public function listarCobros(){
        $query='call spListarCobros()';
        $datos=$this->db->execute($query);
        $arreglo=array();
        while(!$datos->EOF)
        {
            $arreglo[]=array('cob_id'=>$datos->fields('cob_id'),
                             'cob_fecha'=>$datos->fields('cob_fecha'),
                             'cob_hora'=>$datos->fields('cob_hora'),
                             'cob_idCliente'=>$datos->fields('cob_idCliente'),
                             'cob_idCodigo'=>$datos->fields('cob_idCodigo'),
                             'cob_tipo'=>$datos->fields('cob_tipo'),
                             'cob_costo'=>$datos->fields('cob_costo'),
                             'cob_cantidad'=>$datos->fields('cob_cantidad'),
                             'cli_nombre'=>$datos->fields('cli_nombre'),
                             'art_descripcion'=>$datos->fields('art_descripcion')
                             
						);
            $datos->MoveNext();
        }//fin de while
        return $arreglo;
    }//Fin de Public Function
    
	#funcion de eliminar
public function borrarCobros($borrar)
     {   
        $borrar=htmlspecialchars($borrar);
        $query="DELETE FROM cobros WHERE cob_id=$borrar";        
        $datos=$this->db->execute($query);
        $Arreglo=array();
        $Arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
        return  $Arreglo;
    }//fin de la funcion eliminar

  
  
  public function editarCobros($edicion)
  {
        $edicion=htmlspecialchars($edicion);
        $query="SELECT * FROM cobros inner join clientes on cli_id=cob_idCliente
                      inner join articulos on art_codigo=cob_idCodigo WHERE  cob_id=$edicion";
        $datos=$this->db->execute($query);
        while(!$datos->EOF)
        {
            $arreglo[]=array('cob_id'=>$datos->fields('cob_id'),
                             'cob_fecha'=>$datos->fields('cob_fecha'),
                             'cob_hora'=>$datos->fields('cob_hora'),
                             'cob_idCliente'=>$datos->fields('cob_idCliente'),
                             'cli_nombre'=>$datos->fields('cli_nombre'),
                             'cob_idCodigo'=>$datos->fields('cob_idCodigo'),
                             'cob_tipo'=>$datos->fields('cob_tipo'),
                             'cob_costo'=>$datos->fields('cob_costo'),
                             'cob_cantidad'=>$datos->fields('cob_cantidad'),
                             'art_descripcion'=>$datos->fields('art_descripcion')
									 );
            $datos->MoveNext();
        }//fin de while
        return $arreglo;
  } 
    
public function modificarCobros($id, $fecha, $hora, $idCliente, $codigo, $tipo, $costo, $cantidad)
     {
        $id=htmlspecialchars($id);            $fecha=htmlspecialchars($fecha);
        $hora=htmlspecialchars($hora);        $idCliente=trim(htmlspecialchars($idCliente));
        $codigo=htmlspecialchars($codigo);    $tipo=htmlspecialchars($tipo);
        $costo=htmlspecialchars($costo);      $cantidad=htmlspecialchars($cantidad);
        $query="UPDATE cobros SET cob_fecha   ='$fecha',  cob_hora='$hora',  cob_idCliente=$idCliente,
                                  cob_idCodigo= $codigo,  cob_tipo= '$tipo', cob_costo= $costo,
                                  cob_cantidad= $cantidad WHERE cob_id=$id";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
    		return  $arreglo;   
    }//fin de la funcion modificar
	
public function agregarCobros($fecha, $hora, $idCliente, $codigo, $tipo, $costo, $cantidad)
     {
        $fecha=htmlspecialchars($fecha);      $hora=htmlspecialchars($hora); $idCliente=trim(htmlspecialchars($idCliente));
        $codigo=htmlspecialchars($codigo);    $tipo=htmlspecialchars($tipo); $costo=htmlspecialchars($costo);
        $cantidad=htmlspecialchars($cantidad);
        
        echo $query="insert into cobros (cob_fecha, cob_hora, cob_idCliente, cob_idCodigo ,cob_tipo, cob_costo, cob_cantidad) values ".
                   "(date('$fecha'), '$hora', $idCliente, $codigo , '$tipo', $costo, $cantidad)";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
		  return  $arreglo;   
    } //fin de la funcion modificar

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
  
  
  public function editarArticulos($edicion)
  {
        $edicion=htmlspecialchars($edicion);
        $query="SELECT * FROM articulos WHERE  art_codigo='$edicion'";
        $datos=$this->db->execute($query);
        $arreglo=array();
        while(!$datos->EOF)
        {
            $arreglo[]=array('art_id'=>$datos->fields('art_id'),
                             'art_codigo'=>$datos->fields('art_codigo'),
                             'art_descripcion'=>$datos->fields('art_descripcion'),
                             'art_costo'=>$datos->fields('art_costo'),
                             'art_tipo'=>$datos->fields('art_tipo'),
                             'art_estatus'=>$datos->fields('art_estatus')
									 );
            $datos->MoveNext();
        }//fin de while
          
        return $arreglo;
  } 
}
?>