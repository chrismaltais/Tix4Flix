<?php 
    session_start();
    $_SESSION['num_tickets'] = $_POST["num_tickets"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Confirmation - Tix4flix</title>

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
            <a class="nav-link" href="../php/find_movies.php">Book Tickets</a>
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
          <h1 class="display-3">Purchase Sucessful!</h1>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <?php
                echo "<img class='img-rounded' src='../photos/" . $_SESSION['movie_photo'] . ".jpg' alt='404 Error' width='360' height='538'>";
              ?>
          </div>
          <div class="col-md-8">
          <h1 class="display-3">Booking Details</h1>
          <?php
              echo "<h2 class='display-8'>" . $_SESSION['movie_title'] . "</h2>";
              echo "<h5 class='display-8'>" . $_SESSION['showing'] . " | Tickets: " . $_SESSION['num_tickets'] . " | Runtime:" .  $_SESSION['runtime'] . " mins</h5>";
          ?>
          
          <p>We look forward to seeing you in one of our movie theatres shortly! In the meantime, you can continue to look for other movies that might interest you on our website. Make sure you arrive to the theatre 10-15 minutes before the movie with your movie snacks in hand. Enjoy! </p>
        
          <!-- Insert Review into DB -->

          <p><a class="btn btn-secondary" href="../php/home.php" role="button">Return Home &raquo;</a></p>

          <div class="col-md-8">
              <div class="row justify-content-end">
                <img class="img-rounded" src="../photos/checkmark.gif" alt="404 Error" width="200" height="200">
              </div>
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
  </body>
</html>
