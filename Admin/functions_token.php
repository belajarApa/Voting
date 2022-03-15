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


function addtoken ($data){
    $jml = htmlspecialchars($data ["jml"]);
    $idTitle = htmlspecialchars($data ["titleVote"]);
    echo "<script>
            document.location.href = 'token.php?jml=$jml&id=$idTitle';
          </script>";
    }