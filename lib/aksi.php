<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

switch ($aksi) {
    case 'pemesanan':
        include 'content/pemesanan.php';
        break;
    case 'daftar':
        include 'content/daftar.php';
        break;
    case 'detail':
        include 'content/detail.php';
        break;
    case 'hapus':
        include 'lib/hapus.php';
        break;
    
    default:
        include 'content/beranda.php';
        break;
}