<?php

	header('Content-Type: application/json; charset=utf8');
	
	$con = mysqli_connect("localhost","root","","monitoringwisata");

	//query untuk menampilkan data maps dan icon image
	$sql="SELECT
			wisata.id,
			wisata.nama,
			wisata.alamat,
			wisata.latitude,
			wisata.longtitude,
			icon.tipe,
			icon.image_path
		FROM
			wisata
			LEFT JOIN icon ON wisata.id_tipe=icon.id_tipe";

	$query=mysqli_query($con, $sql);

	$array=array();
	while($data=mysqli_fetch_assoc($query)) $array[]=$data;	
	
	echo json_encode($array);
?>