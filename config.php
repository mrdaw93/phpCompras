<?php
   define('DB_SERVER', '10.130.125.18');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'pedidos');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if (!$db) {
		die("Error conexión: " . mysqli_connect_error());
				}
  
?>
