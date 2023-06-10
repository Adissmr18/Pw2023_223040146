<?php 
function koneksi()
{
	$scann = mysqli_connect("localhost","root","") or die("koneksi Ke DB gagal!");
    mysqli_select_db($scann,"pw_126") or die("Database Salah");
	return $scann;
}

function query($sql)
{
	$scann = koneksi();
	$results = mysqli_query($scann,"$sql");

	$rows = [];
	while ($row = mysqli_fetch_assoc($results)) {
		$rows[]= $row;
	};
	return $rows;
}

// function Tambah($data)
// {
// 	$scann = koneksi();
// 	$Gambar_File=$_FILES['fname']['name'];
// 	$Nama = htmlspecialchars($data['Nama']);
// 	$Berasal = htmlspecialchars($data["Berasal"]);
// 	$Tujuan = htmlspecialchars($data["Tujuan"]);
// 	$Deskripsi = htmlspecialchars($data["Deskripsi"]);
// 	$Gambar = $Gambar_File;
//         // echo ($Gambar_File);
//         move_uploaded_file($_FILES ['fname']['tmp_name'],"../assets/img/".$Gambar_File);
// 	$queryTambah = "INSERT INTO budaya_indonesia VALUES('','$Nama','$Berasal','$Tujuan','$Deskripsi','$Gambar')";
// 	mysqli_query($scann, $queryTambah);
// 	return mysqli_affected_rows($scann);
// }


function Tambah($data)
{
	$scann = koneksi();
	$Nama = htmlspecialchars($data['Nama']);
	$Berasal = htmlspecialchars($data["Berasal"]);
	$Tujuan = htmlspecialchars($data["Tujuan"]);
	$Deskripsi = htmlspecialchars($data["Deskripsi"]);
	
	$Gambar = upload();
	if(!$Gambar){
		return false;
	}

	$queryTambah = "INSERT INTO budaya_indonesia VALUES('','$Nama','$Berasal','$Tujuan','$Deskripsi','$Gambar')";
	mysqli_query($scann, $queryTambah);
	return mysqli_affected_rows($scann);
}

// function upload(){
// 	$namaFile = $_FILES['Gambar']['name'];
// 	$ukuranFile = $_FILES['Gambar']['size'];
// 	$error = $_FILES['Gambar']['error'];
// 	$tmpName = $_FILES['Gambar']['tmp_Name'];
	
// 	// Cek apakah tidak ada gambar yang di upload
// 	if ($error === 4) {
// 		echo "<script>
// 			alert('Pilih Gambar Terlebih Dahulu!');
// 		</script>";
// 		return false;
// 	}
	
// 	// Cek apakah yang di upload gambar atau bukan 

// 	$ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif'];
// 	$ekstensiGambar = explode('.', $namaFile);
// 	$ekstensiGambar = strtolower(end($ekstensiGambar));
// 	if (!in_array($ekstensiGambar, $ekstensiGambarValid)){

// 		echo "<script>
// 					alert('Yang Anda Upload Bukan Gambar!');
// 				</script>";
// 				return false;
// 	}

// 	// Cek jika ukuran nya terlalu besar

// 	if ($ukuranFile > 1000000){
// 		echo "<script>
// 				alert('Ukuran Gambar Terlalu besar');
// 			</script>";
// 			return false;
// 	}

// 	// Generate nama gambar baru

	
// 	// Jika lolos Pengecekan gambar siap upload

// 	move_uploaded_file($tmpName, 'img/' . $namaFile);
// 	return $namaFile;
	
// }

function upload(){
	$namaFile = $_FILES['Gambar']['name'];
	$ukuranFile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];
	
	// Cek apakah tidak ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
			alert('Pilih Gambar Terlebih Dahulu!');
		</script>";
		return false;
	}
	
	// Cek apakah yang di upload gambar atau bukan 
	$ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)){

		echo "<script>
					alert('Yang Anda Upload Bukan Gambar!');
				</script>";
				return false;
	}

	// Cek jika ukuran nya terlalu besar
	if ($ukuranFile > 10000000){
		echo "<script>
				alert('Ukuran Gambar Terlalu besar');
			</script>";
			return false;
	}

	// Generate nama file biar tidak tertimpa jika sama

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// Jika lolos Pengecekan gambar siap upload
	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}


