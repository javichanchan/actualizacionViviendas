<?php
class conexion{ 
    
    private $link; 

    public function __construct(){ 
       if (!isset($this->link)) {
            try{
                $this->link = new PDO('mysql:host=localhost;dbname=viviendas', 'root', 'root');
                $this->link->exec("set names utf8mb4");
            }catch(PDOException $e){
                print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
                print "\n";
                print "    <p>Error: " . $e->getMessage() . "</p>\n";
                die();
            }
        }
    }

    public function __get($var){         
        if (property_exists(__CLASS__, $var)){   
            return $this->$var;         
        }         
        return NULL;     
    } 
}  