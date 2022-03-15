<?php
$conn = mysqli_connect("localhost", "root", "", "voting");

function vote ($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
  }
  return $rows;
}

function upload (){
    $file = $_FILES ['image']['name'];
    $ufile = $_FILES ['image']['size'];
    $tfile = $_FILES ['image'] ['tmp_name'];

    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $valid= explode('.',$file);
    $valid = strtolower(end($gambarvalid));
    if (!in_array($valid , $gambarvalid)){
      echo "<script>
      alert ('File yang anda pilih bukan gambar!');
      </script>";
      return false;
    }

    if ($ufile > 30000000){
      echo "<script>
      alert ('Ukuran file terlalu besar!');
      </script>";
      return false;
    }
    $namabaru = uniqid();
    $namabaru .= ".";
    $namabaru .= $valid;
    move_uploaded_file($tfile, 'image/' . $namabaru);
    return $namabaru;
  }

    function addtitle ($data){
    global $conn;
    $title = htmlspecialchars($data ["title"]);
    $idt = htmlspecialchars($data ["title_id"]);
    $query = "INSERT INTO title VALUES('','$idt','$title')";
    mysqli_query($conn, $query);
    echo "<script>alert('title disimpan');
      document.location.href = 'vote.php?title=$idt';
      </script>";
    return mysqli_affected_rows($conn);
    }

    function addvote ($data){
    global $conn;
    $name = htmlspecialchars($data ["name"]);
    $nickname = htmlspecialchars($data ["nickname"]);
    $title = htmlspecialchars($data ["title"]);
    $number = htmlspecialchars($data ["number"]);
    $vs = htmlspecialchars($data ["visimisi"]);
    $explanation = htmlspecialchars($data ["explanation"]);
    $image = upload();
    $query = "INSERT INTO vote VALUES ('',$number,$title,'$name','$nickname','$vs', '$explanation', '$image')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }










  // function ubah($data){
  //   global $conn;
  //   $id = $data ["id"];
  //   $nama = htmlspecialchars($data ["nama"]);
  //   $harga = htmlspecialchars($data ["harga"]);
  //   $stok = htmlspecialchars($data ["stok"]);
  //   $kategori = htmlspecialchars($data ["id_kategori"]);
  //   $details = htmlspecialchars($data ["details"]);
  //   $berat = htmlspecialchars($data ["berat"]);
  //   $gambarlama =  $data["image"];
  //   if ($_FILES['image']['error'] === 4){
  //     $image = $gambarlama;
  //   }else{
  //     $image =  upload();
  //   }

  //   $query = "UPDATE barang SET
  //   nama ='$nama',
  //   harga ='$harga',
  //   stok = '$stok',
  //   id_kategori = '$kategori',
  //   details = '$details',
  //   berat = '$berat',
  //   image = '$image'
  //   WHERE id = '$id'
  //   ";
  //   mysqli_query($conn, $query);

  //   return mysqli_affected_rows($conn);
  // }
  ?>