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
    
    <h1 class="text-center">Edit Data</h1>

    <div class="container col-md-6">
            <form action="" method="post">

            <?php
          $sqledit=mysqli_query($konek,"SELECT * FROM berobat WHERE no_transaksi='$_GET[no_transaksi]'");
          $e=mysqli_fetch_array($sqledit);
          ?>
                    <?php 
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $transaksi = $_POST["no_transaksi"];
                        $pasien = $_POST["Pasien_ID"];
                        $tanggal = $_POST["Tanggal_Berobat"];
                        $dokter = $_POST["Dokter_ID"];
                        $keluhan = $_POST["Keluhan"];
                        $biaya = $_POST["Biaya_Adm"];
                    
                        $update =mysqli_query($konek,"UPDATE berobat SET 
                        no_transaksi='$transaksi',
                        Pasien_ID='$pasien',
                        Tanggal_Berobat='$tanggal',
                        Dokter_ID='$dokter', 
                        Keluhan='$keluhan', 
                        Biaya_Adm='$biaya' 
                        WHERE no_transaksi='$_GET[no_transaksi]'");




                if($update){
                            header("location:berobat.php");
                        }
                    


                    }
                    
                    ?>
                    
                    <div class="col">
                    <label for="">NO TRANSAKSI</label>
                    <input type="text" name="no_transaksi" value=<?= $e['no_transaksi'] ?> class="form-control">
                    </div>
                    
                    <div class="col">        
                    <label for="" class="text-white">NAMA PASIEN</label>
                   
                    <select name="Pasien_ID" id="" class='form-control col-md-3'>
                            <option value="0">- Pilih Pasien -</option>
                            <?php
                            $list_pasien=mysqli_query($konek, "SELECT * FROM pasien");
                            while($lp=mysqli_fetch_array($list_pasien)){
                            ?>
                            <option value="<?= $lp['Pasien_ID'] ?>" <?php if($lp['Pasien_ID']==$e['Pasien_ID']){echo "selected";} ?>><?= $lp['Pasien_ID']." - ".$lp['Nama_Pasien'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="col">        
                    <label for="" class="text-white">DOKTER ID</label>                 
                    <select name="Dokter_ID" id="">
                    <option value="0">--Pilih Dokter</option>
                    <?php 
                    $list_dokter=mysqli_query($konek,"SELECT * FROM dokter");
                        while($ld=mysqli_fetch_array($list_dokter)){
                    ?>
                    <option value="<?= $ld['Dokter_ID'] ?>" <?php if($ld['Dokter_ID']==$e['Dokter_ID']){echo "selected";} ?>><?=$ld['Dokter_ID']." - ".$ld['Nama_Dokter'] ?></option>
                    <?php } ?>
                    </select>
                    </div>
                   
                    
                   <div>
                   <label for="">TANGGAL BEROBAT</label>
                   <input type="date" name="Tanggal_Berobat" value=<?= $e['Tanggal_Berobat'] ?>  class="form-control">
                   </div>

                    <div class="col">
                    <label for="">KELUHAN</label>
                    <input type="text" name="Keluhan"  value=<?= $e['Keluhan'] ?>   class="form-control">
                    </div>

                    <div class="col">
                    <label for="">BIAYA ADMINISTRASI</label>
                    <input type="text" name="Biaya_Adm" value=<?= $e['Biaya_Adm'] ?>  class="form-control">
                    </div>

                  
                    <input type="submit" class="btn- btn-success" name="Submit" value="Submit">
                    <input type="submit" class="btn- btn-danger" name="reset" value="Clear">
              


            </form>
        </div>
</body>
</html>




