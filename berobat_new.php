<?php 
include 'konek.php';
?>
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
    <h1 class="text-center">Tambah Data</h1>

    <div class="container col-md-6">
            <form action="" method="post">

                    <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $transaksi = $_POST["No_Transaksi"];
                        $pasien = $_POST["Pasien_ID"];
                        $tanggal = $_POST["Tanggal_Berobat"];
                        $dokter = $_POST["Dokter_ID"];
                        $keluhan = $_POST["Keluhan"];
                        $biaya = $_POST["Biaya_Adm"];
                        

                    if($transaksi==''|$pasien==''|$tanggal==''|$dokter==''|$keluhan=='' |$biaya==''){
                            echo"<div>SILAHKAN LENGKAPI DATA</div>";
                    }else{
                        $Submit=mysqli_query($konek,"INSERT INTO berobat(`no_transaksi`,`Pasien_ID`,`Tanggal_Berobat`,`Dokter_ID`,`Keluhan`,`Biaya_Adm`) VALUES('$transaksi','$pasien','$tanggal','$dokter','$keluhan','$biaya')");
                        if($Submit){
                            header("location:berobat.php");
                        }
                    }


                    }
                 
                    ?>
                    
                    <div class="col">
                    <label for="">NO TRANSAKSI</label>
                    <input type="text" name="No_Transaksi"  class="form-control">
                    </div>
                    
                    <div class="col">        
                    <label for="" class="text-white">NAMA PASIEN</label>
                    <select name="Pasien_ID" id="" class="form-control">
                    <?php 
                        $tampil1=mysqli_query($konek,"SELECT * FROM pasien");
                        while($d=mysqli_fetch_array($tampil1)){
                    
                        ?>
                    <option value="<?=$d["Pasien_ID"]?>"><?= $d['Nama_Pasien'] ?></option>
                        <?php } ?>
                    </select>
                    </div>


                    <div class="col">        
                    <label for="" class="text-white">DOKTER ID</label>
                    <select name="Dokter_ID" id="" class="form-control">
                    <?php 
                        $tampil2=mysqli_query($konek,"SELECT * FROM dokter");
                        while($h=mysqli_fetch_array($tampil2)){
                    
                        ?>
                    <option value="<?=$h["Dokter_ID"]?>"><?= $h['Nama_Dokter'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    
                   <div>
                   <label for="">TANGGAL BEROBAT</label>
                   <input type="date" name="Tanggal_Berobat"name="" class="form-control">

                   </div>

                    <div class="col">
                    <label for="">KELUHAN</label>
                    <input type="text" name="Keluhan" class="form-control">
                    </div>

                    <div class="col">
                    <label for="">BIAYA ADMINISTRASI</label>
                    <input type="text" name="Biaya_Adm" class="form-control">
                    </div>

                  
                    <input type="submit" class="btn- btn-success" name="Submit" value="Submit">
                    <input type="submit" class="btn- btn-danger" name="reset" value="Clear">
              


            </form>
        </div>
</body>
</html>