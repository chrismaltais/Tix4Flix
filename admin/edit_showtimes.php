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

    <title>Admin Dashboard</title>

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
            <h1 class="h2">Update Showtimes</h1>
          </div>


          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Showing ID</th>
                  <th>Movie Title</th>
                  <th>Movie Complex</th>
                  <th>Movie Showtime</th>
                  <th>Submit Changes</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get rating of movie selected in find_movies.php
    $result = $conn->query("select showing_id, name, start_time, date_played, title from Showing");
                  $counter = 0;
        while($row = $result->fetch_assoc()) {
if ($_SESSION['current_date'] > $row['date_played']) {  
                echo "<form method='POST' action=../admin/update_showtime.php?". $row["showing_id"] ."?".$row["name"] ."?". $row["start_time"] ."'";
                echo "<tr>";
                  echo "<td>". $row["showing_id"] ."</td>";
                echo "<td>". $row["title"]."</td>";
                  echo "<td><input Name= 'complex".$row["showing_id"]."' type='text' class='form-control' id='complex".$row["showing_id"]."' placeholder='Movie Complex' value='".$row["name"] ."' ></td>";
                  echo "<td><input Name='start_time".$row["showing_id"]."' type='text' class='form-control' id='start_time".$row["showing_id"]."' placeholder='Showtime' value='". $row["start_time"] ."'></td>";
                  echo "<td><button type='submit' class='btn btn-link' role='button'>Update &raquo;</button></td>";
                echo "</tr>";
                echo "</form>";
    
                $counter++;
    
                      
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
