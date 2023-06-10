<?php 
	require'..\helper\functions.php';

	session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

	if (isset($_POST['Tambah'])) {
		if (Tambah($_POST)>0) {
			echo "<script>
					alert('Data berhasil di Tambahkan!');
					document.location.href = 'dashboard.php';
				  </script>";
				  var_dump($_POST);
		}else{
			echo "<script>
					alert('Data gagal di Tambahkan!');
					document.location.href = 'dashboard.php';
				  </script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link href="..\assets\css\bootstrap.min.css" rel="stylesheet">
	<style type="">
			body{
				background-color: rgba(192,192,192,0.4);
			}
			.container{
			border: 1px solid black;
			height: auto;
			margin-top: 10px;
			background-color: white;
			border: 1px solid white;
			border:1px solid ;
			box-shadow: 0 0  10px black;
			margin-bottom: 30px;
			}
			.form-group{
				margin-top: 20px;
				margin-bottom: 20px;
				margin-left: 20px;
				margin-top: 20px;
			}
			h2{
				color: green;
			}
			h2:hover{
				color: blue;
			}
			button{
				width: 250px;
			}
	</style>
</head>
<body>
 
	<h2 class="text-title text-center"> Tambah Data Destination</h2>
	<div class="container">
	<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
					<label for="Nama">Nama Destination</label>
					<input type="text" name="Nama" id="Nama" class="form-control"></input>
			</div>
			<div class="form-group">
					<label for="Berasal">Lokasi </label>
					<input type="text" name="Berasal" id="Berasal" class="form-control"></input>
			</div>
			<div class="form-group">
					<label for="Tujuan">Tujuan  </label>
					<input type="text" name="Tujuan" id="Tujuan" class="form-control"></input>
			</div>
			<div class="form-group">
    				<label for="Deskripsi">Deskripsi</label>
    				<textarea class="form-control" id="Deskripsi" rows="3" name="Deskripsi"></textarea>
  			</div>
  			<div class="form-group">
				<label for="Gambar">Name file:</label>
  				<input type="file" id="Gambar" name="Gambar">
  			</div>
  			<div class="form-group">
					<button type="submit" name="Tambah" class="btn btn-success btn-lg">Tambah</button>
			</div>
		</form>
	</div>
			
		
	
</body>
</html>