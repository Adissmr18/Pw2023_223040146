<?php 	

  session_start();
  if(!isset($_SESSION["login"])){
      header("Location: login.php");
      exit;
  }

		require '../helper\functions.php';
		$budaya_indonesia = query("SELECT * FROM budaya_indonesia");



  if(isset($_GET["cari"])){
  $keyword = $_GET["keyword"];
  $query="SELECT * FROM budaya_indonesia WHERE 
  Nama LIKE '%$keyword%'
  OR Berasal LIKE'%$keyword%'
  OR Tujuan LIKE '%$keyword%'
  OR Deskripsi LIKE '%$keyword%'";
  $budaya_indonesia = query($query);
  
}else{
  
  $query="SELECT * FROM budaya_indonesia";
  $budaya_indonesia = query($query);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
    <div id="content">
       <div class="header">
          <h2><span>Daftar Destination Indonesia</span></h2>
          <div class="profile">
            <a href="logout.php" class="nav-item nav-link">
              <span class="photo"><span>LogOut</span></span>
            </a>
             <label>Trip Nusantara</label>
          </div>
       </div>
       <div class="page">
          <div class="wrapper">
             <div class="row">
                <div class="col">
                    <div class="row">
                      <div class="col">
                        <button class="btn btn-outline-dark my-2 my-sm-0" value="Tambah" type="submit" name="cari"><a href="tambah.php">Tambah Data Destinasi Indonesia </a></button>
                        
                      </div>
                      <div class="col">
                        <form action="" method="get">
                          <div class="search-box" action="" method="get">
                            <label>Pencarian Destinasi berdasarkan nama, tujuan, lokasi</label>
                            
                            <input class="form-control mr-sm-4" type="search" placeholder="Destination Search" aria-label="Search" name="keyword" id="s">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="cari"><i class="fa fa-search"></i></button>
                          </div>
                        </form>
                    </div>
                  </div>
                   <table class="table">
                    <thead>
                      <tr class="first">
                        <th class="a-center">Image</th>
                        <th class="a-center">Detail</th>
                        <th class="a-center">Nama Destination</th>
                        <th class="a-center">Tujuan</th>
                        <th class="a-center">Lokasi</th>
                        <th class="a-center">Opsi</th>
                      </tr>
                    </thead>
                    <?php if (empty($budaya_indonesia)):?>
                    <tr>
                    <td colspan="12"><h1 class="a-center">Data tidak ditemukan.</h1></td>
                    </tr>
                    <?php else: ?>
                     
                    <?php 	$i=1; ?>   	
                    <?php 	foreach ($budaya_indonesia as $key ) :?>
                    <tbody>
                      <tr>
                        <td><img src="..\assets\img\<?= $key['Gambar']; ?>" width="200" height="100"></td>
                        <td class="a-justify"><?php 	echo $key["Deskripsi"]; ?></td>
                        <td class="a-center"><?php 	echo $key["Nama"]; ?></td>
                        <td class="a-center"><?php 	echo $key["Tujuan"]; ?></td>
                        <td class="a-center"><?php 	echo $key["Berasal"]; ?></td>
                        <td class="a-center">
                          <a href="ubah.php?Id=<?= $key['Id']; ?>" class="btn btn-primary" style="margin-top: 50px;width: 80px; ">Ubah</a>
                          <a href="hapus.php?Id=<?= $key['Id']; ?>" class="btn btn-danger" style="margin-top: 20px; margin-left: -40;"onclick="confirm('Apakah anda ingin menghapus data ini?');">Hapus</a>
                        </td>
                      </tr>
                      <?php 	$i++; ?>
                      <?php 	endforeach; ?>
                      <?php endif; ?>
                      </tbody>
                  </table>
                  
                </div>
             </div>
          </div>
       </div>
     </div>


<!-- Live Search -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#s').on('keyup', function(){
        var keyword = $(this).val().toLowerCase();
        $('tbody tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
        });
        if($('.destination:visible').length == 0){
            $('#notfound').show();
        } else {
            $('#notfound').hide();
        }
    });
});
</script>


     <script src="js/dashboard.js"></script>
  </body>
</html>