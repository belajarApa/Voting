<html>
<head>
    <title>Tutorial Cara Membuat Script PHP Hitung Mundur</title>
</head>
<body onload="countDown();"> 
    <?php
        $t    =time();
        echo $t;
    ?>
    <br /><br />
    <?php
        $day    =13;
        $month    =3;
        $year    =2022;
        
        $days    =(int)((mktime (0,0,0,$month,$day,$year) - time())/86400);
    ?>


<span><?= $days ?> hari</span><br>
<span><?= $days ?> Jam</span><br>
<span><?= $days ?> Menit</span><br>
<span id="detik"></span> detik.</br>
<span id="link"></span>
</body>
<?php
// include_once "User/JS/jstime.php";
?>
</html> 



