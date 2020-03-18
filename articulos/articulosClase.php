<?php
require_once('../claseconectar.php');
class Articulos extends Conectar{
    private $db;
    public function __construct(){
    $this->db=parent::conectar();
    }

public function listarArticulos(){
        $query='call  spListarArticulos()';
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
    }//Fin de Public Function
    
	#funcion de eliminar
public function borrarArticulos($borrar)
     {   
        $borrar=htmlspecialchars($borrar);
        $query="DELETE FROM articulos WHERE art_id=$borrar";        
        $datos=$this->db->execute($query);
        $Arreglo=array();
        $Arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
        return  $Arreglo;
    }//fin de la funcion eliminar
	
  public function editarArticulos($edicion)
  {
        $edicion=htmlspecialchars($edicion);
        $query="SELECT * FROM articulos WHERE  art_id=$edicion";
        $datos=$this->db->execute($query);
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
    
public function modificarArticulos($id,$codigo, $descripcion, $costo, $tipo, $estatus)
     {
       $codigo=htmlspecialchars($codigo);     $descripcion=htmlspecialchars($descripcion);
        $costo=htmlspecialchars($costo);    $tipo=trim(htmlspecialchars($tipo));
        $estatus=htmlspecialchars($estatus);  
        $query="UPDATE articulos SET
                            art_codigo='$codigo', art_descripcion='$descripcion', 
                            art_costo=$costo,  art_tipo='$tipo',  art_estatus='$estatus'
                            WHERE art_id=$id";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
    		return  $arreglo;   
    }//fin de la funcion modificar
	
public function agregarArticulos($codigo, $descripcion, $costo, $tipo, $estatus)
     {
        $codigo=htmlspecialchars($codigo);     $descripcion=htmlspecialchars($descripcion);
        $costo=htmlspecialchars($costo);    $tipo=trim(htmlspecialchars($tipo));
        $estatus=htmlspecialchars($estatus);
        
        $query="insert into articulos (art_codigo, art_descripcion, art_costo, art_tipo, art_estatus) values ".
                   "('$codigo', '$descripcion', '$costo', '$tipo', '$estatus')";
        $datos=$this->db->execute($query);
        $arreglo=array();
        $arreglo=($datos)?array ('exito'=>true):array('exito'=>false);
		  return  $arreglo;   
    } //fin de la funcion modificar

}
?>