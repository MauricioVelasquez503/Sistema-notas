<?php require_once('../Connections/cnn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_MAESTROS_ACTIVIDAD = 10;
$pageNum_MAESTROS_ACTIVIDAD = 0;
if (isset($_GET['pageNum_MAESTROS_ACTIVIDAD'])) {
  $pageNum_MAESTROS_ACTIVIDAD = $_GET['pageNum_MAESTROS_ACTIVIDAD'];
}
$startRow_MAESTROS_ACTIVIDAD = $pageNum_MAESTROS_ACTIVIDAD * $maxRows_MAESTROS_ACTIVIDAD;

mysql_select_db($database_cnn, $cnn);
$query_MAESTROS_ACTIVIDAD = "SELECT * FROM `vw_listamaestros`";
$query_limit_MAESTROS_ACTIVIDAD = sprintf("%s LIMIT %d, %d", $query_MAESTROS_ACTIVIDAD, $startRow_MAESTROS_ACTIVIDAD, $maxRows_MAESTROS_ACTIVIDAD);
$MAESTROS_ACTIVIDAD = mysql_query($query_limit_MAESTROS_ACTIVIDAD, $cnn) or die(mysql_error());
$row_MAESTROS_ACTIVIDAD = mysql_fetch_assoc($MAESTROS_ACTIVIDAD);

if (isset($_GET['totalRows_MAESTROS_ACTIVIDAD'])) {
  $totalRows_MAESTROS_ACTIVIDAD = $_GET['totalRows_MAESTROS_ACTIVIDAD'];
} else {
  $all_MAESTROS_ACTIVIDAD = mysql_query($query_MAESTROS_ACTIVIDAD);
  $totalRows_MAESTROS_ACTIVIDAD = mysql_num_rows($all_MAESTROS_ACTIVIDAD);
}
$totalPages_MAESTROS_ACTIVIDAD = ceil($totalRows_MAESTROS_ACTIVIDAD/$maxRows_MAESTROS_ACTIVIDAD)-1;

mysql_select_db($database_cnn, $cnn);
$query_GRADO = "SELECT * FROM grados";
$GRADO = mysql_query($query_GRADO, $cnn) or die(mysql_error());
$row_GRADO = mysql_fetch_assoc($GRADO);
$totalRows_GRADO = mysql_num_rows($GRADO);

mysql_select_db($database_cnn, $cnn);
$query_PROFESOR = "SELECT * FROM maestros";
$PROFESOR = mysql_query($query_PROFESOR, $cnn) or die(mysql_error());
$row_PROFESOR = mysql_fetch_assoc($PROFESOR);
$totalRows_PROFESOR = mysql_num_rows($PROFESOR);

mysql_select_db($database_cnn, $cnn);
$query_MATERIA = "SELECT * FROM materias";
$MATERIA = mysql_query($query_MATERIA, $cnn) or die(mysql_error());
$row_MATERIA = mysql_fetch_assoc($MATERIA);
$totalRows_MATERIA = mysql_num_rows($MATERIA);

mysql_select_db($database_cnn, $cnn);
$query_SECCIONES = "SELECT * FROM secciones";
$SECCIONES = mysql_query($query_SECCIONES, $cnn) or die(mysql_error());
$row_SECCIONES = mysql_fetch_assoc($SECCIONES);
$totalRows_SECCIONES = mysql_num_rows($SECCIONES);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!-- InstanceBegin template="/Templates/template1.dwt.php" codeOutsideHTMLIsLocked="false" --> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Colegio Angloamericano</title>
	<!-- InstanceEndEditable -->
	<meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="../css/zerogrid.css">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/responsiveslides.css" />
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<link href='../images/logotitulo.ico' rel='icon' type='image/x-icon'/>
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/responsiveslides.js"></script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        maxwidth: 962,
        namespace: "centered-btns"
      });
    });
  </script>
  
  <script src="../js/jquery-1.9.1.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <link rel="stylesheet" href="../css/jquery-ui.css" />
  <script>
  $(function() {
    $( "#FECHA_ENTREGA" ).datepicker();
	 $('#FECHA_ENTREGA').datepicker('option', {dateFormat: 'yy/mm/dd'});
  });
  </script>
  
  
  
  
	<!-- InstanceBeginEditable name="head" -->
	<!-- InstanceEndEditable -->
</head>
<body>
<!--------------Header--------------->
<header>
 <div id=logo> <img src="../images/logo2.png" alt="Colegio Angloamericano"> </div>
 <div id=anglo> <img src="../images/COLEGIO_ANGLO.png" alt="Colegio Angloamericano"> </div>
  <nav>
	  <ul>
		<?php include("../includes/cabezeraadmin.php"); ?>  
			
	  </ul>
  </nav>
</header>
<!--------------Slideshow--------------->

<!--------------Content--------------->
<section id="content">
	<div class="zerogrid block"><!-- InstanceBeginEditable name="titulo" -->
	  <div class="row block03">
	    <h1>&nbsp;</h1>
	  </div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="contenido" -->
	<div class="row block01">
      <table border="1" align="center">
        <tr>
          <td><strong>CODIGO DE LA MATERIA</strong></td>
          <td><strong>NOMBRE DE LA MATERIA</strong></td>
          <td><strong>CODIGO DEL ROFESOR</strong></td>
          <td><strong>NOMBRE DEL PROFESOR</strong></td>
          <td><strong>APELLIDO DEL PROFESOR</strong></td>
          <td><strong>GRADO</strong></td>
          <td><strong>SECCION</strong></td>
          <td>&nbsp;</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['cod_materia']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['nombre_materia']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['str_codigo__profesor']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['str_nombre_profesor']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['str_apellido_profesor']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['nombre_grado']; ?></td>
            <td><?php echo $row_MAESTROS_ACTIVIDAD['str_secciones']; ?></td>
            <td><a href="insertar_actividad.php?ID_GRADO=<?php echo $row_GRADO['ID_GRADO']; ?>&ID_PROFESOR=<?php echo $row_PROFESOR['ID_PROFESOR']; ?>&ID_MATERIA=<?php echo $row_MATERIA['ID_MATERIA']; ?>&ID_SECCIONES=<?php echo $row_SECCIONES['ID_SECCIONES']; ?>">SIGUIENTE</a></td>
          </tr>
          <?php } while ($row_MAESTROS_ACTIVIDAD = mysql_fetch_assoc($MAESTROS_ACTIVIDAD)); ?>
      </table>
    </div>
	<!-- InstanceEndEditable --></div>
</section>
<!--------------Footer--------------->
<footer>
	<div class="wrapfooter">
	<p>Copyright © 2013 Colegio Angloamericano</p>
	</div>
</footer>

</body><!-- InstanceEnd --></html>
<?php
mysql_free_result($MAESTROS_ACTIVIDAD);

mysql_free_result($GRADO);

mysql_free_result($PROFESOR);

mysql_free_result($MATERIA);

mysql_free_result($SECCIONES);
?>
