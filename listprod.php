<?php

	include('session.php');

	
	
	$sql= "select productcode, productname, quantityinstock from products;";

	
	$resultado1 = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($resultado1) > 0) {
		 echo "<table border=1";
		 //recorre el resultado fila a fila 
				echo "<tr>";
				echo "<td>Codigo de Producto</td>";
				echo "<td>Nombre</td>";
				echo "<td>Cantidad en Stock</td>";
				echo "</tr>";		
		 while ($fila = mysqli_fetch_assoc($resultado1)) {
				echo "<tr>";
					echo "<td>".$fila["productcode"]."</td>";
					echo "<td>".$fila["productname"]."</td>";
					echo "<td>".$fila["quantityinstock"]."</td>";
				echo "</tr>";
			}
		echo "</table>";
		} else {
		echo "No existen productos";
	}					
	
	
	
?>