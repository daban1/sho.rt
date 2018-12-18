<?php 
if(isset($_GET['redirect'])) {

    $short_url = $_GET['redirect'];
    //selectie BD
    $select_long_url = "SELECT * FROM tabel_short_url WHERE short_url = '$short_url'";
    //rulam select-ul
    $result =$conn->query($select_long_url);
    //transformam rezultatul in array
    $result_arr = $result->fetch_assoc();
    // scoatem din rezultat URL long
    $long_url = $result_arr['long_url'];
    //redirectionam catre long URL
    header("Location: $long_url");

}