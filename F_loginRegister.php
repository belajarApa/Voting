<?php
$conn = mysqli_connect("localhost", "root","", "voting");

function token ($data){
    global $conn;
    $token = htmlspecialchars($data ["token"]);
    $lihat = mysqli_query($conn, "SELECT * FROM pengguna");
    $rows = mysqli_fetch_assoc($lihat);
    if (mysqli_num_rows($lihat) === 0){
      echo "<script>alert('Anda pengguna pertama, maka anda menjadi admin');
      document.location.href = 'register.php?token=$token&idtitle=$token';
      </script>";
    }else{
    $cek = mysqli_query($conn, "SELECT * FROM token WHERE token = '$token'");
    $row = mysqli_fetch_assoc($cek);
    if (mysqli_num_rows($cek) === 1) {
      $id_title = $row["id_title"];
      echo "<script>alert('Token benar');
      document.location.href = 'register.php?token=$token&idtitle=$id_title';
      </script>";
  }else{
    echo "<script>alert('Token salah');
    </script>";
  }
    }
  }

function register($data){
    global $conn;
    $id = stripslashes($data["id_pengguna"]);
    $title =stripslashes($data["idtitle"]);
    $token =stripslashes($data["token"]);
    $email =stripslashes($data["email"]);
    $voted = '0';
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
         mysqli_query($conn, "INSERT INTO pengguna VALUES('','$id','', '$email', '$password','$voted')"); 
         echo "<script>
         alert('Anda terdaftar menjadi admin!')
         document.location.href = 'login.php';
         </script>";
         return mysqli_affected_rows($conn);
    }elseif(mysqli_fetch_assoc($res) ){
         // enkripsi password
         $password = password_hash($password, PASSWORD_DEFAULT);
         //tambahkan user baru ke-database
         mysqli_query($conn, "INSERT INTO pengguna VALUES('','$id','$title', '$email', '$password','$voted')"); 
         $sql2 = $conn->query("SELECT * FROM token WHERE token = '$token'");
         $data  = $sql2->  fetch_assoc();
         $sql2 =$conn->query("DELETE FROM token WHERE token = '$token'");
         echo "<script>
                 alert('Anda terdaftar sebagai user!')
                 document.location.href = 'login.php';
               </script>";
        return mysqli_affected_rows($conn);
    }else{
        echo "<script>
				alert('Anda token Salah!')
                document.location.href = 'register.php';
		      </script>";
              return false;
        }
}

?>