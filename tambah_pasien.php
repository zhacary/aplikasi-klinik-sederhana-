<?php 
include 'header.php';
include 'konek.php';
?>
<title>Tambah Pasien</title>
<body>

<form action="" method="POST">
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
$pasien =$_POST["Pasien_ID"];
$nama = $_POST['Nama_Pasien'];
$tanggal = $_POST["Tanggal_Lahir"];
$kelamin = $_POST["Jenis_Kelamin"];
$alamat = $_POST["Alamat"];


if($pasien==''| $nama=='' | $tanggal=='' | $kelamin=='' | $alamat==''){
    echo"<div>Isi Data DEngan Lengkap</div>";
}else{
    $simpan=mysqli_query($konek,"INSERT INTO pasien (`Pasien_ID`,`Nama_Pasien`,`Tanggal_Lahir`,`Jenis_Kelamin`,`Alamat`)
        VALUES ('$pasien','$nama','$tanggal','$kelamin','$alamat')");

        if($simpan){
            header('location:data_pasien.php');
        }

}
}

?>
    <div class="row" style='width:80%;height:300px;padding:5px;border:solid 5px #cccccc;overflow-y:scroll;size-font:8;margin-left:50;'>

        <div class="col-md-6">
        <label for="">ID PASIEN</label>
        <input type="text" name="Pasien_ID" class="form-control" placeholder="ISI ID">
        </div>

        <div class="col-md-6">
        <label for="">NAMA PASIEN</label>
        <input type="text" name="Nama_Pasien" class="form-control" placeholder="ISI NAMA">
        </div>

        <div class="col-md-6">
        <label for="">TANGGAL LAHIR</label>
        <input type="date" name="Tanggal_Lahir" class="form-control" placeholder="ISI TANGGAL LAHIR">
        </div>

        <div class="col-md-6">
        <label for="">KELAMIN</label>
        <select name="Jenis_Kelamin" id="" class="form-control">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
        </select>
        </div>

        <div class="col-md-6">
        <label for="">AlAMAT</label>
        <input type="text" name="Alamat" class="form-control" placeholder="ISI ALAMAT">
        </div>

    </div>

<div class="col-md-6"><br>
<input type="submit" class="btn btn-info" value="TAMBAH">
</div>
</form>
</body>