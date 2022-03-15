<?php
$conn = mysqli_connect("localhost", "root","", "voting");
function tvote($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $array = [];
    while ($hi = mysqli_fetch_assoc($result)) {

        $array[] = $hi;
    }
    return $array;
}