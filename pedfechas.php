<?php

	//Definicion funcion error_function
	function errores ($error_level,$error_message){
		 echo "<b> ERROR Codigo error: </b> $error_level  - <b> Mensaje: $error_message </b><br>";
		 echo "Finalizando script <br>";
		 die();  
	}

	set_error_handler("errores");

	
	include('session.php');

	
	
	$un=$_SESSION['login_user'];
	$fdesde=$_REQUEST['fdesde'];
	$fhasta=$_REQUEST['fhasta'];



	if($fdesde > $fhasta && $fhasta!=null){
		trigger_error("Fechas incoherentes");
	}
	
	if($fdesde==null){
		trigger_error("Fecha de inicio no puede esta vacia");
	}
		
	
	
//DESDE FECHA HASTA HOY 
	if($fdesde!=null && $fhasta==null){
		echo "fdesce ";
		$hoy=date("Y-m-d");

		$sql="SELECT  orders.orderNumber, orders.orderDate, orders.status from orders
					WHERE orders.customerNumber=(select id from admin where username='$un')
						and orderdate BETWEEN '$fdesde' and '$hoy';";
					

		$resultado = mysqli_query($db, $sql);

			
		if (mysqli_num_rows($resultado) > 0) {
			echo "<table border=1";
			echo "<tr>";
			echo "<td>Numero de Orden</td>";
			echo "<td>Fecha Orden</td>";
			echo "<td>Estado</td>";
			echo "</tr>";		
			 while ($fila = mysqli_fetch_assoc($resultado)) {
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
	
	}	
			


		//RANGO DE FECHAS

		if($fdesde!=null && $fhasta!=null){
		echo "desde hasta";
			$sql= "SELECT  orders.orderNumber, orders.orderDate, orders.status from orders
						WHERE orders.customerNumber=(select id from admin where username='$un')
							and orderdate BETWEEN '$fdesde' and '$fhasta';";


			$resultado = mysqli_query($db, $sql);
			
			if (mysqli_num_rows($resultado) > 0) {
			echo "<table border=1";
			echo "<tr>";
			echo "<td>Numero de Orden</td>";
			echo "<td>Fecha Orden</td>";
			echo "<td>Estado</td>";
			echo "</tr>";		
			 while ($fila = mysqli_fetch_assoc($resultado)) {
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
				

	
		}

		// echo "<input type='button' value='Atras' onclick='history.back()'><br>";
?>


