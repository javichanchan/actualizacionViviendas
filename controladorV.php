<?php

include "vistav.php";

spl_autoload_register(function ($clase){
	require_once('modelor/'.$clase.'.php');
});

$baseDatos=new conexion();
$mensaje = "Actualizacion de la BBDD.";

if(isset($_POST['Enviar2'])){
	$vivienda = new vivienda();
	$vivienda->id = $_POST['id'];
	$vivienda->tipo = $_POST['tipo'];
	$vivienda->zona = $_POST['zona'];
	
	$foto = new foto();
	$foto->nombre_temp = $_FILES['foto']['tmp_name'];
	$foto->nombre = $_FILES['foto']['name'];
	$existe2 = $foto->existe();
	if($existe2==TRUE){
			$nuevo_nombre = $foto->cambiarnombre();
			$vivienda->foto = $nuevo_nombre;
		}else{
			$vivienda->foto = $foto->nombre;
		}
	$foto->mover($vivienda->foto);
	$vivienda->actualizar($baseDatos->link);
	viviendaActualizada($vivienda->id);


}else if(isset($_POST['Enviar1'])){
	$vivienda = new vivienda();
	$vivienda->id = $_POST['id'];
	$existe1 = $vivienda->existe($baseDatos->link);
	if($existe1){		
		imprimeFormulario2($vivienda->id);
		
	}else{
		noExiste($vivienda->idProducto);
	}

	



}else{
	imprimeFormulario1();
}

imprimeFooter($mensaje);