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
  $insertSQL = sprintf("INSERT INTO maestros_seccion (ID_PROFESOR,ID_GRADO,ID_SECCIONES) VALUES (%s,%s,%s)",
                       GetSQLValueString($_POST['ID_PROFESOR'], "int"),
					   GetSQLValueString($_POST['ID_GRADO'], "text"),
					   GetSQLValueString($_POST['ID_SECCIONES'], "text") );

  mysql_select_db($database_cnn, $cnn);
  $Result1 = mysql_query($insertSQL, $cnn) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID_GRADO'])) {
  $colname_Recordset1 = $_GET['ID_GRADO'];
}
mysql_select_db($database_cnn, $cnn);
$query_Recordset1 = sprintf("SELECT * FROM grados_secciones WHERE ID_GRADO = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $cnn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Secciones = "-1";
if (isset($_GET['ID_SECCIONES'])) {
  $colname_Secciones = $_GET['ID_SECCIONES'];
}
mysql_select_db($database_cnn, $cnn);
$query_Secciones = sprintf("SELECT * FROM grados_secciones WHERE ID_SECCIONES = %s", GetSQLValueString($colname_Secciones, "text"));
$Secciones = mysql_query($query_Secciones, $cnn) or die(mysql_error());
$row_Secciones = mysql_fetch_assoc($Secciones);
$totalRows_Secciones = mysql_num_rows($Secciones);

mysql_select_db($database_cnn, $cnn);
$query_Profesores = "SELECT * FROM maestros";
$Profesores = mysql_query($query_Profesores, $cnn) or die(mysql_error());
$row_Profesores = mysql_fetch_assoc($Profesores);
$totalRows_Profesores = mysql_num_rows($Profesores);
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
	    <h1>Seleccione al Profesor</h1>
	  </div>
	<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="contenido" -->
	<div class="row block01">
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td nowrap align="right">ID_PROFESOR:</td>
            <td><label for="ID_PROFESOR"></label>
              <select name="ID_PROFESOR" id="ID_PROFESOR">
                <?php
do {  
?>
                <option value="<?php echo $row_Profesores['ID_PROFESOR']?>"><?php echo $row_Profesores['STR_NOMBRE_PROFESOR']?></option>
                <?php
} while ($row_Profesores = mysql_fetch_assoc($Profesores));
  $rows = mysql_num_rows($Profesores);
  if($rows > 0) {
      mysql_data_seek($Profesores, 0);
	  $row_Profesores = mysql_fetch_assoc($Profesores);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="Insertar registro"></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
        <input type="hidden" name="ID_GRADO" id="ID_GRADO" value="<?php echo $row_Recordset1['ID_GRADO']; ?>">
	    <input type="hidden" name="ID_SECCIONES" id="ID_SECCIONES" value="<?php echo $row_Secciones['ID_SECCIONES']; ?>">
      </form>
      <p>&nbsp;</p>
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

mysql_free_result($Secciones);

mysql_free_result($Profesores);
?>
