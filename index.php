<?php 
require_once "db.php";


$nama = ['Gerald','Aldi','Daus'];
$almt = ['jl.sentosa','jl.abri','jl.Jalan'];
$rondom = rand(1,15);
var_dump($rondom);

if($rondom > 1 && $rondom <= 5){
    $nm = $nama[0];
    $almt = $almt[0] ;
}else if ($rondom > 5 && $rondom <= 10){
    $nm = $nama[1];
    $almt = $almt[1] ;
}else{
    $nm = $nama[2];
    $almt = $almt[2] ;
}


$sql = "INSERT INTO tugas VALUES ('','$nm','$almt') ";
mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Otomatis 2 Menit</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
</head>
<body>
    <input type="hidden" id="input_otomatis" name="input" value="0">
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <?php 
            $sql = "SELECT * FROM tugas";
            $query = mysqli_query($conn, $sql);
            while($dt = mysqli_fetch_assoc($query)) :
        ?>
        <tbody>
            <tr>
                <td><?= $dt['Nama_Pelanggan'] ?></td>
                <td><?= $dt['Alamat'] ?></td>
            </tr>
        </tbody>
            <?php endwhile; ?>
    </table>
</body>
<script>
    $(document).ready(function(){
        //Mengambil Waktu Detik
        var dateTime = new Date().getSeconds()
        
        //Set Interval
        function set(){
            var dateRealTime = new Date().getSeconds()
            console.log(dateRealTime)

            //Mengabil Value input hidden 
            var put = $('#input_otomatis').val()

            //logic Penambahan value
            if(dateRealTime ==  dateTime){
               var jmlh = parseInt(put) + 1;
               $('#input_otomatis').val(jmlh)
            }

            //logic realod data
            if( put > 1){
                $('#input_otomatis').val(0)
                location.reload();
            }
        }
        setInterval(set,1000)
    })

</script>
</html>