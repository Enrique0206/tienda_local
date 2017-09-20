<?php

//conectando a la base de datos msyql

try {
	
	$con = new PDO('mysql: host=localhost;dbname=tienda', 'root', '');
	$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*echo 'conexion ok';
var_dump($con);*/
	
	//armando consulta en la variable sql
	$sql = "select p.id, p.categorias_id,c.nombre as categorias_nombre, p.nombre, precio, stock, imagen, creado
			from productos p
			inner join categorias c on c.id=p.categorias_id
			where estado=1
			order by creado desc";
	
	//preparando sentencia y ejecutando la consulta a la bd	
	$stmt = $con->prepare($sql);
	$stmt->execute();
	
	//capturando el registro en forma de objeto con fetchObject
	//$registro = $stmt->fetchObject();
	
	//el fetchObject devuelve solo el primer registro, entonces haremos un while
	
	while ($registro = $stmt->fetchObject()) {
		$lista[] = $registro;
	}
	
	
	//mostrando registro
	//var_dump($registro);
	
	//mostrando todo el registro completo
	var_dump($lista);
	

	
} catch (PDOException $e) {
	echo 'Error General:' . $e->getMessage();
}