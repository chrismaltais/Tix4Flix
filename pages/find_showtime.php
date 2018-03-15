<?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    $movie_title = $_POST["movie_chosen"];
    $complex = $_POST["complex_chosen"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get rating of movie selected in find_movies.php
    $result = $conn->query("select rating from Movie where title='$movie_title'");
    $rating = mysqli_fetch_array($result)['rating'];
    
    // Get runtime of movie selected in find_movies.php
    $result2 = $conn->query("select run_time from Movie where title='$movie_title'");
    $runtime = mysqli_fetch_array($result2)['run_time'];

    // Get synopsis of movie selected in find_movies.php
    $result3 = $conn->query("select plot_synopsis from Movie where title='$movie_title'");
    $synopsis = mysqli_fetch_array($result3)['plot_synopsis'];

    $result_showings = $conn->query("select start_time from Showing where title='$movie_title' and name='$complex'");
    $num_showings = mysqli_num_rows($result_showings);
    // $showings = mysqli_fetch_array($result_showings)['start_time'];

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
      <a class="navbar-brand" href="../pages/home.html">Tix4flix</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Book Tickets</a>
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
                echo "<h1 class='display-3'>" . $_POST["complex_chosen"] . "</h1>"
            
            ?>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <img class="img-rounded" src="../photos/WolfOfWallStreet.jpg" alt="404 Error" width="360" height="538"> 
          <div class="d-flex justify-content-around">
            <div class="col-md-4 mb-6">
            <p><a class="btn btn-secondary" href="https://www.youtube.com/watch?v=iszwuX1AK6A" role="button">Trailer &raquo;</a></p>
            </div>
            <div class="col-md-4 mb-6">
            <p><a class="btn btn-secondary" href="#" role="button">Reviews &raquo;</a></p>
            </div>
          </div>
          </div>
          <div class="col-md-8">
          <?php 
                echo "<h1 class='display-3'>" . $_POST["movie_chosen"] . "</h1>";
                echo "<h4 class='display-8'>Rating: " . $rating . " | Runtime: " . $runtime . " mins</h2>";
                echo "<p>" . $synopsis . "</p>"
          ?>
          
          <h5>Showtimes</h5>
          <div class="row"> 
            <?php
                while ($showings = mysqli_fetch_array($result_showings))  {
                    // If statement for time needs to go here!
                    echo "<div class='col-md-3'>";
                    echo "<button class='btn btn-secondary' type='button'>" . $showings['start_time'] . " &raquo;</button>";
                    echo "</div>";
                }
            ?>
            <!-- <div class="col-md-3">
              <button class="btn btn-secondary" href="#" role="button">Showtime 1 &raquo;</button>
            </div>
            <div class="col-md-3">
              <p><a class="btn btn-secondary" href="#" role="button">Showtime 2 &raquo;</a></p>
            </div>
            <div class="col-md-3">
              <p><a class="btn btn-secondary" href="#" role="button">Showtime 3 &raquo;</a></p>
            </div>
            <div class="col-md-3">
              <p><a class="btn btn-secondary" href="#" role="button">Showtime 4 &raquo;</a></p>
            </div> -->
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
