<?php
$conn = mysqli_connect("localhost", "root","", "voting");
function register($data){
    global $conn;
    $id = stripslashes($data["id_pengguna"]);
    $nama =stripslashes($data["name"]);
    $token =stripslashes($data["token"]);
    $email =stripslashes($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM pengguna WHERE email = '$email'");
	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
		return false;
	}
    //cek konfirmasi password
    if($password !== $password2){
        echo"<script>
        alert('konfirmasi password tidak sesuai') </script>";
        return false;
    }
    $res = mysqli_query($conn, "SELECT * FROM token WHERE token = '$token'");
	if($id == 1) {
         // enkripsi password
         $password = password_hash($password, PASSWORD_DEFAULT);
         //tambahkan user baru ke-database
         mysqli_query($conn, "INSERT INTO pengguna VALUES('$id','$nama', '$email', '$password','')"); 
         echo "<script>
         alert('admin!')
         document.location.href = 'login.php';
         </script>";
         return mysqli_affected_rows($conn);
    }elseif(mysqli_fetch_assoc($res) ){
         // enkripsi password
         $password = password_hash($password, PASSWORD_DEFAULT);
         //tambahkan user baru ke-database
         mysqli_query($conn, "INSERT INTO pengguna VALUES('$id','$nama', '$email', '$password','')"); 
         $sql2 = $conn->query("SELECT * FROM token WHERE token = '$token'");
         $data  = $sql2->  fetch_assoc();
         $sql2 =$conn->query("DELETE FROM token WHERE token = '$token'");
         return mysqli_affected_rows($conn);
         echo "<script>
                 alert('Anda terdaftar sebagai user!')
                 document.location.href = 'login.php';
               </script>";
    }else{
        echo "<script>
				alert('Anda token!')
                document.location.href = 'register.php';
		      </script>";
              return false;
        }
}

?>