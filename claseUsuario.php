<?php
require_once('claseConectar.php');
class Usuarios extends Conectar{
    private $db;
    public function __construct(){
    $this->db=parent::conectar();
    }
    
  public function buscarUsuario($usuario,$contrasena)
  {
        $usuario=trim(htmlspecialchars($usuario));
        $contrasena= trim(htmlspecialchars($contrasena));
        $query="SELECT * FROM usuarios WHERE usu_usuario='$usuario' and usu_clave='$contrasena'";
        $datos=$this->db->execute($query);
        $arregloUsuarios=array();
        echo $datos->recordCount().'<br />';
        if($datos->recordCount()>0){
            $arregloUsuarios[]=array('usu_id'=>$datos->fields('usu_id'),
                                     'usu_usuario'=>$datos->fields('usu_usuario'),
                                     'estatus'=>'activo');
        }
        else{
          $arregloUsuarios[]=array('estatus'=>'error');
        }
        return $arregloUsuarios;
  }
    
public function agregarUsuario($usuario, $contrasena){
        $usuario=trim(htmlspecialchars($usuario));
        $contrasena=trim(htmlspecialchars($contrasena));
        $validar="select * from usuarios where usu_usuario='$usuario'";
        $validarUsuario=$this->db->execute($validar);
        
        if($validarUsuario->recordCount()==0)
        {
		       $query="INSERT INTO  usuarios(usu_usuario,usu_clave) VALUES('$usuario','$contrasena')";	 
           $datos=$this->db->execute($query);
        }
        
        $aUsuario=array();
        if($validarUsuario->recordCount()==0)
             $aUsuario=array ('exito'=>'si');
        else
             $aUsuario=array ('exito'=>'no');
		return  $aUsuario;	   	
    }//fin de la funcion agregar

}
?>