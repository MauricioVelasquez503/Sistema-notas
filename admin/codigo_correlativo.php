<?php require_once('../Connections/cnn.php'); ?>
<?php
mysql_select_db($database_cnn, $cnn);
$cnn = "SELECT ID_PROFESOR FROM maestros WHERE ID_PROFESOR LIKE '$iniciales%' ORDER BY ID_PROFESOR ASC LIMIT 1  ";
$rst = mysql_query( $cnn ) or die( mysql_error());
$row = mysql_fetch_array( $rst );

$numero = (int) substr( $row[0], 3 );
$numero++;

echo $newCode = $iniciales=$numero; 
echo $numero++;
?>
