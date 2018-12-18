<?php
include_once('config.php');

if(isset($_POST['url'])){
    $long_url = $_POST['url'];
} else {
    header("Location: index.php");
}

$characters ="0123456789abcdefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQRSTUVXYZ";

$short_url="";

for($i = 0; $i <= 5; $i++) {
    $nr_random = rand(0, strlen($characters)-1);
    $short_url .= $characters[$nr_random];
}

$url_insert = "insert into tabel_short_url(short_url, long_url) values('$short_url', '$long_url')";

$conn->query($url_insert);

$display_url = $baseURL.'/?display='.$short_url;

header("Location: $display_url");

