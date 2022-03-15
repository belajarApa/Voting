<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5 id="tampil"></h5>
</body>
<script>
    const TanggalTujuan = new Date('Mar 12, 2022 13:19:30').getTime();

    const HitungMundur = setInterval(function() {
    const Sekarang = new Date().getTime();
    const Selilih = TanggalTujuan - Sekarang;

    const hari = Math.floor(Selilih / (1000 * 60 * 60 * 24));
    const jam = Math.floor(Selilih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    const menit = Math.floor(Selilih % (1000 * 60 * 60) / (1000 * 60));
    const detik = Math.floor(Selilih % (1000 * 60) / 1000 );


    const tampil = document.getElementById('tampil');
    tampil.innerHTML = 'Waktu Anda Tinggal : ' + hari + ' Hari ' + jam + ' Jam ' + menit + ' Menit ' + detik + ' Detik Lagi'; 
    
    if(Selilih < 1 ){
        clearInterval(HitungMundur);
        tampil.innerHTML = 'Voting Ditutup';
    }

    }, 1000);
</script>
</html>