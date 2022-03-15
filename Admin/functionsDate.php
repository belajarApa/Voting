<?php
$conn = mysqli_connect("localhost", "root", "", "voting");

function Fdate ($data){
    global $conn;
    $idt = htmlspecialchars($data ["titleVote"]);
    $cek = mysqli_query($conn, "SELECT * FROM dates WHERE idTitle = '$idt'");
    if (mysqli_num_rows($cek) == 1) {
        echo"<script>
        alert('Waktu sudah diset');
        </script>";
        }else{
        $title = htmlspecialchars($data ["titleVote"]);
        $tglmulai = htmlspecialchars($data ["tglmulai"]);
        $tglakhir = htmlspecialchars($data ["tglakhir"]);
        $jammulai = htmlspecialchars($data ["jammulai"]);
        $jamakhir = htmlspecialchars($data ["jamakhir"]);
    
        $query = "INSERT INTO dates VALUES('','$title','$tglmulai', '$tglakhir', '$jammulai', '$jamakhir')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
        }
    
      }

?>