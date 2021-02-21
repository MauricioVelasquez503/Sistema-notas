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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO alumnos_seccion (ID_ALUMNO, STR_NOMBRE_ALUMNO, STR_APELLIDO_ALUMNO, STRNIE,ID_GRADO,ID_SECCIONES,FECHA_REGISTRO) VALUES (%s, %s, %s, %s, %s, %s,NOW())",
                       GetSQLValueString($_POST['ID_ALUMNO'], "text"),
                       GetSQLValueString($_POST['STR_NOMBRE_ALUMNO'], "text"),
                       GetSQLValueString($_POST['STR_APELLIDO_ALUMNO'], "text"),
                       GetSQLValueString($_POST['STRNIE'], "text"),
					   GetSQLValueString($_POST['ID_GRADO'], "text"),
					   GetSQLValueString($_POST['ID_SECCIONES'], "text"));

  mysql_select_db($database_cnn, $cnn);
  $Result1 = mysql_query($insertSQL, $cnn) or die(mysql_error());
}

$colname_grados = "-1";
if (isset($_GET['ID_GRADO'])) {
  $colname_grados = $_GET['ID_GRADO'];
}
mysql_select_db($database_cnn, $cnn);
$query_grados = sprintf("SELECT * FROM grados_secciones WHERE ID_GRADO = %s", GetSQLValueString($colname_grados, "int"));
$grados = mysql_query($query_grados, $cnn) or die(mysql_error());
$row_grados = mysql_fetch_assoc($grados);
$totalRows_grados = mysql_num_rows($grados);

$colname_secciones = "-1";
if (isset($_GET['ID_SECCIONES'])) {
  $colname_secciones = $_GET['ID_SECCIONES'];
}
mysql_select_db($database_cnn, $cnn);
$query_secciones = sprintf("SELECT * FROM grados_secciones WHERE ID_SECCIONES = %s", GetSQLValueString($colname_secciones, "text"));
$secciones = mysql_query($query_secciones, $cnn) or die(mysql_error());
$row_secciones = mysql_fetch_assoc($secciones);
$totalRows_secciones = mysql_num_rows($secciones);
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
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
	    <h1>Insertar Alumnos</h1>
	  </div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="contenido" -->
	<div class="row block01">
	  
	  <?php function generador($longitud){

$char_array = array ("0","1","2","3","4","5","6","7","8","9") ;

for($i=0;$i<$longitud;$i++) 
echo $char_array[rand(0,9)] ;
}
?>
	  
	  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
	    <table align="center">
	      <tr valign="baseline">
	        <td nowrap align="right">CODIGO ALUMNO:</td>
	        <td><input name="ID_ALUMNO" type="text" id="ID_ALUMNO" value="<?php echo date("Y"); ?><?php echo $clave1= generador(4); ?>" size="8" readonly></td>
	        </tr>
	      <tr valign="baseline">
	        <td nowrap align="right">NOMBRE DE ALUMNO:</td>
	        <td><span id="sprytextfield1">
	          <input type="text" name="STR_NOMBRE_ALUMNO" value="" size="30">
            <span class="textfieldRequiredMsg">*.</span></span></td>
	        </tr>
	      <tr valign="baseline">
	        <td nowrap align="right">APELLIDO DEALUMNO:</td>
	        <td><span id="sprytextfield2">
	          <input type="text" name="STR_APELLIDO_ALUMNO" value="" size="30">
            <span class="textfieldRequiredMsg">*.</span></span></td>
	        </tr>
	      <tr valign="baseline">
	        <td nowrap align="right">NIE:</td>
	        <td><span id="sprytextfield3">
            <input type="text" name="STRNIE" value="" size="7">
            <span class="textfieldRequiredMsg">*.</span></span></td>
	        </tr>
	      <tr valign="baseline">
	        <td nowrap align="right">&nbsp;</td>
	        <td><input type="submit" value="Insertar registro"></td>
	        </tr>
	      </table>
	    <input type="hidden" name="MM_insert" value="form1">
	    <input type="hidden" name="ID_GRADO" value="<?php echo $row_grados['ID_GRADO']; ?>">
	    <input type="hidden" name="ID_SECCIONES" value="<?php echo $row_secciones['ID_SECCIONES']; ?>">
	    </form>
	  <p>&nbsp;</p>
	  </div>
	<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
    </script>
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
mysql_free_result($grados);

mysql_free_result($secciones);
?>
