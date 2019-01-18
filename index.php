<?php
require_once('config.php');
include('redirect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Sho.rt - The best URL Shortener</title>
  </head>

  <body>

  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        
      </div>
      <div class="col-4 text-center">
        <?php // cand ne-am logat user name-ul ?>
        <?php if(isset($_SESSION['login'])){

            $uid = $_SESSION['login'];
            $select_user_details = "SELECT * FROM users WHERE id=$uid";
            $result = $conn->query($select_user_details);
            $userData = $result->fetch_assoc();

            echo $userData['email'];
        }
        ?>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">    

      <?php if(isset($_SESSION['login'])){ ?>

        <a class="btn btn-sm btn-outline-secondary" href="logout.php">Logout</a>

      <?php } else { ?>

          <a class="btn btn-sm btn-outline-secondary" href="login.php">Log in</a>
          <a class="btn btn-sm btn-outline-secondary" href="signup.php">Sign up</a>

      <?php } ?>
              
      </div>
    </div>
  </header>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
            <center><img class="short-logo" src="http://placehold.it/400x150"></center>
            </div>
        </div>
    

        <div class="row">
            <div class="col-sm">

            <form action="shorten.php" method="POST">

                <div class="input-group input-group-lg mb-3">
                    <input name="url" type="text" class="form-control" placeholder="Shorten URL here.." aria-describedby="shortenURL">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="shortenURL">Shorten URL</button>
                    </div> 
                </div>
            </form>

<?php 
if(isset($_GET['display'])) {
?>
    <div class="alert alert-success fade show">
                <center><?php echo $baseURL."/".$_GET['display']?></center>
    </div>
<?php
} /* end isset display */
?>
           

<?php 
    if(isset($rez_views)) {
?>

<div class="alert alert-primary fade show">
            <center><?php echo '<b>Views:</b> '.$rez_views; ?></center>
    </div>
<?php } 

/* afisare tabel cu ultimele 5 site-uri vizualizate */

$get_views = "SELECT id, long_url, short_url FROM tabel_short_url order by id DESC limit 5";
$rez_get_views = $conn->query($get_views);

echo '<table class="table table-striped">';
echo '<thead class="thead-dark"><tr><th scope="col">Latest 5 URL`s</th><th></th></tr><thead>';

while($row = $rez_get_views->fetch_assoc() ) {
        $long_url = $row['long_url'];
        $short_url = $row['short_url'];

echo '<tr>';
echo "<td><b>long_url:</b>$long_url<br></td>";
echo "<td><b>short_url:</b>$short_url</td>";
echo "<tr>";
}
echo '</table>';

/* afisare top 5 site-uri most visited */


$get_most_visited = "SELECT * FROM tabel_short_url order by views DESC limit 5";
$rez_get_most_visited = $conn->query($get_most_visited);

echo '<table class="table table-striped">';

echo '<thead class="thead-dark"><tr>';
echo '<th scope="col">Top 5 most visited URL`s</th>';
echo '<th></th>';
echo '<th></th>';
echo '</tr><thead>';

while($row = $rez_get_most_visited->fetch_assoc() ) {
        $long_url = $row['long_url'];
        $short_url = $row['short_url'];
        $views = $row['views'];

echo '<tr>';
echo "<td><b>long_url:</b>$long_url<br></td>";
echo "<td><b>short_url:</b>$short_url</td>";
echo "<td><b>Views:</b>$views</td>";
echo "<tr>";
}
echo '</table>';
 

/* afisare top 5 short url pe utilizator */

if(isset($_SESSION['login'])) { 

$get_latest_user_url = "SELECT * FROM tabel_short_url where uid='$uid' order by DESC limit 5";
$rez_get_latest_user_url = $conn->query($get_latest_user_url);

echo '<table class="table table-striped">';

echo '<thead class="thead-dark"><tr>';
echo '<th scope="col">User`s top 5 most shorten URL`s</th>';
echo '<th></th>';
echo '<th></th>';
echo '</tr><thead>';

while($row = $rez_get_latest_user_url->fetch_assoc() ) {
    $uid = $row['uid'];
    $short_url = $row['short_url'];

    echo '<tr>';
    echo '<td><b>short_url:</b>$short_url</td>';
    
}
}
?>


            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>