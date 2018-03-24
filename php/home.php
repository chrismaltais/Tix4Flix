<?php
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    
    // Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }

    // Get all movie names
    $movie_query_result = $conn->query("select distinct title from Showing");
    //$num_movies = count($movies);

    // Get all trailers
    // $trailer_query_result = $conn->query("select trailer_link from Movie where title = '");
    // $trailers = mysqli_fetch_array($trailer_query_result)['trailer_link'];
    

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Home - Tix4flix</title>

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
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../php/edit_info.php">Edit Personal Info</a>
              <a class="dropdown-item" href="../php/newres.php">My Reservations</a>
              <a class="dropdown-item" href="../php/prevres.php">Reservation History</a>
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
            <h1 class='display-3'>Browse the hottest movies!</h1> 
          <p>Take a look at available showtimes in theatres near you to get started! All you need to do is pick a theatre, movie, and showtime!</p>
          <p><a class="btn btn-primary btn-lg" href="../php/find_movies.php" role="button">Find Showtimes &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <?php
                while ($row = mysqli_fetch_array($movie_query_result)) {
                    $poster_file = "";
                    echo "<div class='col-md-4'>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    $words = explode(" ", $row['title']); // Get array of words in movie title
                    
                    for ($i = 0; $i < count($words); $i++){  
                        if ($i == count($words) - 1) {
                            $poster_file = $poster_file . $words[$i];
                        } else {
                            $poster_file = $poster_file . $words[$i] . "%20";
                        }
                    }
                    echo "<img src='../photos/" . $poster_file . ".jpg' class='img-rounded' alt='404 Error' width='330' height='494'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-3 mb-3'>";
                    $movie_for_trailer = $row['title'];
                    
                    $trailer_query_result = $conn->query("select trailer_link from Movie where title ='$movie_for_trailer'");
                    $trailer = mysqli_fetch_array($trailer_query_result)['trailer_link'];
                    
                    echo "<p><a class='btn btn-secondary' href='" . $trailer . "'>Trailer &raquo;</a></p>";
                    echo "</div>";
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<p><a class='btn btn-secondary' href='../php/find_movies.php' role='button'>Showtimes &raquo;</a></p>";
                    echo "</div>";
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<p><a class='btn btn-secondary' href='../php/see_reviews.php?" . $row['title'] . "' role='button'>Reviews &raquo;</a></p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    
                }
                /* for ($i = 0; $i < $num_movies; $i++) {
                    echo "<div class='col-md-4'>";
                    echo "<h2>" . movies[$i] . "</h2>";
                    /* $words = explode(" ", movies[$i]);
                    for ($j = 0; $j < count($words); $j++){  
                        if ($j == count($words) - 1) {
                            $poster_file = $poster_file . $words[$j];
                        } else {
                            $poster_file = $poster_file . $words[$j] . "%20";
                        }
                    }
                    echo "<img src='../photos/" . $poster_file . ".jpg' class='img-rounded' alt='404 Error' width='330' height='494'>";
                    */
                // 1. Put photo stuff below here
                // 2. Put trailer/reveiw row here
                // 3. Keep close row div on outside
            ?>
          
        </div>

      </div> <!-- /container -->

    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Tix4Flix</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
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
