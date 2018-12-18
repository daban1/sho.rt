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
                <center><?php echo $baseURL."/?redirect=".$_GET['display']?></center>
    </div>
<?php
} /* end isset display */
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