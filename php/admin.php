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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Tix4flix Admin</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link active" href="../pages/admin.html">
                  <span data-feather="home"></span>
                  Admin Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin.html">
                  <span data-feather="users"></span>
                  Manage Customers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_movie.html">
                  <span data-feather="layers"></span>
                  Add a Movie
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_complex.html">
                  <span data-feather="layers"></span>
                  Add a Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_theatre.html">
                  <span data-feather="layers"></span>
                  Add a Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_add_showtime.html">
                  <span data-feather="layers"></span>
                  Add a Showtime
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_analytics.html">
                  <span data-feather="bar-chart-2"></span>
                  Business Analytics
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_complex.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Complex
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_theatre.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Theatre
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../pages/admin_edit_showtimes.html">
                  <span data-feather="bar-chart-2"></span>
                  Edit Showing
                </a>
              </li>

            </ul> 
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin Dashboard</h1>
          
          </div>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Account Number</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Remove Member</th>
                  <th>Member Movie History</th>
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
    $result = $conn->query("select member.member_id, user_account.fname, user_account.lname from user_account left join on member.email = user_account.email");
                    while($row = $result->fetch_assoc()) {
                echo "<tr>";
                  echo "<td>"  . $row["member_id"] . "</td>";
                  echo "<td>"  . $row["fname"] . "</td>";
                  echo "<td>"  . $row["lname"] . "</td>";
                  echo "<td><a class='btn btn-link '  href='#' role='button'>Remove &raquo;</a></td>";
                  echo "<td><a class='btn btn-link ' href='../pages/admin_movie_history.html' role='button'>Movie History &raquo </a>";
                      echo "</td>";
                echo "</tr>";
                    }
                      
                      ?>

   

                <tr>
                  <td>1,002</td>
                  <td>Chris</td>
                  <td>Maltais</td>
                  <td><a class="btn btn-link" href="#" role="button">Remove &raquo;</a></td>
                  <td><a class="btn btn-link" href="../pages/admin_movie_history.html" role="button">Movie History &raquo;</a></td>
                </tr>


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
