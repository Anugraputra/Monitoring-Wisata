
<?php
session_start();
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
// if (!isset($_SESSION["login"])) {
// 	header("location: login.php");
// 	exit;
// }
?>

<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<title>
			<?php
			@$page = $_GET['page'];
				if (!empty($page)) {
					if ($page == 'home') {
						echo "Home";
					}elseif ($page == 'wisata') {
						echo "Wisata";
					}elseif ($page == 'galeri') {
						echo "Galeri";
					}elseif ($page == 'tambahdata') {
						echo "Tambah Data";
					}elseif ($page == 'editdata') {
						echo "Edit Data";
					}
				} else {
					echo "Home";
				}		
			?>
		</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-primary">
				<div class="container">
					<a class="navbar-brand text-light" href="?page=home">Nusantara</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ms-auto">
							<?php if ($_SESSION['login']):?>
							<li class="nav-item">
								<a class="btn btn-primary"  href="?page=home"><img src="assets/icon/icons8-home-30.png" alt="" width="25" height="24"></a>
							</li>
							<li class="nav-item">
								<a class="btn btn-primary " href="?page=wisata"><img src="assets/icon/icons8-form-30.png" alt="" width="25" height="24"></a>
							</li>
							<li class="nav-item">
								<a class="btn btn-primary" href="?page=galeri"><img src="assets/icon/icons8-image-30.png" alt="" width="25" height="24"></a>
							</li>
							<li class="nav-item">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="assets/icon/icons8-logout-30.png" alt="" width="25" height="24"></button>
							</li>
							<?php else:?>
							<li class="nav-item">
								<a class="btn btn-primary"  href="?page=home"><img src="assets/icon/icons8-home-30.png" alt="" width="25" height="24"></a>
							</li>
							<li class="nav-item">
								<a class="btn btn-primary" href="login.php"><img src="assets/icon/icons8-login-30.png" alt="" width="25" height="24"></a>
							</li>
							<?php endif;?>
						</ul>
					</div>
					<!-- POP UP LOGOUT -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="staticBackdropLabel">Log Out</h3>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
								<a type="button" href="logout.php" class="btn btn-danger">Log Out</a>
							</div>
							</div>
						</div>
					</div>
					</div>	
			</nav>
			<!-- Content here -->
			<?php
						@$page = $_GET['page'];
						if (!empty($page)) {
							switch ($page) {
								case 'home':
									include "page/home.php";
									break;
								case 'wisata':
									include "page/wisata.php"; 
									break;
	
								case 'galeri':
									include "page/gallery.php";
									break;
								case 'tambahdata':
									include "page/tambahdata.php";
									break;
								case 'editdata':
									include "page/editdata.php";
									break;
	
								default:
									include "page/home.php";
									break;
							} 
						} else {
							include "page/home.php";
						}
					?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
	</body>
</html>