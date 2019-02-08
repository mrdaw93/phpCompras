<?php
   include('session.php');
  // echo  $_SESSION["login_user"];
  
  
	$un=$_SESSION['login_user'];
	
	$sql= "select id from admin where username='$un'";


	$resultado = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($resultado) > 0) {
		while ($fila = mysqli_fetch_assoc($resultado)) {
		// //$id=$fila['id'];
		// $cookie_value = $fila['id'];
		// setcookie('cookie_id', $cookie_value, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
		$_SESSION['session_id']= $fila['id']; 
		}
	}
	
	//echo $_COOKIE['cookie_id']; 
	//echo $_SESSION['session_id']; 

  
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ul>
    <li><a href="rped.php">Hacer Pedido</a></li>
    <li><a href="#">Mis pedidos</a>
      <ul id="submenu">
        <li><a href="conped.php">Consultar Pedidos</a></li>
        <li><a href="pedfechas.html">Consultar por fechas</a></li>      </ul>
    </li>
    <li><a href="listprod.php">Listado Productos</a></li>
  
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>