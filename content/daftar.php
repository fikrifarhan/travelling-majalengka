<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database_name = 'travelling_majalengka';

$db = mysqli_connect($hostname,$username,$password,$database_name);

$sql = "SELECT * FROM pemesanan where is_deleted = 0 order by created_at desc";

$query = mysqli_query($db,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $detail = mysqli_fetch_row($query);
?>
<h1 class="text-center py-4">Daftar Pemesanan</h1>
<table class="table">
  <thead align="center">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pemesan</th>
      <th scope="col">Nomor HP</th>
      <th scope="col">Tanggal Berangkat</th>
      <th scope="col">Total Tagihan</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody align="center">
      <?php
      $co = 1;
      while($detail = mysqli_fetch_assoc($query)){
      ?>
    <tr>
      <th scope="row"><?=$co?></th>
      <td><?=$detail['nama_pemesanan']?></td>
      <td><?=$detail['hp_pemesan']?></td>
      <td><?=$detail['waktu_wisata']?></td>
      <td>Rp. <?= number_format($detail['total_tagihan'], 0, ',', '.')?></td>
      <td><a class="btn btn-success" href="index.php?aksi=detail&id_pemesanan=<?=$detail['id_pemesanan']?>">Detail</a> 
      <a class="btn btn-warning" href="index.php?aksi=edit&id_pemesanan=<?=$detail['id_pemesanan']?>">Edit</a> 
      <a class="btn btn-danger" href="index.php?aksi=hapus&id_pemesanan=<?=$detail['id_pemesanan']?>">Hapus</a></td>
    </tr>
        <?php
        $co++;
        }
        ?>
  </tbody>
</table>
<?php
} 
?>