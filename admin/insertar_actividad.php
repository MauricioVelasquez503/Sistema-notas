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
  $insertSQL = sprintf("INSERT INTO cat_actividades (ID_ACTIVIDAD, IDTIPO_ACTIVIDAD, STR_NOMBRE, PORCENTAJE, FECHA_ENTREGA,ID_GRADO,ID_SECCIONES ,ID_MATERIA,ID_PROFESOR) VALUES (%s, %s, %s, %s, %s,%s,%s,%s,%s)",
                       GetSQLValueString($_POST['ID_ACTIVIDAD'], "text"),
                       GetSQLValueString($_POST['IDTIPO_ACTIVIDAD'], "int"),
                       GetSQLValueString($_POST['STR_NOMBRE'], "text"),
                       GetSQLValueString($_POST['PORCENTAJE'], "double"),
                       GetSQLValueString($_POST['FECHA_ENTREGA'], "date"),
					   GetSQLValueString($_POST['ID_GRADO'], "int"),
					   GetSQLValueString($_POST['ID_SECCIONES'], "text"),
					   GetSQLValueString($_POST['ID_MATERIA'], "int"),
					   GetSQLValueString($_POST['ID_PROFESOR'], "int"));

  mysql_select_db($database_cnn, $cnn);
  $Result1 = mysql_query($insertSQL, $cnn) or die(mysql_error());
}

mysql_select_db($database_cnn, $cnn);
$query_tipo_act = "SELECT * FROM tipo_actividad";
$tipo_act = mysql_query($query_tipo_act, $cnn) or die(mysql_error());
$row_tipo_act = mysql_fetch_assoc($tipo_act);
$totalRows_tipo_act = mysql_num_rows($tipo_act);

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

$colname_materia = "-1";
if (isset($_GET['ID_MATERIA'])) {
  $colname_materia = $_GET['ID_MATERIA'];
}
mysql_select_db($database_cnn, $cnn);
$query_materia = sprintf("SELECT * FROM materias WHERE ID_MATERIA = %s", GetSQLValueString($colname_materia, "int"));
$materia = mysql_query($query_materia, $cnn) or die(mysql_error());
$row_materia = mysql_fetch_assoc($materia);
$totalRows_materia = mysql_num_rows($materia);

$colname_profesor = "-1";
if (isset($_GET['ID_PROFESOR'])) {
  $colname_profesor = $_GET['ID_PROFESOR'];
}
mysql_select_db($database_cnn, $cnn);
$query_profesor = sprintf("SELECT * FROM maestros WHERE ID_PROFESOR = %s", GetSQLValueString($colname_profesor, "int"));
$profesor = mysql_query($query_profesor, $cnn) or die(mysql_error());
$row_profesor = mysql_fetch_assoc($profesor);
$totalRows_profesor = mysql_num_rows($profesor);
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
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td nowrap align="right"><strong>ID_ACTIVIDAD:</strong></td>
            <td><input type="text" name="ID_ACTIVIDAD" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><strong>TIPO ACTIVIDAD:</strong></td>
            <td><label for="IDTIPO_ACTIVIDAD"></label>
              <select name="IDTIPO_ACTIVIDAD" id="IDTIPO_ACTIVIDAD">
                <?php
do {  
?>
                <option value="<?php echo $row_tipo_act['IDTIPO_ACTIVIDAD']?>"><?php echo $row_tipo_act['STR_NOMBRE_ACTIVIDAD']?></option>
                <?php
} while ($row_tipo_act = mysql_fetch_assoc($tipo_act));
  $rows = mysql_num_rows($tipo_act);
  if($rows > 0) {
      mysql_data_seek($tipo_act, 0);
	  $row_tipo_act = mysql_fetch_assoc($tipo_act);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><strong>DESCRIPCION DE LA ACTIVIDAD:</strong></td>
            <td><label for="STR_NOMBRE"></label>
            <textarea name="STR_NOMBRE" id="STR_NOMBRE"></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><strong>PORCENTAJE:</strong></td>
            <td><input type="text" name="PORCENTAJE" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><strong>FECHA ENTREGA:</strong></td>
            <td><input name="FECHA_ENTREGA" type="text" id="FECHA_ENTREGA" readonly /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="Insertar registro"></td>
          </tr>
        </table>
        <input type="hidden" name="ID_GRADO" id="ID_GRADO"value="<?php echo $row_grados['ID_GRADO']; ?>">
	    <input type="hidden" name="ID_SECCIONES" id="ID_SECCIONES" value="<?php echo $row_secciones['ID_SECCIONES']; ?>">
        <input type="hidden" name="ID_MATERIA" id="ID_MATERIA" value="<?php echo $row_materia['ID_MATERIA']; ?>">
	    <input type="hidden" name="ID_PROFESOR" id="ID_PROFESOR" value="<?php echo $row_profesor['ID_PROFESOR']; ?>">
        <input type="hidden" name="MM_insert" value="form1">
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
mysql_free_result($tipo_act);

mysql_free_result($grados);

mysql_free_result($secciones);

mysql_free_result($materia);

mysql_free_result($profesor);
?>
