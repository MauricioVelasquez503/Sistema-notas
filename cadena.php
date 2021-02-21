<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php function generador($longitud){

$char_array = array("A", "B","C","D","E","F","G","H","I","J","K","L","M","N ","O","P","Q","R","S","T","U","V","W","X","Y","Z") ;

for($i=0;$i<$longitud;$i++) 
echo $char_array[rand(0,25)];


}
$clave1 = generador(1); // aqui indicas la longitud de la clave
echo $clave1;?>
</body>
</html>