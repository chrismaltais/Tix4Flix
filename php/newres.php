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

    <title>Current Movie Reservations</title>

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
          <h1 class="display-3">Current Reservations</h1>
        </div>
      </div>




      <div class="container">
        <!-- Example row of columns -->
 <?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    $user = $_SESSION["user_id"];


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
          
    // Get rating of movie selected in find_movies.php
    $result = $conn->query("SELECT Reservations.reservation_id, Reservations.num_tickets, Movie.run_time, Movie.plot_synopsis, Showing.title, Showing.date_played, Showing.start_time, Showing.name from Reservations left join Showing on Showing.showing_id = Reservations.showing_id left join Movie on Movie.title = Showing.title where Reservations.account_num = $user");

        while($row = $result->fetch_assoc()) {
            if ($_SESSION['current_date'] <= $row['date_played']){
                $movie = "";
                $date = strtotime($row['date_played']);
                $date = date("M d", $date);
                echo "<div class='row pb-4'>";
                echo "<div class='col-md-4'>";    
                $line1 = "<img class='img-rounded' src='../photos/";
                $words = explode(" ", $row['title']);
                $num_words_in_movie = count($words);
                for ($i = 0; $i < $num_words_in_movie; $i++){  
                    if ($i == $num_words_in_movie - 1) {
                        $movie = $movie . $words[$i];
                    } else {
                        $movie = $movie . $words[$i] . "%20";
                    }
                }
                $_SESSION['movie_photo'] = $movie;
                echo $line1 . $movie . ".jpg' alt='404 Error' width='360' height='538'>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<h1 class='display-3'> "  . $row["title"] . " </h1>";
                echo "<h2 class='display-8'>" . $date . ", " . $row["start_time"] ." at ".$row["name"]." </h2>";
                echo "<h3 class='display-8'> Tickets: ". $row["num_tickets"] ." | Run Time: ". $row["run_time"] ." mins </h3>";
                echo "<p>". $row['plot_synopsis'] . "</p>";
                echo "<p><a name = '" . $row["reservation_id"] . "' class='btn btn-secondary' href='../php/cancelres.php?" . $row["reservation_id"] . "' role='button'>Cancel Reservation &raquo;</a></p>";
                echo "</div>";
                echo "</div>";
            }  
        }

       ?>

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
