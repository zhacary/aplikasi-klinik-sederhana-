<?php

?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div style='width:100%;height:300px;padding:5px;border:solid 1px #cccccc;overflow-y:scroll;size-font:8;'>
				<a href='berobat_new.php'><button type='button' class='btn btn-warning btn-sm'>Add New</button></a>
				<table class="table table-bordered">
               <tr>
               <thead class='text-center'>
                <th>no transaksi</th>
                <th>tanggal transaksi</th>
                <th>id pasien</th>
                <th>nama pasien</th>
                <th class='text-center'>usia</th>
                <th>jenis kelamin</th>
                <th>keluhan</th>
                <th>nama poli</th>
                <th>dokter</th>
                <th>biaya administrasi</th>
               <th>ACTION</th>
                </thead>
                </tr>
                <?php
                $konek =mysqli_connect("localhost","root","","jwp");
              

                $tampil = mysqli_query($konek,"SELECT
                no_transaksi,
                Tanggal_Berobat,
                berobat.pasien_id,
                nama_pasien,
                ROUND(DATEDIFF(now(), tanggal_lahir)/365) AS usia,
                jenis_kelamin,
                keluhan,
                Nama_Poli,
                nama_dokter,
                biaya_adm
            FROM
                berobat
                inner join pasien on berobat.pasien_id=pasien.pasien_id
                inner join dokter on berobat.dokter_id=dokter.dokter_id
                inner join poli on dokter.poli_id=poli.poli_id");

                while($d=mysqli_fetch_array($tampil)){
                    $col="";    
                 ?>

                <tr><?php for($i=0;$i<10;$i++){
                        echo"<td>$d[$i]</td>";
                        
                    }?>
                     <td class="row"><a class="" href="hapu_berobat.php?action=Hapus&no_transaksi=<?=$d["no_transaksi"]?>">HAPUS</a>
                     |<a class="" href="berobat_edit.php?action=Edit&no_transaksi=<?=$d["no_transaksi"]?>">EDIT</a>
                     </td>
                    </tr>
                <?php }?>
                </table>
			</div>
		</div>
</body>
</html>