<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

switch ($aksi) {
    case 'pemesanan':
        include 'content/pemesanan.php';
        break;
    
    default:
        include 'content/beranda.php';
        break;
}