<?php
include 'koneksi.php';

if(isset($_POST['nama_pemesanan'])){
    // Definisikan setiap variabel
    $nama_pemesanan = htmlentities($_POST['nama_pemesanan']);
    $hp_pemesan = htmlentities($_POST['hp_pemesan']);
    $waktu_wisata = htmlentities($_POST['waktu_wisata']);
    $hari_wisata = htmlentities($_POST['hari_wisata']);
    $jumlah_peserta = htmlentities($_POST['jumlah_peserta']);
    $total_tagihan = htmlentities($_POST['total']);
    
    // Pengkondisian jika salah satu paket tidak dipilih
    $paket_inap = isset($_POST['paket_inap']) ? 1 : 0;
    $paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
    $paket_makan = isset($_POST['paket_makan']) ? 1 : 0;
    
    // Buat query
    $sql = "INSERT INTO pemesanan (nama_pemesanan, hp_pemesan, waktu_wisata, hari_wisata, jumlah_peserta, total_tagihan, paket_inap, paket_transport, paket_makan) 
            VALUES ('$nama_pemesanan', '$hp_pemesan', '$waktu_wisata', '$hari_wisata', '$jumlah_peserta', '$total_tagihan', '$paket_inap', '$paket_transport', '$paket_makan')";
    
    // Eksekusi query
    $query = mysqli_query($db, $sql);
    
    // Cek apakah query berhasil
    if ($query) {
        header('Location: ../index.php?aksi=daftar');
    } else {
        echo "Error: " . mysqli_error($db); // Tampilkan error
    }
} else {
    // Muncul pesan error
    echo 'Ngapain?';
}
?>