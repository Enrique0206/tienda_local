<?php

//buscar. igual que consulta

try {
	
	$categorias_id = 2;
	$nombre = 'window';
	$descripcion = 'window phone';
	$precio = 200;
	$stock = 5;
	
	
	$con = new PDO('mysql: host=localhost;dbname=tienda', 'root', '');
	$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//los valores ingresan como parametros  ( :aca_se_pone_el_nombre ) (en el comando sql se coloca el valor)
	$sql = "insert into productos (categorias_id, nombre, descripcion, precio, stock)
			values (:categorias_id, :nombre, :descripcion, :precio, :stock)";
		
	
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':categorias_id', $categorias_id);  //aplicando metodo bindParam para ingresar cada uno de los datos
	$stmt->bindParam(':nombre', $nombre);
	$stmt->bindParam(':descripcion', $descripcion);
	$stmt->bindParam(':precio', $precio);
	$stmt->bindParam(':stock', $stock);	
	
	$stmt->execute();
	
	//el insert solo ingresa registro asi que no necesitamos recuperar datos. No va el while.
	
	//podemos ver el id que se a generado con el metodo lastInsertId
	echo 'Registro Insertado ID: ' . $con->lastInsertId();
			
} catch (PDOException $e) {
	echo 'Error General:' . $e->getMessage();
}