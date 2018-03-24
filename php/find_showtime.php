<?php 
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    $movie_title = $_POST["movie_chosen"];
    $date = $_POST["date_chosen"];
    $complex = $_POST["complex_chosen"];
    $movie = "";

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
    
    // Get showtimes of movies
    $result_showings = $conn->query("select start_time from Showing where title='$movie_title' and name='$complex' and date_played='$date'");
    $num_showings = mysqli_num_rows($result_showings);

    // Get movie trailer
    $result_trailer = $conn->query("select trailer_link from Movie where title ='$movie_title'");
    $trailer = mysqli_fetch_array($result_trailer)['trailer_link'];

    // Find words in movie
    $words = explode(" ", $movie_title);
    $num_words_in_movie = count($words);

    // Identify global variables
    $_SESSION['movie_title'] = $movie_title;
    $_SESSION['complex'] = $complex;
    $_SESSION['rating'] = $rating;
    $_SESSION['runtime'] = $runtime;
    $_SESSION['trailer'] = $trailer;
    $_SESSION['synopsis'] = $synopsis;
    $_SESSION['date'] = $date;

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
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../php/edit_info.php">Edit Personal Info</a>
              <a class="dropdown-item" href="../newres.php">My Reservations</a>
              <a class="dropdown-item" href="../prevres.php">Reservation History</a>
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
            <?php 
                // Break movie title string to add "%20" character for spaces for movie poster file
                $line1 = "<img class='img-rounded' src='../photos/";
                for ($i = 0; $i < $num_words_in_movie; $i++){  
                    if ($i == $num_words_in_movie - 1) {
                        $movie = $movie . $words[$i];
                    } else {
                        $movie = $movie . $words[$i] . "%20";
                    }
                }
                $_SESSION['movie_photo'] = $movie;
                echo $line1 . $movie . ".jpg' alt='404 Error' width='360' height='538'>";
              ?>
          <div class="d-flex justify-content-around">
            <div class="col-md-4 mb-6">
                <?php
                    echo "<p><a class='btn btn-secondary' href='" . $trailer . " role='button'>Trailer &raquo;</a></p>"
                ?>
            </div>
            <div class="col-md-4 mb-6">
            <p><a class="btn btn-secondary" href="../php/see_reviews.php?<?php echo $movie;?>" role="button">Reviews &raquo;</a></p>
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
                    echo "<div class='col-md-3' name='showtime'>";
                    echo "<p><a class='btn btn-secondary' href='../php/purchase_page.php?" . $showings['start_time'] . "' role='button'>" . $showings['start_time'] . " &raquo;</a></p>";
                    echo "</div>";
                }
            ?>
          </div>
          </div>
          </div>
          </div>
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
