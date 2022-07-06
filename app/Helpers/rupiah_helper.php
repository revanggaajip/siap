<?php 
function rupiah($nominal) {
    $hasil = number_format((float) $nominal,0,',','.');
    return "Rp. ".$hasil;
}
?>