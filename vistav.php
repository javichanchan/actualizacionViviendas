<?php

function imprimeFormulario1(){
	$texto="<!DOCTYPE html>
			<html>
			<head>
			<title></title>
			<meta charset='utf-8'>
			</head>
			<body style='background-color:grey'>
			<h1>Introduce el ID.</h1>
			<form method='post' action=''>
			<table>
			<tr><td>Id</td>
			<td><input type='text' name='id'></td></tr>					
			</table>
			<input type='submit' name='Enviar1' value='Enviar1'>
			</form>
			<a href='controladorV.php'>Volver</a>";
	echo $texto;
}

function imprimeFormulario2($id){
	$texto = "<!DOCTYPE html>
	<html>
	<head>
	<title></title>
	<meta charset='utf-8'>
	</head>
	<body style='background-color:grey'>
	<h1>Introduce el ID.</h1>
	<form method='post' action='' enctype='multipart/form-data'>
	<input type='hidden' name='id' value='$id'>
	Tipo<input type='text' name='tipo'><br>
	Zona<input type='text' name='zona'><br>
	Tipo<input type='file' name='foto'><br>				
	
	<input type='submit' name='Enviar2' value='Enviar2'>
	</form>
	<a href='controladorV.php'>Volver</a>";
	echo $texto;
}



function imprimeFooter($mensaje){
	echo "<footer>Te encuentras en ".$mensaje." .<br></footer>";	
}

function noExiste($codigo){
	echo "<h2>La vivienda ".$codigo." no existe.</h2><br>";
	echo "<a href='controladorV.php'>Volver</a><br>";
}

function viviendaActualizada($id){
	echo "<h2>La vivienda ".$id." ha sido actualizada.</h2><br>";
	echo "<a href='controladorV.php'>Volver</a><br>";
}