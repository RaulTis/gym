<?php
   require_once('config.inc.php');
   require_once('lib/adodb/adodb.inc.php');

    abstract class Conectar{
      private $conn;
      private $servidor=SERVIDOR;
      private $usuario=USUARIO;
      private $password=PASSWORD;
      private $basedatos=BASEDATOS;
      private $tipo=TIPO;
      public function conectar(){
        try{
            
        if(!$this->conn=NewADOConnection($this->tipo))
        throw new exception('Error al cargar el driver');
        elseif(!$this->conn->Connect($this->servidor,$this->usuario,$this->password,$this->basedatos))
        throw new exception('Error al crear la conexion');
        return $this->conn;
        }
        catch(Exception $e){
            ?>
            <h1>A ocurrido el siguiente error:&nbsp;<?php echo $e->getMessage().'/Linea: '.$e->getLine();?>&nbsp;:(</h1>
            <?php
        }
      }
} //fin de la clase
?>