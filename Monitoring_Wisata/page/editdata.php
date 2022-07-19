<?php
require "functions.php";
// AMBIL DATA DI URL
$id = $_GET["id"];
// QUERY DATA WISATA BERDASARKAN ID
$wst = query("SELECT * FROM wisata WHERE id = $id")[0];
// BUTTON EDIT DITEKAN
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo '<div id="tampil_modal">
                    <div id="modal_berhasil">
                    <div id="modal_atas_berhasil">Informasi</div>
                    <p id="paragraf">Data Berhasil di Update !!!</p>
                    <a href="?page=wisata"><button id="oke_berhasil">Oke</button></a>
                    </div>
                </div>';
    } else {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Data Gagal di Update !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
    } 
}
?>
<html>
    <head>
        <link rel="stylesheet" href="assets/style/style.css">
		<link rel="stylesheet" href="assets/style/popupinformation.css">
    </head>
    <body>
    <div class="jumbotron">
		<h3 class="display-4 text-center text-dark">Edit Data</h3>
		<hr class="my-2">
		<div class="container">
			<form method="post" action="" class="mt-3">
                <input type="hidden" name="id" value="<?= $wst["id"];?>">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label" >Nama Wisata</label>
					<input type="text" name="nama" class="form-control" id="nama" value="<?= $wst["nama"];?>" required >
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Gambar</label>
					<input class="form-control" name="gambar" type="file" id="gambar" value="<?= $wst["gambar"];?>"  >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Alamat</label>
					<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $wst["alamat"];?>" required >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Latitude</label>
					<input type="text" name="latitude" class="form-control" id="latitude" value="<?= $wst["latitude"];?>" required >
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Longtitude</label>
					<input type="text" name="longtitude" class="form-control" id="longtitude" value="<?= $wst["longtitude"];?>" required >
				</div>
				<div class="mb-3">
					<label for="exampleDataList" class="form-label">Keterangan</label>
					<input class="form-control" name="keterangan" list="datalistOptions" id="keterangan" value="<?= $wst["ket"];?>" required>
					<datalist id="datalistOptions">
					<option value="Resto">
					<option value="Gunung">
					<option value="Danau">
					<option value="Bangunan Sejarah">
					<option value="Mall">
					</datalist>
				</div>
				<button class="btn btn-primary rounded " type="submit" name="submit"><img src="assets/icon/icons8-save-30.png" alt="" width="25" height="24"> Simpan</button>
				<a href="?page=wisata" class="btn btn-danger rounded" ><img src="assets/icon/icons8-back-arrow-30.png" alt="" width="25" height="24"> Kembali</a>
			</form>
		</div>
		
	</div>    
    </body>
</html>