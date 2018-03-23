<?php 
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    
    // Connect DB
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../php/edit_info.php">Edit Personal Info</a>
              <a class="dropdown-item" href="../php/newres.php">My Reservations</a>
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
              echo "<h5 class='display-8'>" . $_SESSION['showing'] . " | Tickets: " . $_SESSION['num_tickets'] . " | Runtime: " .  $_SESSION['runtime'] . " mins</h5>";
          ?>
          
          <p>We look forward to seeing you in one of our movie theatres shortly! In the meantime, you can continue to look for other movies that might interest you on our website. Make sure you arrive to the theatre 10-15 minutes before the movie with your movie snacks in hand. Enjoy! </p>
        
          <?php
            // Get last reservation ID to have been created
            $get_resID_query = $conn->query("select max(reservation_id) from Reservations");
            
            // Prep variable so SQL statement (couldn't get $_SESSION vars to work in statement for some reason)
            $showing = $_SESSION['showing'];
            $complex = $_SESSION['complex'];
            $title = $_SESSION['movie_title'];
            $num_tickets = $_SESSION['num_tickets'];
            $user_id = $_SESSION['user_id'];
            $date = $_SESSION['date']; 
            
            // SQL for grabbing showing ID for purchased reservation
            $sql = "select showing_id from Showing where start_time = '$showing' and name = '$complex' and title = '$title'";
              
            $get_showingID_query = $conn->query($sql);
            
            $showing_id = mysqli_fetch_array($get_showingID_query)['showing_id'];
             
            // Assign new res ID
            if ($get_resID_query->num_rows > 0) {
                $next_reservation_id = mysqli_fetch_array($get_resID_query)['max(reservation_id)'] + 1;
            } else {
                $next_reservation_id = 1;
            }
            
            // Decrement number of seats available
            $conn->query("UPDATE Showing SET num_seats = num_seats - $num_tickets WHERE showing_id = '$showing_id'");
            
            $conn->query("insert into Reservations (reservation_id, num_tickets, account_num, showing_id) values
                        ('$next_reservation_id', $num_tickets, $user_id, '$showing_id')");
              
          ?>

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
