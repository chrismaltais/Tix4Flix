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

    <title>Admin - Movie History</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../custom_css/dashboard.css" rel="stylesheet">
  </head>

  <body>
     <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../admin/admin.php">Tix4flix Admin</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../pages/index.html">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link active pr-0" href="../admin/admin.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_add_movie.html">
                  <span data-feather="layers"></span>
                  Add a Movie
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_add_complex.html">
                  <span data-feather="layers"></span>
                  Add a Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_add_theatre_html.php">
                  <span data-feather="layers"></span>
                  Add a Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_add_showtime_html.php">
                  <span data-feather="layers"></span>
                  Add a Showtime
                </a>
              </li>
                
              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_add_supplier.html">
                  <span data-feather="layers"></span>
                  Add a Supplier
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_analytics.php">
                  <span data-feather="bar-chart-2"></span>
                  BI Analytics
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_edit_complex_html.php">
                  <span data-feather="bar-chart-2"></span>
                  Edit Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/admin_edit_theatre_html.php">
                  <span data-feather="bar-chart-2"></span>
                  Edit Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../admin/edit_showtimes.php">
                  <span data-feather="bar-chart-2"></span>
                  Edit Showing
                </a>
              </li>

            </ul> 
          </div>
        </nav>
          
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Member Movie History</h1>
          </div>

          <h4 class="h4"> Account Details </h4>
          <div class="row pl-3">
               <?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";



    $conn = new mysqli($servername, $username, $password, $dbname);
      
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $sections_of_URL = explode("?", $actual_link);
    $result = $conn->query("select Member.member_id, User_Account.fname, User_Account.lname from User_Account right join Member on Member.email = User_Account.email where Member.member_id = '$sections_of_URL[1]'");

          while($row = $result->fetch_assoc()) {
              
            echo  "<div class='col-md-1.5 mb-3'>";
            echo  "<p>Account Number:</p>";
            echo  "</div>";
            echo  "<div class='col-md-1 mb-3'>";
            echo  "<p class='text-left'>". $row["member_id"] ."</p>";
            echo  "</div>";

            echo "<div class='col-md-1.5'>";
            echo  "<p>First Name:</p>";
            echo "</div>";
            echo "<div class='col-md-1'>";
            echo  "<p>". $row["fname"] ."</p>";
            echo "</div>";

            echo "<div class='col-md-1.5'>";
            echo  "<p>Last Name:</p>";
            echo "</div>";
            echo "<div class='col-md-1'>";
            echo  "<p>". $row["lname"] ."</p>";
            echo "</div>";

          echo "<p></p>";
              break;
       
}
?>
           
        </div>


          <h4 class="h4"> Current Reservations </h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                  
                <tr>
                  <th>Reservation Number</th>
                  <th>Complex</th>
                  <th>Movie</th>
                  <th>Start Time</th>
                  <th>Number of Tickets</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";



    $conn = new mysqli($servername, $username, $password, $dbname);
      
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $sections_of_URL = explode("?", $actual_link);
    $result = $conn->query("select Showing.date_played, Reservations.reservation_id,Showing.name, Movie.title,Showing.start_time,Reservations.num_tickets from Reservations left join Showing on Showing.showing_id = Reservations.showing_id left join Movie on Movie.title = Showing.title where Reservations.account_num  = ' $sections_of_URL[1] '");

          while($row = $result->fetch_assoc()) {
               if ($_SESSION['current_date'] < $row['date_played']) {
                    echo "<tr>";
                  echo "<td>". $row["reservation_id"] ."</td>";
                  echo "<td>". $row["name"] ."</td>";
                  echo "<td>". $row["title"] ."</td>";
                  echo "<td>". $row["start_time"] ."</td>";
                  echo "<td>". $row["num_tickets"] ."</td>";
                echo "</tr>";
               }
         
}
?>

               


              </tbody>
            </table>
          </div>



          <h4 class="h4"> Previous Reservations </h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Reservation Number</th>
                  <th>Complex</th>
                  <th>Movie</th>
                  <th>Start Time</th>
                  <th>Number of Tickets</th>
                </tr>
              </thead>
              <tbody>
       <?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";



    $conn = new mysqli($servername, $username, $password, $dbname);
      
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $sections_of_URL = explode("?", $actual_link);
    $result = $conn->query("select Showing.date_played, Reservations.reservation_id,Showing.name, Movie.title,Showing.start_time,Reservations.num_tickets from Reservations left join Showing on Showing.showing_id = Reservations.showing_id left join Movie on Movie.title = Showing.title where Reservations.account_num  = ' $sections_of_URL[1] '");

          while($row = $result->fetch_assoc()) {
               if ($_SESSION['current_date'] > $row['date_played']) {
          echo "<tr>";
                  echo "<td>". $row["reservation_id"] ."</td>";
                  echo "<td>". $row["name"] ."</td>";
                  echo "<td>". $row["title"] ."</td>";
                  echo "<td>". $row["start_time"] ."</td>";
                  echo "<td>". $row["num_tickets"] ."</td>";
                echo "</tr>";
               }
         
}
?>


              </tbody>
            </table>
          </div>


        </main>

       <footer class="container">
      <div class="d-flex justify-content-center">
      <p>&copy; Tix4flix 2017-2018</p>
    </div>
    </footer>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
