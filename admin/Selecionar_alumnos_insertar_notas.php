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
  $insertSQL = sprintf("INSERT INTO actividades (ID_GRADO, ID_SECCIONES, ID_MATERIA, ID_ACTIVIDAD, ID_PROFESOR, ID_ALUMNO, NOTA) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_GRADO'], "int"),
                       GetSQLValueString($_POST['ID_SECCIONES'], "text"),
                       GetSQLValueString($_POST['ID_MATERIA'], "int"),
                       GetSQLValueString($_POST['ID_ACTIVIDAD'], "text"),
                       GetSQLValueString($_POST['ID_PROFESOR'], "int"),
                       GetSQLValueString($_POST['ID_ALUMNO'], "text"),
                       GetSQLValueString($_POST['NOTA'], "double"));

  mysql_select_db($database_cnn, $cnn);
  $Result1 = mysql_query($insertSQL, $cnn) or die(mysql_error());
}

mysql_select_db($database_cnn, $cnn);
$query_alumno_para_notas = "SELECT * FROM vw_alumnos_para_notas";
$alumno_para_notas = mysql_query($query_alumno_para_notas, $cnn) or die(mysql_error());
$row_alumno_para_notas = mysql_fetch_assoc($alumno_para_notas);
$totalRows_alumno_para_notas = mysql_num_rows($alumno_para_notas);
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
      <table width="880" height="64" border="1" align="center">
        <tr>
          <td><strong>CODIGO ALUMNO</strong></td>
          <td><strong>NOMBRE ALUMNO</strong></td>
          <td><strong>APELLIDO ALUMNO</strong></td>
          <td><strong>NOMBRE ACTIVIDAD</strong></td>
          <td><strong>PORCENTAJE</strong></td>
          <td><strong>GRADO</strong></td>
          <td><strong>SECCIONES</strong></td>
          <td>NOTA</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_alumno_para_notas['ID_ALUMNO']; ?></td>
            <td><?php echo $row_alumno_para_notas['STR_NOMBRE_ALUMNO']; ?></td>
            <td><?php echo $row_alumno_para_notas['STR_APELLIDO_ALUMNO']; ?></td>
            <td><?php echo $row_alumno_para_notas['NOMBRE_ACTIVIDAD']; ?></td>
            <td>%<?php echo $row_alumno_para_notas['PORCENTAJE']; ?></td>
            <td><?php echo $row_alumno_para_notas['GRADO']; ?></td>
            <td><?php echo $row_alumno_para_notas['STR_SECCIONES']; ?></td>
            <td><form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
              <label for="NOTA"></label>
         <input name="NOTA" type="text" id="NOTA" size="3">
        <input type="hidden" name="ID_GRADO" id="ID_GRADO"value="<?php echo $row_alumno_para_notas['ID_GRADO']; ?>">
	    <input type="hidden" name="ID_SECCIONES" id="ID_SECCIONES" value="<?php echo $row_alumno_para_notas['ID_SECCIONES']; ?>">
        <input type="hidden" name="ID_ACTIVIDAD" id="ID_ACTIVIDAD"value="<?php echo $row_alumno_para_notas['ID_ACTIVIDAD']; ?>">
        <input type="hidden" name="ID_MATERIA" id="ID_MATERIA" value="<?php echo $row_alumno_para_notas['ID_MATERIA']; ?>">
	    <input type="hidden" name="ID_PROFESOR" id="ID_PROFESOR" value="<?php echo $row_alumno_para_notas['ID_PROFESOR']; ?>">
        <input type="hidden" name="ID_ALUMNO" id="ID_ALUMNO"value="<?php echo $row_alumno_para_notas['ID_ALUMNO']; ?>">
        <input type="hidden" name="MM_insert" value="form1">
        <input type="submit" value="Insertar registro">
            </form></td>
          </tr>
          <?php } while ($row_alumno_para_notas = mysql_fetch_assoc($alumno_para_notas)); ?>
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
mysql_free_result($alumno_para_notas);
?>
