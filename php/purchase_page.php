<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Purchase - Tix4flix</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../custom_css/jumbotron.css" rel="stylesheet">
  </head>


  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../php/home.php">Tix4flix</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../custom_css/find_movies.php">Book Tickets</a>
          </li>
          </ul>

        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <!--<img src="../photos/logo2.svg" class="img-rounded" alt="404 Error" width="40" height="40"> --> 
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../pages/edit_info.html">Edit Personal Info</a>
              <a class="dropdown-item" href="#">My Reservations</a>
              <a class="dropdown-item" href="#">Reservation History</a>
              <a class="dropdown-item" href="../pages/index.html">Logout</a>
            </div>
          </li>

        </ul>

      </div>
    </nav>



    <main role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
            <?php
                echo "<h1 class='display-3'>" . $_SESSION['complex'] . "</h1>";
            ?>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <?php
                echo "<img class='img-rounded' src='../photos/" . $_SESSION['movie_photo'] . ".jpg' alt='404 Error' width='360' height='538'>"
              ?> 
          <div class="d-flex justify-content-around">
            <div class="col-md-4 mb-6">
            <?php
                echo "<button class='btn btn-secondary' href='" . $_SESSION['trailer'] . "'>Trailer &raquo;</button>"
            ?>
            </div>
            <div class="col-md-4 mb-6">
            <p><a class="btn btn-secondary" href="#" role="button">Reviews &raquo;</a></p>
            </div>
          </div>
          </div>
          <div class="col-md-8">
              <?php
                  echo "<h1 class='display-3'>" . $_SESSION['movie_title'] . "</h1>";
                  echo "<h2 class='display-8'>Show Time: " . $_SESSION['showing'] . " | Rating:" . $_SESSION['rating'] . " | Runtime:" . $_SESSION['runtime'] . " mins</h2>";
                  echo "<p>" . $_SESSION['synopsis'] . "</p>";
              ?>

          <h5>Tickets: </h5>
          <div class="row"> 
            <form class="col-md-3 mb-3">
              <input Name=tickets_number type="text" class="form-control" id="tickets_number" placeholder="Number of tickets" onkeydown="getPrice(this.value)" required>
            </form>

            <div class="col-md-2 mb-3 pt-2">
              <div class="row">
              <div class="col-md-5">
                <p>Price:</p>
              </div>
              <div class="col-md-4">
                <p><span id="price"></span></p>
              </div>
            </div>
            </div>

            <div class="col-md-3 mb-3">
              <p><a class="btn btn-secondary" href="../pages/confirmation.html" role="button">Purchase &raquo;</a></p>
            </div>
          </div>
          </div>
          </div>
          </div>
        </div>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <div class="d-flex justify-content-center">
      <p>&copy; Tix4flix 2017-2018</p>
    </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>   
        // Update Price dynamically
        $(document).ready(function() {
            $("#tickets_number").change(function() {
                $('#price').html("$" +
                $(this).val() * 12 + ".00");
            }).change();
        });
    </script>
  </body>
</html>
