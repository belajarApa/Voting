<?php
include_once "functions_vote.php";
$text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$panj = 5;
$txtl = strlen($text)-1;
$awal = 1;
$jml = $_GET["jml"];
$title = $_GET["id"];


while($awal <= $jml){
    $result = '';
    for($i=1; $i<=$panj; $i++){
        $result .= $text[rand(0, $txtl)]; 
        $id = $title;
    }
    $query = "INSERT INTO token VALUES ('','$result', '$id')";
    mysqli_query($conn, $query);
    unset ($result);
    unset ($id);
    $awal++;
}
echo "<script>alert('Token berhasil dibuat');
    document.location.href = 'createToken.php';
    </script>";

?>