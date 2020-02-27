<?php
@session_start();
include './../koneksi/koneksi.php';
    $username = $_POST['user'];
    $password = md5($_POST['pass']);
    $sql = "SELECT * from member where username='".$username."' and password='".$password."' and stt='Diterima'";
    $query = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
        $row = mysqli_num_rows($query);
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $cid=mysqli_fetch_array($query);
            $_SESSION['us']=$cid['id_us'];
            $_SESSION['nik']=$cid['nik'];
            $_SESSION['nm']=$cid['nm_us'];
            $_SESSION['tgll']=$cid['tgl_lhr'];
            $_SESSION['jk']=$cid['jk'];
            $_SESSION['alm']=$cid['alm'];
            $_SESSION['nohp']=$cid['nohp'];
            $_SESSION['nik']=$cid['nik'];
            $_SESSION['id_lokasi']=$cid['id_lokasi'];
            $_SESSION['email']=$cid['email'];
            $_SESSION['isLoggedIn']='member';
            $_SESSION['user']=$username;
            header('Location: ../');
        }else{
          echo "<script type='text/javascript'>
		alert('Username Atau Password Anda Salah, Atau Akun anda masih belum aktif, silahkan hubungi administrator..!');
	</script>";
	echo "<script> window.location = '../'; </script>";

        }
?>