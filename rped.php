<?php

	include('session.php');
	

	
	echo "<form name='mi_formulario' action='rped1.php' method='post'>";

	
		//UNO
		$sql="select productname  from products";
		$resultado1 = mysqli_query($db, $sql);
			
			
		if (mysqli_num_rows($resultado1) > 0) {
			echo "producto 1"; 
			echo "<select name='uno'>";	
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<option>".$fila["productname"]."</option>";	
			}
			echo "</select>";
		
			
		}
		else {
			echo "No existen productos";
		}				
			
		echo " Cantidad <input type='text' name='cantidadp1' size='5'>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

		
		
		//DOS
		$sql="select productname  from products";
		$resultado1 = mysqli_query($db, $sql);
			
			
		if (mysqli_num_rows($resultado1) > 0) {
			echo "producto 2"; 
			echo "<select name='dos'>";	
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<option>".$fila["productname"]."</option>";	
			}
			echo "</select>";
		
			
		}
		else {
			echo "No existen productos";
		}			
		echo " Cantidad <input type='text' name='cantidadp2' size='5'>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		
		
		
		//TRES
		$sql="select productname  from products";
		$resultado1 = mysqli_query($db, $sql);
			
			
		if (mysqli_num_rows($resultado1) > 0) {
			echo "producto 3"; 
			echo "<select name='tres'>";	
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<option>".$fila["productname"]."</option>";	
			}
			echo "</select>";
		}
		else {
			echo "No existen productos";
		}			
		echo " Cantidad <input type='text' name='cantidadp3' size='5'>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		
		
		
		//CUATRO
		$sql="select productname  from products";
		$resultado1 = mysqli_query($db, $sql);
			
			
		if (mysqli_num_rows($resultado1) > 0) {
			echo "producto 4"; 
			echo "<select name='cuatro'>";	
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<option>".$fila["productname"]."</option>";	
			}
			echo "</select>";
		}
		else {
			echo "No existen productos";
		}			
		echo " Cantidad <input type='text' name='cantidadp4' size='5'>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		
		
		
		//CINCO
		$sql="select productname  from products";
		$resultado1 = mysqli_query($db, $sql);
			
			
		if (mysqli_num_rows($resultado1) > 0) {
			echo "producto 5"; 
			echo "<select name='cinco'>";	
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<option>".$fila["productname"]."</option>";	
			}
			echo "</select>";
			
		}
		else {
			echo "No existen productos";
		}			
		echo " Cantidad <input type='text' name='cantidadp5' size='5'>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

		
		

		
	echo "<input type='submit' value='Enviar'>";
	echo "</form>";
	
	
	
	
	
?>