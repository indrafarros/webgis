<?php
@session_start();
include './../koneksi/koneksi.php';
    $username = $_POST['user'];
    $password = md5($_POST['pas']);
    $sql = "select * from admin where username='".$username."' and password='".$password."'";
    $query = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
        $row = mysqli_num_rows($query);
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $cid=mysqli_fetch_array($query);
            $_SESSION['adm']=$cid['id_admin'];
            $_SESSION['nama']=$cid['nama'];
            $_SESSION['level']=$cid['level'];
             $_SESSION['foto']=$cid['foto'];
            $_SESSION['isLoggedIn']='admin';
            $_SESSION['user']=$username;
            header('Location: ../admin');
        }else{
          echo "<script type='text/javascript'>
		alert('Username Atau Password Anda Salah..!');
	</script>";
	echo "<script> window.history.back(); </script>";

        }
?>