// function upload(){
// 	return false;
// 	$Gambar_File = $_FILES['fname']['name'];
// 	$Ukuran_File = $_FILES['fname']['size'];
// 	$error = $_FILES['fname']['error'];
// 	$tmpName = $_FILES['fname']['tmpName'];
	
// 	// Cek apakah tidak ada gambar yang di upload
// 	// Cek apakah tidak ada gambar yang di upload
// 	// Cek apakah tidak ada gambar yang di upload
// 	if ($error == 4) {
// 		echo "<script>
// 			alert('Pilih Gambar Terlebih Dahulu!');
// 		</script>";
// 		return false;
// 	}

// }
// 	$Gambar = $Gambar_File;
//         // echo ($Gambar_File);
//         move_uploaded_file($_FILES ['fname']['tmp_name'],"/".$Gambar_File);
// 	mysqli_query($scann, $queryTambah);
// }


function Hapus($id)
{
	$scann = koneksi();
	mysqli_query($scann,"DELETE FROM budaya_indonesia WHERE id = $id");
	return mysqli_affected_rows($scann);
}


function ubah($data)
	{	$scann =koneksi();
		
		$id = $data["Id"];
		$Nama = htmlspecialchars($data["Nama"]);
		$Berasal= htmlspecialchars($data["Berasal"]);
		$Tujuan = htmlspecialchars($data["Tujuan"]);
		$Deskripsi = htmlspecialchars($data["Deskripsi"]);
		$gambarLama = htmlspecialchars($data["GambarLama"]);
		
		// Cek apakah user pilih gambar baru atau tidak
		if ($_FILES['Gambar']['error'] === 4 ){
			$Gambar = $gambarLama;
		} else {
			$Gambar = upload();
		}
		
		
		$query= "UPDATE budaya_indonesia SET Nama = '$Nama',
				 Berasal = '$Berasal',
				 Tujuan = '$Tujuan',
				 Deskripsi = '$Deskripsi',
				 Gambar = '$Gambar'
				
		 WHERE Id = $id;";
		//  var_dump($Gambar_File);
		mysqli_query($scann, $query);
		return mysqli_affected_rows($scann);
	}



// function ubah($data)
// 	{	$scann =koneksi();
// 		$Gambar;
// 		$Gambar_File=$_FILES['Gambar']['name'];
// 		$id = $data["Id"];
// 		$Nama = htmlspecialchars($data["Nama"]);
// 		$Berasal= $data["Berasal"];
// 		$Tujuan = htmlspecialchars($data["Tujuan"]);
// 		$Deskripsi = htmlspecialchars($data["Deskripsi"]);
// 		if ($Gambar_File!="") {
// 			$Gambar=$Gambar_File;
// 		}else{
// 			$Gambar=$_POST['old'];
// 		}
		

// 		$query= "UPDATE budaya_indonesia SET Nama = '$Nama',
// 				 Berasal = '$Berasal',
// 				 Tujuan = '$Tujuan',
// 				 Deskripsi = '$Deskripsi',
// 				 Gambar = '$Gambar'
				
// 		 WHERE Id = $id;";
// 		 var_dump($Gambar_File);
// 		mysqli_query($scann, $query);
// 		return mysqli_affected_rows($scann);
// 	}


function signup($data){
	global $scann;
	$scann = koneksi();
	$username = strtolower(stripcslashes(($data["username"])));
	$password = mysqli_real_escape_string($scann, $data["password"]);	    
	$password2 = mysqli_real_escape_string($scann, $data["password2"]);	    
	
	// Cek konfirmasi password

	if($password !== $password2) {
		echo "<script>
		alert('Konfirmasi Passwod Tidak Sesuai!')
		</script>";
		return false;
	}

	// cek username sudah ada atau belum
    
	$result = mysqli_query($scann, "SELECT username FROM user WHERE username = '$username'");	

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('Username sudah ada!');
			</script>";
        return false;

	}

	// Enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// var_dump($password); die;


	// 	TAMBAHKAN USER BARU

	mysqli_query($scann, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($scann);
}



 ?>