<?php
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "skm_kp");
	define (DB_HOST, "localhost");

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	$sql = "SELECT id_pertanyaan FROM pertanyaan 
			WHERE id_pertanyaan LIKE '%".$_GET['query']."%'
			LIMIT 10"; 


	$result = $mysqli->query($sql);
	$json = [];

	while($row = $result->fetch_assoc()){
	     $json[] = $row['id_pertanyaan'];
	}

	echo json_encode($json);

?>