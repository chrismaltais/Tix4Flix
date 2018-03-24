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

    <?php
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "complexdb"; 
    
    // Create connection
    $conn = new mysqli($servername, $username, $passworddb, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("select name from Theatre_Complex");
    $result2 = $conn->query("select title from Movie");
    ?>
      
    <main role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
            <div class="d-flex justify-content-start"> 
                <h1 class="display-4">Find a showing</h1>
            </div> 
            <form class="d-flex justify-content-around" action="../php/find_showtime.php" method="POST">
                        <div class="input-group mb-3 pr-3">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="complexselect">Complex</label>
                        </div>
                        <select class="custom-select" id="complexselect" name="complex_chosen">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                unset($id, $name);
                                $name = $row['name']; 
                                echo '<option value="'.$name.'">'.$name.'</option>';
                 
                            }
                            ?>
                        </select>
                        </div>


	    <div class="input-group mb-3 pr-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="movie">Movie  </label>
            </div>
                <select class="custom-select" id="movie" name="movie_chosen">
                    <?php
                        while ($row = $result2->fetch_assoc()) {
                            unset($id, $name);
                            $name = $row['title']; 
                            echo '<option value="'.$name.'">'.$name.'</option>';
                        }
                    ?>
                </select>        
        </div>
     
        
        
        <div class="input-group mb-3 pr-3">
                        <div class="input-group-prepend">
                        <label class="input-group-text" for="date">Date</label>
                        </div>
                        <select class="custom-select" id="date" name="date_chosen">
                            <?php
                                $startdate=strtotime("Today");
                                $enddate=strtotime("+1 weeks", $startdate);

                                while ($startdate < $enddate) {
                                    echo '<option value="'.date("Y-m-d", $startdate).'">' . date("Y-m-d", $startdate) . '</option>';;
                                    $startdate = strtotime("+1 day", $startdate);
                                }
                            ?>
                        </select>
                        </div>
          
                    
    
                
                <div class="pb-3">
                <button class="btn btn-primary pb-2" type="submit">Find Showtimes &raquo;</button>
                </div>
            </form>
            </div>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          
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
