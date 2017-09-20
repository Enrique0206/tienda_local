<?php

//buscar. igual que consulta

try {
	
	$id = 6;	//el id que vamos a eliminar
		
	$con = new PDO('mysql: host=localhost;dbname=tienda', 'root', '');
	$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//los valores ingresan como parametros  ( :aca_se_pone_el_nombre ) (en el comando sql se coloca el valor)
	$sql = "delete from productos
			where id = :id";
		
	
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id);  //aplicando metodo bindParam eliminar id
		
	$stmt->execute();
	
	//el insert solo ingresa registro asi que no necesitamos recuperar datos. No va el while.
	
	//podemos ver el id que se a generado con el metodo lastInsertId
	echo 'Registro Eliminado';
			
} catch (PDOException $e) {
	echo 'Error General:' . $e->getMessage();
}