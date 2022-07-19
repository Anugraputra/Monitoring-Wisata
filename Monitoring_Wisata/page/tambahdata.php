<?php
require "functions.php";
// BUTTON SAVE DITEKAN
if (isset($_POST["simpan"])) {
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('Data Berhasil di Tambahkan!');
				document.location.href = '?page=wisata';
			</script>
			";
    } else {
        echo "
			<script>
			    alert('Data Gagal di Tambahkan!');
				document.location.href = '?page=wisata';
			</script>
			";
    }   
}

?>


<html>
    <head>
    <link rel="stylesheet" href="assets/style/style.css">
    </head>
    <body>
    <div class="jumbotron">
		<h3 class="display-4 text-center text-dark">Tambah Data</h3>
		<hr class="my-2">
		<div class="container">
			<form method="post" action="" enctype="multipart/form-data" class="mt-3">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label" >Nama Wisata</label>
					<input type="text" name="nama" class="form-control" id="nama" required >
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Gambar</label>
					<input class="form-control" name="gambar" type="file" id="gambar"  >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Alamat</label>
					<input type="text" name="alamat" class="form-control" id="alamat" required >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Latitude</label>
					<input type="text" name="latitude" class="form-control" id="latitude" required >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Longtitude</label>
					<input type="text" name="longtitude" class="form-control" id="longtitude" required >
				</div>
				<div class="mb-3">
					<label for="exampleDataList" class="form-label">Keterangan</label>
					<input class="form-control" name="keterangan" list="datalistOptions" id="keterangan" required>
					<datalist id="datalistOptions">
					<option value="Resto">
					<option value="Gunung">
					<option value="Danau">
					<option value="Bangunan Sejarah">
					<option value="Mall">
					</datalist>
				</div>
				<button class="btn btn-primary rounded " type="submit" name="simpan"><img src="assets/icon/icons8-save-30.png" alt="" width="25" height="24"> Simpan</button>
				<a href="?page=wisata" class="btn btn-danger rounded" ><img src="assets/icon/icons8-back-arrow-30.png" alt="" width="25" height="24"> Kembali</a>
			</form>
		</div>
		
	</div>
    </body>
</html>