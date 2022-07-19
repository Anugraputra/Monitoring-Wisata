<head>
<link rel="stylesheet" href="assets/style/popupinformation.css">
</head>
<?php
require "functions.php";
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo '<div id="tampil_modal">
                    <div id="modal_berhasil">
                    <div id="modal_atas_berhasil">Informasi</div>
                    <p id="paragraf">Data Berhasil di Hapus !!!</p>
                    <a href="index.php?page=wisata"><button id="oke_berhasil">Oke</button></a>
                    </div>
                </div>';
}else {
    echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Data Gagal di Hapus !!!</p>
                    <a href="index.php?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
}
?>