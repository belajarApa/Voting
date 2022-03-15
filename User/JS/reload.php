<script>
    var tglmulai= <?php echo json_encode($tglmulai); ?>;
    var jmmulai= <?php echo json_encode($jmmulai); ?>;
    const waktuVote = new Date(tglmulai+' '+ jmmulai +':00').getTime();

	const HitungMundur = setInterval(function() {
    const Sekarang = new Date().getTime();

    if(Sekarang >= waktuVote ){
		clearInterval(HitungMundur);
		const waktu = document.getElementById('mulai');
		window.location.href = 'waktuVoting.php'
    }
}, 1000);

</script>
