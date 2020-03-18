<?php
require_once('claseConectar.php');
class Reproductor extends Conectar{
    private $db;
    public function __construct(){
    $this->db=parent::conectar();
    }

public function listarReproductor(){
        $query='call spListarReproductor()';
        $datos=$this->db->execute($query);
        $arregloUsuarios=array();
        while(!$datos->EOF)
        {
            $arregloUsuarios[]=array('rep_id'=>$datos->fields('rep_id'),
                                     'rep_fecha'=>$datos->fields('rep_fecha'),
                                     'rep_hora'=>$datos->fields('rep_hora'),
                                     'rep_idUsuario'=>$datos->fields('rep_idUsuario'),
                                     'usu_usuario'=>$datos->fields('usu_usuario'),
                                     'rep_titulo'=>$datos->fields('rep_titulo'),
                                     'rep_url'=>$datos->fields('rep_url')
									 );
            $datos->MoveNext();
        }//fin de while
        return $arregloUsuarios;
    }//Fin de Public Function     


  public function editarReproduccion($edicion)
  {
        $Tran=htmlspecialchars($edicion);
        $query="SELECT * FROM reproductor WHERE  rep_id=$Tran";
        $datos=$this->db->execute($query);
        while(!$datos->EOF)
        {
            $arregloReproductor[]=array('rep_id'=>$datos->fields('rep_id'),
                                     'rep_fecha'=>$datos->fields('rep_fecha'),
                                     'rep_hora'=>$datos->fields('rep_hora'),
                                     'rep_idUsuario'=>$datos->fields('rep_idUsuario'),
                                     'rep_titulo'=>$datos->fields('rep_titulo'),
                                     'rep_url'=>$datos->fields('rep_url')
									 );
            $datos->MoveNext();
        }//fin de while
        
        return $arregloReproductor;
  } 
    
public function modificarReproductor($id,$fecha,$hora, $idUsuario,$titulo, $url)
     {
        $id=htmlspecialchars($id);
        $fecha=htmlspecialchars($fecha);
        $hora=htmlspecialchars($hora);
        $idUsuario=htmlspecialchars($idUsuario);
        $titulo=htmlspecialchars($titulo);
		    $url=htmlspecialchars($url);
        $query="UPDATE reproductor SET
                            rep_fecha=date('$fecha'), rep_hora='$hora',  rep_idUsuario=$idUsuario,
                            rep_titulo='$titulo',  rep_url='$url'
                            WHERE rep_id=$id";
        $datos=$this->db->execute($query);
        $transmicion=array();
        $transmicion=($datos)?array ('exito'=>true):array('exito'=>false);
		return  $transmicion;   
    }//fin de la funcion modificar
	
public function agregarReproductor($id,$fecha,$hora, $idUsuario,$titulo, $url)
     {
        $id=htmlspecialchars($id);
        $fecha=htmlspecialchars($fecha);
        $hora=htmlspecialchars($hora);
        $idUsuario=htmlspecialchars($idUsuario);
        $titulo=htmlspecialchars($titulo);
		    $url=htmlspecialchars($url);
        $query="insert into reproductor (rep_fecha,rep_hora,rep_idUsuario,rep_titulo,rep_url) values (date('$fecha'),'$hora',$idUsuario,'$titulo','$url')";
        $datos=$this->db->execute($query);
        $transmicion=array();
        $transmicion=($datos)?array ('exito'=>true):array('exito'=>false);
		return  $transmicion;   
    }//fin de la funcion modificar


	#funcion de eliminar
public function borrarReproductor($borrar)
     {   
        $borrar=htmlspecialchars($borrar);
        $query="DELETE FROM reproductor WHERE rep_id=$borrar";        
        $datos=$this->db->execute($query);
        $aReproductor=array();
        $aReproductor=($datos)?array ('exito'=>true):array('exito'=>false);
        return  $aReproductor;
    }//fin de la funcion eliminar
	
	

}
?>