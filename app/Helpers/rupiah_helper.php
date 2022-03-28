<?php 
function rupiah($nominal) {
    $hasil = number_format($nominal,0,',','.');
    return "Rp. ".$hasil;
}
?>