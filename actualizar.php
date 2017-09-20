<?php

//buscar. igual que consulta

try {
	
	$id = 5; //id que se actualizara
	
	$precio = 110; //nuevo precio
	$stock = 2;	 //nuevo stock
	
	
	$con = new PDO('mysql: host=localhost;dbname=tienda', 'root', '');
	$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//los valores ingresan como parametros  ( :aca_se_pone_el_nombre ) (en el comando sql se coloca el valor)
	$sql = "update productos set precio= :precio, stock= :stock 
			where id= :id";
		
	
	$stmt = $con->prepare($sql);	
	$stmt->bindParam(':precio', $precio);
	$stmt->bindParam(':stock', $stock);	
	$stmt->bindParam(':id', $id);
	
	$stmt->execute();
	
	//el insert solo ingresa registro asi que no necesitamos recuperar datos. No va el while.
	
	//podemos ver el id que se a generado con el metodo lastInsertId
	echo 'Registro Actualizado';
			
} catch (PDOException $e) {
	echo 'Error General:' . $e->getMessage();
}