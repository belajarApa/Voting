<?php
include_once "functions_user.php";
session_start();
$p = $_SESSION["pid"];
$number = $_GET["no"];
$no =md5($number);


$result = mysqli_query($conn, "SELECT voted FROM pengguna WHERE id = $p and voted = '0'");
	if(mysqli_fetch_assoc($result) ) {
    
	$query = "UPDATE pengguna SET
  voted ='$no'
  WHERE id = '$p'";
  mysqli_query($conn, $query);
  echo "<script>
         alert('Anda memilih nomor $number!')
         window.location=history.go(-2);
         </script>";
  return mysqli_affected_rows($conn);
	}else{
    echo "<script>
         alert('Anda telah melilih')
          window.location=history.go(-1);
         </script>";
  }
?>