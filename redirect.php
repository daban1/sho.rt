<?php 

if(isset($_GET['stats'])) {
    
    $short_url = $_GET['redirect'];
    $get_stats = "SELECT * FROM tabel_short_url WHERE short_url = '$short_url'";

    $rez_stats = $conn->query($get_stats);
    $rez_stats_arr = $rez_stats->fetch_assoc();
    $rez_views = $rez_stats_arr['views'];

}   else if(isset($_GET['redirect'])) {

    $short_url = $_GET['redirect'];
    //selectie BD
    $select_long_url = "SELECT * FROM tabel_short_url WHERE short_url = '$short_url'";
    //rulam select-ul
    $result =$conn->query($select_long_url);
    //transformam rezultatul in array
    $result_arr = $result->fetch_assoc();
    // scoatem din rezultat URL long
    $long_url = $result_arr['long_url'];
        
    // +1 views

    $update_views = "update tabel_short_url set views = views+1 WHERE short_url = '$short_url'";
    $conn->query($update_views);

    //+1 views

    //redirectionam catre long URL
    header("Location: $long_url");

}

