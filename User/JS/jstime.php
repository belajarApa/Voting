<script>
    var tglakhir= <?php echo json_encode($tglakhir); ?>;
    var jmakhir= <?php echo json_encode($jmakhir); ?>;
    const TanggalTujuan = new Date(tglakhir+' '+ jmakhir +':00').getTime();

    const HitungMundur = setInterval(function() {
    const Sekarang = new Date().getTime();
    const Selilih = TanggalTujuan - Sekarang;

    const hari = Math.floor(Selilih / (1000 * 60 * 60 * 24));
    const jam = Math.floor(Selilih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    const menit = Math.floor(Selilih % (1000 * 60 * 60) / (1000 * 60));
    const detik = Math.floor(Selilih % (1000 * 60) / 1000 );

    const waktu = document.getElementById('waktu');
    waktu.innerHTML ='Waktu Vote Kurang' + '<br>' + hari + ' Hari ' +  ' , ' + jam + ' Jam ' + menit + ' Menit ' + detik + ' Detik Lagi'; 
    
    if(Selilih < 1 ){
        clearInterval(HitungMundur);
		const waktu = document.getElementById('waktu');
        window.location.href = 'hasil.php'
    	waktu.innerHTML = 'Waktu Habis'; 
    }
    }, 1000);
</script>
