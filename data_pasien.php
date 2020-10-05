<html>
<head>
<title>KOMPETENSI 2</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

       
        <br>
        <table class="table table-bordered">
                <tr>
                <th>ID PASIEN</th>
                <th>NAMA PASIEN</th>
                <th>TANGGAL LAHIR</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                </tr>
                <?php 
                $konek = mysqli_connect("localhost","root","","jwp");
                $q=mysqli_query($konek,"SELECT * FROM pasien");
                while($d=mysqli_fetch_array($q)){
                ?>
                <tr>
                <?php   
                for($i=0;$i<5;$i++){
                echo"<td>$d[$i]</td>";
                }
                ?>
                </tr>

                <?php }?>
        </table>

</body>
</html>