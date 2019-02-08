<?php


	// Definicion funcion error_function
	// function errores ($error_level,$error_message){
		 // echo "<b> ERROR Codigo error: </b> $error_level  - <b> Mensaje: $error_message </b><br>";
		 // echo "Finalizando script <br>";
		 // die();  
	// }
	// set_error_handler("errores");

	
	
	// //Error para el campo cliente vacio 
	// if($nCli==null){
		// trigger_error("El campo Numero Cliente no puede estar vacio");
	// }
	
	
	
	// //Comprobamos que el codigo de cliente no existe 
	// $sql0 = "select customerName from customers where customerNumber=$nCli";
	// $resultado0 = mysqli_query($conn, $sql0);
	
	
	
	// //Si no existe muestra un error o un echo funciona los 2
	// if (mysqli_num_rows($resultado0) == 0) {
		// //trigger_error("No existe el cliente");
		// echo "No existe el cliente <br>";
	// }
	
	
	include('session.php');
	
	
	$un=$_SESSION['login_user'];
	
	
	
	
	// Si existe ejecuta la consulta 
	$sql= "select orders.orderNumber, orders.orderDate, orders.status 
			from  orders where orders.customerNumber=(select id from admin where username='$un')";

				
	$resultado1 = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($resultado1) > 0) {
		 echo "<table border=1";
		 //recorre el resultado fila a fila 
				echo "<tr>";
				echo "<td>Numero de Orden</td>";
				echo "<td>Fecha Orden</td>";
				echo "<td>Estado</td>";
				echo "</tr>";		
		 while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<tr>";
					echo "<td>".$fila["orderNumber"]."</td>";
					echo "<td>".$fila["orderDate"]."</td>";
					echo "<td>".$fila["status"]."</td>";
				echo "</tr>";
			}
		echo "</table>";
		} else {
		echo "No existen pedidos";
	}					
	
	
	
?>