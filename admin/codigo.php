<?php function generador($longitud){

$char_array = array ("0","1","2","3","4","5","6","7","8","9") ;

for($i=0;$i<$longitud;$i++) 
echo $char_array[rand(0,9)] ;
}

echo date("Y");
echo $clave1= generador(4);

?>