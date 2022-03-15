<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script type="text/javascript">
window.onload = function(){jam();}

function jam(){
    var a = document.getElementById('jam'),
    d = new Date(), h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    a.innerHTML = h + ":" + m + ":" + s;

    setTimeout('jam()', 1000);
}

function set(a) {
    a = a < 10 ? '0' + a : a;
    return a;
}
</script>
<body id="jam">

</body>
</html>