<head>
<link rel="stylesheet" href="assets/style/popupinformation.css">
</head>
<?php

// KONEKSI DATABASE
$conn = mysqli_connect("localhost", "root", "", "monitoringwisata");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){ 
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $latitude = htmlspecialchars($data["latitude"]);
    $longtitude = htmlspecialchars($data["longtitude"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    if ($keterangan == "Resto") {
        $id_tipe = "1";
    } elseif ($keterangan == "Gunung") {
        $id_tipe = "2";
    } elseif ($keterangan == "Danau") {
        $id_tipe = "3";
    } elseif ($keterangan == "Bangunan Sejarah") {
        $id_tipe = "4";
    } elseif ($keterangan == "Mall") {
        $id_tipe = "5";
    }

    // UPLOAD GAMBAR
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO wisata
                VALUES
                ('', '$nama', '$gambar', '$alamat', '$latitude', '$longtitude', '$keterangan', '$id_tipe')
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // CEK ADA GAMBAR YANG DI UPLOAD ATAU TIDAK
    if ($error === 4) {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Pilih Gambar Terlebih Dahulu !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
        return false;
    }
    // CEK FILE YANG DI UPLOAD
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">File yang diUpload bukan Gambar !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
        return false;
    }

    // CEK UKURAN FILE
    if ($ukuranFile > 3000000) {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Ukuran Gambar Terlalu Besar !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
        return false;
    }

    // GAMBAR SIAP DIUPLOAD
    move_uploaded_file($tmpName,'assets/img/' . $namaFile);
    return $namaFile;


}


function hapus($id){

    global $conn;
    mysqli_query($conn, "DELETE FROM wisata WHERE id = $id" );
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $gambar = $data["gambar"];
    $alamat = htmlspecialchars($data["alamat"]);
    $latitude = htmlspecialchars($data["latitude"]);
    $longtitude = htmlspecialchars($data["longtitude"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    if ($keterangan == "Resto") {
        $id_tipe = "1";
    } elseif ($keterangan == "Gunung") {
        $id_tipe = "2";
    } elseif ($keterangan == "Danau") {
        $id_tipe = "3";
    } elseif ($keterangan == "Bangunan Sejarah") {
        $id_tipe = "4";
    } elseif ($keterangan == "Mall") {
        $id_tipe = "5";
    }

    // // UPLOAD GAMBAR
    // $gambar = upload();
    // if (!$gambar) {
    //     return false;
    // }

   $query = "UPDATE wisata SET
                nama ='$nama',
                gambar ='$gambar',
                alamat ='$alamat',
                latitude ='$latitude',
                longtitude ='$longtitude',
                ket ='$keterangan',
                id_tipe ='$id_tipe'
                WHERE id ='$id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM wisata
                WHERE
                ket LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'
            ";
    return query($query);
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]); 
    $password2 = mysqli_real_escape_string($conn, $data["password2"]); 

    // CEK USERNAME UDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Username Sudah Terdaftar !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
        return false;
    }

    // KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo '<div id="tampil_modal">
                    <div id="modal_gagal">
                    <div id="modal_atas_gagal">Informasi</div>
                    <p id="paragraf">Pasword Tidak Sama !!!</p>
                    <a href="?page=wisata"><button id="oke_gagal">Oke</button></a>
                    </div>
                </div>';
        return false;
    }
    // ENKRIPSI PASSWORD

    $password = password_hash($password, PASSWORD_DEFAULT);
    // DITAMBAHKAN DI DATABSE
    $query = "INSERT INTO user VALUES('', '$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}

?>