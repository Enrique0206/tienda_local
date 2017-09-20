<?php

//buscar. igual que consulta

try {
	
	$con = new PDO('mysql: host=localhost;dbname=tienda', 'root', '');
	$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "select p.id, p.categorias_id,c.nombre as categorias_nombre, p.nombre, precio, stock, imagen, creado
		from productos p
		inner join categorias c on c.id=p.categorias_id
		where estado=1 and p.nombre like '%intel%'
		order by creado desc";
		
	//para ver el uso de comodin para evitar inyectar codigo al sql ver  1.40 min video 1/7/2017
	$stmt = $con->prepare($sql);
	$stmt->execute();
	
	
	
	while ($registro = $stmt->fetchObject()) {
		$lista[] = $registro;
	}
	
	var_dump($lista);
		
} catch (PDOException $e) {
	echo 'Error General:' . $e->getMessage();
}