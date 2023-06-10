<?php 
require'..\helper\functions.php';

session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
//ngambil data
$id = $_GET["Id"];
$budaya_indonesia = query("SELECT * FROM budaya_indonesia WHERE Id = $id")[0];
//cek apakah submi
	if (isset($_POST['ubah'])) {
		if(ubah($_REQUEST)>0){
			echo "<script>alert('data diubah');
		  document.location.href ='dashboard.php';
      </script>";
		}else{
			echo "<script>alert('data gagal diubah');
         document.location.href ='dashboard.php';
      </script>";
      var_dump($_POST);
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data</title>
  <link href="..\assets\css\bootstrap.min.css" rel="stylesheet">
  <style>body{
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
        color: blue;
      }
      h2:hover{
        color: green;
      }
      button{
        width: 250px;
      }
  </style>
</head>
<body>
  <h2 class="text-title text-center"> Ubah Data Destination</h2>
  <div class="container">
  <form action="" method="post"  enctype="multipart/form-data">
  <input type="hidden" name="Id" value="<?php echo $budaya_indonesia['Id']; ?>"></input>

      <div class="form-group">
          <label for="Nama">Nama Destinasi </label>
          <input type="text" name="Nama" id="Nama" class="form-control" value="<?php echo $budaya_indonesia['Nama']; ?>" ></input>
      </div>
      <div class="form-group">
          <label for="Berasal">Berasal  </label>
          <input type="text" name="Berasal" id="Berasal" class="form-control" value="<?php echo $budaya_indonesia['Berasal']; ?>"></input>
      </div>
      <div class="form-group">
          <label for="Tujuan">Tujuan  </label>
          <input type="text" name="Tujuan" id="Tujuan" class="form-control" value="<?php echo $budaya_indonesia['Tujuan']; ?>"></input>
      </div>
      <div class="form-group">
            <label for="Deskripsi">Deskripsi</label>
            <textarea class="form-control" id="Deskripsi" rows="3" name="Deskripsi" value="<?php echo $budaya_indonesia['Deskripsi']; ?>"><?php echo $budaya_indonesia['Deskripsi']; ?></textarea>
        </div>
        <div class="form-group">
				<label for="fname">Nama File:</label>

  				<input type="file" id="Gambar" name="Gambar"value="<?php echo $budaya_indonesia['Gambar']; ?>">
          <br>
          <img src="../assets/img/<?php echo $budaya_indonesia['Gambar']; ?>" width="300" height="170" >

          <input type="hidden" name="gambarLama" value="<?php echo $budaya_indonesia['Gambar']; ?>"></input>

         
          
  			</div>
        <div class="form-group">
          <button type="submit" name="ubah" value="Update" class="btn btn-primary btn-lg">Ubah Data Budaya</button>
      </div>
      </form>
  </div>

</body>
</html>