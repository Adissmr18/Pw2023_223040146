<?php 
	require'..\helper\functions.php';

	session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
	
	$id = $_GET['Id'];

	if (hapus($id)>0) {
		echo "<script>
				alert('data Berhasil dihapus');
				document.location.href ='dashboard.php';
			 </script>";
	}else{
		echo  "<script>
				alert('data gagal dihapus');
				document.location.href ='dashboard.php';
			 </script>";;
	}
 ?>