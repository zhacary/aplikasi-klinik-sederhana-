<?php 
	include "konek.php";
	$hapus = mysqli_query($konek, "DELETE FROM berobat WHERE no_transaksi='$_GET[no_transaksi]'");
	
	if($hapus){
    mysqli_close($konek);
           header('location:berobat.php');
    }
?>