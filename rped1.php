<?php

	include('session.php');

		//REQUEST PRODUCTOS,  CLIENTE ID A TRAVES DE LA SESSION 
	$nCli=$_SESSION['session_id'];
	$prod1=$_REQUEST['uno']; 
	$prod2=$_REQUEST['dos']; 
	$prod3=$_REQUEST['tres']; 
	$prod4=$_REQUEST['cuatro']; 
	$prod5=$_REQUEST['cinco']; 
	
	// echo $prod1."<br>"; 
	// echo $prod2."<br>"; 
	// echo $prod3."<br>"; 
	// echo $prod4."<br>"; 
	// echo $prod5."<br>"; 
	
		//CANTIDAD PRODUCTO
	$cant1=$_REQUEST['cantidadp1']; 
	$cant2=$_REQUEST['cantidadp2']; 
	$cant3=$_REQUEST['cantidadp3']; 
	$cant4=$_REQUEST['cantidadp4']; 
	$cant5=$_REQUEST['cantidadp5']; 
	
		//STOCK PRODUCTOS SELECCIONADOS
	$stock1=stockProd($prod1, $db);
	$stock2=stockProd($prod2, $db);
	$stock3=stockProd($prod3, $db);
	$stock4=stockProd($prod4, $db);
	$stock5=stockProd($prod5, $db);
	
	// echo $stock1."<br>"; 
	// echo $stock2."<br>"; 
	// echo $stock3."<br>"; 
	// echo $stock4."<br>"; 
	// echo $stock5."<br>"; 
	
	
	
	//LLAMADAS A FUNCIONES 
	
	
		//NUMERO DE PEDIDO 
	$numPed=numPedMax($db, $nCli); 
	//echo $numPed."<br>"; 
		
		//CODIGO DE PRODUCTO 
	$cp1=codigoP($db, $prod1);
	$cp2=codigoP($db, $prod2);
	$cp3=codigoP($db, $prod3);
	$cp4=codigoP($db, $prod4);
	$cp5=codigoP($db, $prod5);
	//echo $cp1."<br>"; 
	
		//PRECIO PRODUCTO 
	
	$pp1=precioProducto($db, $prod1); 
	$pp2=precioProducto($db, $prod2); 
	$pp3=precioProducto($db, $prod3); 
	$pp4=precioProducto($db, $prod4); 
	$pp5=precioProducto($db, $prod5); 
	// echo $pp1; 
	// echo "<br>"; 
	
	
		
	//FECHAS PARA LA TABLA ORDERS
	
		//FECHA PEDIDO
	$hoy=date("Y-m-d");
		//REQUIRED DATE
	$requireddate=strtotime('+10 day', strtotime($hoy ));  
	$requireddate=date('Y-m-d', $requireddate);
		//SHIPPEDDATE
	$shippeddate=strtotime('+5 day', strtotime($hoy ));  
	$shippeddate=date('Y-m-d', $shippeddate);
	
	// echo $hoy."<br>"; 
	// echo $requireddate."<br>"; 
	// echo $shippeddate."<br>"; 
	
	
	
	
	
	
		//INSERT EN TABLA ORDERS LLAMANDO A LA FUNCION
	insertOrders($db, $numPed, $hoy, $requireddate, $shippeddate, $nCli);

		//INSERT EN LA TABLA ORDERDETAILS LLAMANDO A LA FUNCION
	$orderline=1;
	insertOrderDetails($db, $numPed, $cp1, $cant1, $pp1, $orderline);  
	$orderline++;
	insertOrderDetails($db, $numPed, $cp2, $cant2, $pp2, $orderline);  
	$orderline++;
	insertOrderDetails($db, $numPed, $cp3, $cant3, $pp3, $orderline);  
	$orderline++;
	insertOrderDetails($db, $numPed, $cp4, $cant4, $pp4, $orderline);  
	$orderline++;
	insertOrderDetails($db, $numPed, $cp5, $cant5, $pp5, $orderline);  
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	//INSERT EN ORDERS 
	
	function insertOrders($db, $numPed, $fpedido, $fechare, $fenv, $nCli){
	
		$sql="insert into orders(ordernumber, orderdate, requireddate, shippeddate, status, comments, customernumber)
				values($numPed, '$fpedido', '$fechare', '$fenv', 'Shipped', null, $nCli)";
				
				
		if (mysqli_query($db, $sql)) {
		echo "Pedido realizado correctamente<br>";
		} else {
		echo "Error insert: " . mysqli_error($db);
		}
	
	
	}
	
	
	
		//INSERT EN ORDERDETAILS 
	
	function insertOrderDetails($db, $numPed, $codProd, $cantidad, $preciouni, $orderline){
	
		
		$sql="insert into orderdetails(ordernumber, productCode, quantityordered, priceEach, orderlinenumber)
				values($numPed, '$codProd', $cantidad, $preciouni, $orderline)";
				
				
		if (mysqli_query($db, $sql)) {
		echo " insert orderdetails correctamente<br>";
		} else {
		echo "Error insert: " . mysqli_error($db);
		}
	
	
	}
	
	
	
	
	
	
	
	//FUNCION PARA SACAR EL PRECIO DE CADA PRODUCTO 
	
	function precioProducto($db, $p) {
		
		$sql="select buyprice from products where productName='$p'";
		$resultado1 = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($resultado1) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				$precio=$fila['buyprice']; 
			}
			
		}
		else {
			echo "No existen pedidos";
		}	
		
		//echo "<br>codigo de producto".$cProd;
		return $precio; 
		
	}
	
	
	
	
	
	//FUNCION PARA SACAR EL CODIGO DE PRODUCTO 
	function codigoP($db, $produc){
	
		$sql="select productCode from products where productName='$produc'";
		$resultado1 = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($resultado1) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				$cProd=$fila['productCode']; 
			}
			
		}
		else {
			echo "No existen pedidos";
		}	
		
		//echo "<br>codigo de producto".$cProd;
		return $cProd; 
	}
	
	

	
	
	
	
	//FUNCION PARA SACAR EL CODIGO DE PEDIDO SIGUIENTE AL ULTIMO
	function numPedMax($db){
	
	$sql="select max(orderNumber) as numPed from orders";
	$resultado1 = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($resultado1) > 0) {
		while ($fila = mysqli_fetch_assoc($resultado1)) {
			$numPed=$fila['numPed']+1; 
		}
		
	}
	else {
		echo "No existen pedidos";
	}	
	
	
	return $numPed; 

	}
	
	
	
	
	//FUNCION PARA SACAR EL STOCK DE CADA PRODUCTO SELECCIONADO
	function stockProd($producto, $db){
	
		$sql="select quantityInStock from products where productName='$producto'";
		$resultado1 = mysqli_query($db, $sql);
		
		if (mysqli_num_rows($resultado1) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado1)) {
				$stock=$fila['quantityInStock']; 
			}
			
		}
		else {
			echo "No existen productos";
		}	

		return $stock; 
	}
	
	// echo "<input type='button' value='Menu' onclick='welcome.php'><br>";
	
	
?>