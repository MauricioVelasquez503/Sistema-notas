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

$maxRows_grado_seccion = 10;
$pageNum_grado_seccion = 0;
if (isset($_GET['pageNum_grado_seccion'])) {
  $pageNum_grado_seccion = $_GET['pageNum_grado_seccion'];
}
$startRow_grado_seccion = $pageNum_grado_seccion * $maxRows_grado_seccion;

mysql_select_db($database_cnn, $cnn);
$query_grado_seccion = "SELECT * FROM grados_secciones";
$query_limit_grado_seccion = sprintf("%s LIMIT %d, %d", $query_grado_seccion, $startRow_grado_seccion, $maxRows_grado_seccion);
$grado_seccion = mysql_query($query_limit_grado_seccion, $cnn) or die(mysql_error());
$row_grado_seccion = mysql_fetch_assoc($grado_seccion);

if (isset($_GET['totalRows_grado_seccion'])) {
  $totalRows_grado_seccion = $_GET['totalRows_grado_seccion'];
} else {
  $all_grado_seccion = mysql_query($query_grado_seccion);
  $totalRows_grado_seccion = mysql_num_rows($all_grado_seccion);
}
$totalPages_grado_seccion = ceil($totalRows_grado_seccion/$maxRows_grado_seccion)-1;
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
	    <h1>SELCCIONE EL GRADO PARA VER LOS ALUMNOS</h1>
	  </div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="contenido" -->
	<div class="row block01">
	  <table width="376" height="292" border="1" align="center">
	    <tr>
	      <td><strong><a href="ALUMNO_SECCION/primer_a.php">PRIMER GRADO, SECCION:A</a></strong></td>
	      <td><strong><a href="Consultar_alumnos.php">PRIMER GRADO, SECCION:B</a></strong></td>
        </tr>
	    <tr>
	      <td><strong>SEGUNDO GRADO SECCION:A</strong></td>
	      <td><strong>SEGUNDO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>TERCER GRADO SECCION:A</strong></td>
	      <td><strong>TERCER GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>CUARTO GRADO SECCION:A</strong></td>
	      <td><strong>CUARTO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>QUINTO GRADO SECCION:A</strong></td>
	      <td><strong>QUINTO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>SEXTO GRADO SECCION:A</strong></td>
	      <td><strong>SEXTO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>SEPTIMO GRADO SECCION:A</strong></td>
	      <td><strong>SEPTIMO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>OCTAVO GRADO SECCION:A</strong></td>
	      <td><strong>OCTAVO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>NOVENO GRADO SECCION:A</strong></td>
	      <td><strong>NOVENO GRADO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>PRIMER AÑO SECCION:A</strong></td>
	      <td><strong>PRIMER AÑO SECCION:B</strong></td>
        </tr>
	    <tr>
	      <td><strong>SEGUNDO AÑO SECCION:A</strong></td>
	      <td><strong>SEGUNDO AÑO SECCION:B</strong></td>
        </tr>
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
mysql_free_result($grado_seccion);
?>
