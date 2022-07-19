<?php
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');

require "functions.php";

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<markers>";
$query = mysqli_query($conn, "select * from wisata" ) or die(mysqli_error($conn, "select * from wisata"));
while ($data = mysqli_fetch_array($query)) {
echo "<marker id='".$data['id']."' nama='".$data['nama']."' gambar='".$data['gambar']."'  alamat='".$data['alamat']."' latitude='".$data['latitude']."' longtitude='".$data['longtitude']. "' keterangan='".$data['ket']."'/>";
}
echo "</markers>";
?>