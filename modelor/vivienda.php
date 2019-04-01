<?php
class vivienda{
	  private $id;
    private $tipo;
    private $zona;
    private $foto; 
    
    function __construct(){}

    public function __get($var){         
        if (property_exists(__CLASS__, $var)){   
            return $this->$var;         
        }         
        return NULL;     
    } 
    public function __set($var, $valor){
             if (property_exists(__CLASS__, $var)){   
                $this->$var = $valor;           
            } else   echo "No existe el atributo $var.";    
        }  
    public function insertar($link){
    	try{
        $result = $link->prepare ("insert into viviendas (id, tipo, zona, foto) values (:id, :tipo, :zona, :foto)");
		$result->bindParam(':id', $this->id);
		$result->bindParam(':tipo', $this->tipo);
		$result->bindParam(':zona', $this->zona);
		$result->bindParam(':foto', $this->foto);
      	$result->execute(); 
      	}catch(PDOException $e){
      		print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        	print "<p>Error: ".$e->getMessage()."</p><br>";
      	}
    }
    
	public function actualizar($link){
		try{
			$result = $link->prepare("UPDATE viviendas SET  tipo=:tipo, zona=:zona, foto=:foto WHERE id=:id");
            $result->bindParam(':tipo', $this->tipo);
            $result->bindParam(':zona', $this->zona);
            $result->bindParam(':foto', $this->foto);
            $result->bindParam(':id', $this->id);
        	$result->execute(); 
        }catch(PDOException $e){
        	print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        	print "<p>Error: ".$e->getMessage()."</p><br>";
        	print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
        }
	}

	function existe($link){
    try{
		$result = $link->prepare("SELECT * FROM viviendas WHERE id=:id");
    $result->bindParam(':id', $this->id);
    $result->execute();
    $fila=$result->fetch(PDO::FETCH_ASSOC);
		return $fila;
    }catch(PDOException $e){
            print "    <p>Error: No se puede ejecutar la consulta.</p>\n";
            print "\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            die();
    }
	}

	public function consultar($link){
       try{
           $result = $link->prepare("SELECT * FROM viviendas WHERE id=:id");
           $result->bindParam(':id', $this->id);
           $result->execute(); 
           return $result->fetch(PDO::FETCH_ASSOC);       
        }catch(PDOException $e){
           print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
           print "<p>Error: ".$e->getMessage()."</p><br>";          
        }
    }
    
}