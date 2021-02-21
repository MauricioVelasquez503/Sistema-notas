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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_cnn, $cnn);
$query_Recordset1 = "SELECT * FROM actividades_alumnos";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $cnn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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
	    <h1>Seleccionar Grado y Seccion</h1>
	  </div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="contenido" -->
	<div class="row block01">
	  <table width="200" border="1" class="tabla">
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
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
mysql_free_result($Recordset1);
?>
