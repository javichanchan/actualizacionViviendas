<?php
class foto{
	private $nombre;
	private $nombre_temp;

	function __construct(){}

	public function __set($var, $valor){
		if(property_exists(__CLASS__, $var)){
			$this->$var = $valor;
		}else{
			echo "No existe el atributo $var";
		}
	}

	public function __get($var){
		if(property_exists(__CLASS__, $var)){
			return $this->$var;
		}
		return NULL;
	}

	function existe(){
		$comprobar = "fotos/".$this->nombre;		
		if(file_exists($comprobar)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function cambiarnombre(){
		$nombre = $this->nombre;		
		$id_unico = time();
		$nombre = $id_unico.$nombre;
		return $nombre;
	}

	function mover($nombre_completo){
		$nombre_temp = $this->nombre_temp;
		$nombre_completo = "fotos/".$nombre_completo;
		move_uploaded_file($nombre_temp, $nombre_completo);
	}

}