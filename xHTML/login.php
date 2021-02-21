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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Usuario'])) {
  $loginUsername=$_POST['Usuario'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../index.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_cnn, $cnn);
  
  $LoginRS__query=sprintf("SELECT DE_USUARIO, PASSWORD FROM usuario WHERE DE_USUARIO=%s AND PASSWORD=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $cnn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<!-- General meta information -->
	<title>Colegio Angloamericano</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="./js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<body>

	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2><img src="images/untitled.png" alt="LOGO" width="39" height="46" /> Inicio de sesion</h2>
            <table>

			<div id="username_input">

			  <div id="username_inputleft"></div>

				<div id="username_inputmiddle">
			  <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" id="hola">
					<input type="text" name="Usuario" id="url" value="Ingrese su codigo" onclick="this.value = ''">
					<img id="url_user" src="./images/mailicon.png" alt="">
				
				</div>

				<div id="username_inputright"></div>

		  </div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
				
				  <input type="password" name="password" id="url" value="Password" onclick="this.value = ''">
					<img id="url_password" src="./images/passicon.png" alt="">
				
				</div>

				<div id="password_inputright"></div>

			</div>

		  <div id="submit">
				<a href="#" class="myButton"> INICIAR SESION </a>
			</div>
	  </div>

		<div id="wrapperbottom"></div>
	</div>
    </form>
    </table>
</body>
</html>