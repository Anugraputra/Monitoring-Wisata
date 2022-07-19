<?php
require "functions.php";

// TAMBAH DATA
// BUTTON SAVE DITEKAN
if (isset($_POST["simpan"])) {
    if (tambah($_POST) > 0) {
        echo '<div id="tampil_modal">
                    <div id="modal_berhasil">
                    <div id="modal_atas_berhasil">Informasi</div>
                    <p id="paragraf">Data Berhasil di tambahkan !!!</p>
                    <a href="?page=wisata"><button id="oke_berhasil">Oke</button></a>
                    </div>
                </div>';
    } else {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Data Gagal di tambahkan !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
    }   
}

// PAGENATION
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM wisata"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// AMBIL DATA DARI TABLE WISATA
$wisata = query("SELECT * FROM wisata LIMIT $awalData, $jumlahDataPerHalaman");
// TOMBOL CARI DITEKAN
if (isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
// if (isset($_POST['cari'])) {
//     $wisata = cari($_POST["keyword"]);
// }

?>
<html> 
    <head>
        <link rel="stylesheet" href="assets/style/wisata.css">
        <link rel="stylesheet" href="assets/style/popupinformation.css">
    </head>
    <body>
    <div class="jumbotron ">
    
    <h3 class="display-4 text-center text-dark">Wisata</h3>
    <hr class="my-2">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading  mt-3">
                <form class="form-inline" action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class=" border border-primary p-1 me-2 rounded " size="25" placeholder="Masukan Keyword Pencarian..." aria-describedby="button-addon2" autofocus autocomplete="off" >
                        <button class="btn btn-primary rounded me-2" type="submit" name="cari"><img src="assets/icon/icons8-search-30.png" alt="" width="25" height="24"></button>
                        <!-- <a href="?page=tambahdata" class="btn btn-success rounded" ><img src="assets/icon/icons8-add-30.png" alt="" width="25" height="24"></a> -->
                        <button type="button" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#tambahdata" data-bs-whatever="@mdo"><img src="assets/icon/icons8-add-30.png" alt="" width="25" height="24"></button>
                    </div>
                </form>
            </div>
            <table class="table table-primary table-striped p-3">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Alamat</th>
                    <th>Latitude</th>
                    <th>Longtitude</th>
                    <th>Keterangan</th>
                    <th style="width: 110;">Aksi</th>
                </tr> 
                <?php $no = 1;?>
                <?php foreach ($wisata as $row):?>   
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><img src="assets/img/<?php echo $row["gambar"];?>" alt="" width="100"></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["latitude"]; ?></td>
                        <td><?= $row["longtitude"]; ?></td>
                        <td><?= $row["ket"]; ?></td>
                        <td>
                            <a href="?page=editdata&id=<?=$row["id"];?>" class="btn btn-success rounded mx-1"><img src="assets/icon/icons8-edit-30.png" alt="" width="15" height="14"></a><a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm('Hapus data?')" class="btn btn-danger rounded"><img src="assets/icon/icons8-delete-30.png" alt="" width="15" height="14"></a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach; ?>
                </table>

                <div class="pagenation">
                    <?php for ($i=1; $i <= $jumlahHalaman; $i++):?> 
                    <?php if ($i == $halamanAktif): ?>
                        <a href="?page=wisata&halaman=<?= $i; ?>" class="btn btn-primary rounded" ><?= $i;?></a>
                        <?php else : ?>
                        <a href="?page=wisata&halaman=<?= $i; ?>" class="btn btn-primary rounded"><?= $i;?></a>
                        <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>    
    </div>  
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambahdataLabel">Tambah Data</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <!-- <a href="?page=wisata" class="btn btn-danger rounded" ><img src="assets/icon/icons8-back-arrow-30.png" alt="" width="25" height="24"> Kembali</a> -->
                    <div class="modal-footer">
                        <button class="btn btn-Success rounded " type="submit" name="simpan"><img src="assets/icon/icons8-save-30.png" alt="" width="25" height="24"> Simpan</button>
                        <!-- <button type="button" class="btn btn-danger"><img src="assets/icon/icons8-back-arrow-30.png" alt="" width="25" height="24"> Kembali</button> -->
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<script></script>
</body>
</html>