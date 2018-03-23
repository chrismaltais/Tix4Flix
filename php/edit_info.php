<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "complexdb";
    $email = $_SESSION["email"];
    $user_id = $_SESSION["user_id"];
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $passworddb, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $result = $conn->query("select fname from User_Account where email='$email'");
    $fname = mysqli_fetch_array($result)['fname'];

    $result = $conn->query("select lname from User_Account where email='$email'");
    $lname = mysqli_fetch_array($result)['lname'];
        
    $result = $conn->query("select _password from User_Account where email='$email'");
    $_password = mysqli_fetch_array($result)['_password'];

    $result = $conn->query("select street_num from User_Account where email='$email'");
    $street_num = mysqli_fetch_array($result)['street_num'];

    $result = $conn->query("select street_name from User_Account where email='$email'");
    $street_name = mysqli_fetch_array($result)['street_name'];

    $result = $conn->query("select phone_number from User_Account where email='$email'");
    $phone_number = mysqli_fetch_array($result)['phone_number'];

    $result = $conn->query("select postal_code from User_Account where email='$email'");
    $postal_code = mysqli_fetch_array($result)['postal_code'];

    $result = $conn->query("select card_number from Member where member_id='$user_id'");
    $cc_num = mysqli_fetch_array($result)['card_number'];

    $result = $conn->query("select card_expiry from Member where member_id='$user_id'");
    $cc_exp = mysqli_fetch_array($result)['card_expiry'];

    $conn->close();
    ?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Edit Account Info</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../custom_css/registration.css" rel="stylesheet">
  </head>


  <body class="bg-light">

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
              <a class="dropdown-item" href="../php/newres.php">My Reservations</a>
              <a class="dropdown-item" href="../php/newres.php">Reservation History</a>
              <a class="dropdown-item" href="../pages/index.html">Logout</a>
            </div>
          </li>

        </ul>

      </div>
    </nav>

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../photos/logo2.svg" alt="" width="150" height="150">
        <h2>Edit User Information</h2>
        <p class="lead">Edit any information, just make sure to press save!</p>
      </div>
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Edit Info</h4>
          <form class="needs-validation" novalidate method="POST" action="../php/updateInfo.php">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input Name = fname type="text" class="form-control" id="firstName" placeholder="Wendy" value="<?php echo $fname;?>" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input Name = lname type="text" class="form-control" id="lastName" placeholder="Powley" value="<?php echo $lname;?>" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 order-md-1">
           <div class="row">
            <div class="col-md-6 mb-3">
              <label for="street_number">Phone Number</label>
              <input Name=phone_number type="text" class="form-control" id="phone_number" placeholder="6135555555" value="<?php echo $phone_number;?>"required>
              <div class="invalid-feedback">
                Please enter a valid phone number.
              </div>
            </div>
          </div>
        </div>

          <div class="col-md-12 order-md-1">
          <div class="row">
          <div class="col-md-6 mb-3">
              <label for="street_number">Password</label>
              <input Name=password type="text" class="form-control" id="_password" placeholder="" value="<?php echo $_password;?>"required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="street_name">Confirm Password</label>
              <input Name=password2 type="text" class="form-control" id="_password2" placeholder="" value="<?php echo $_password;?>" required>
              <div class="invalid-feedback">
                
              </div>
            </div>
            </div>
          </div>

          <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Address</h4>
            <div class="row">

            <div class="col-md-4 mb-3">
              <label for="street_number">Street Number</label>
              <input Name=street_number type="text" class="form-control" id="street_number" placeholder="340" value="<?php echo $street_num;?>" required>
            </div>

            <div class="col-md-5 mb-3">
              <label for="street_name">Street Name</label>
              <input Name=street_name type="text" class="form-control" id="street_name" placeholder="Brock St" value="<?php echo $street_name;?>" required>
            </div>

            <div class="col-md-3 mb-3">
              <label for="postal_code">Postal Code</label>
              <input Name=postal_code type="text" class="form-control" id="postal_code" placeholder="K7L1S8" value="<?php echo $postal_code;?>" required>
            </div>
            </div>
          </div>

          <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Payment</h4>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="cc-name">Name on card</label>
                <input Name=cc_name type="text" class="form-control" id="cc-name" placeholder="">
                <small class="text-muted">Full name as displayed on card</small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input Name=cc_number type="text" class="form-control" id="cc-number" placeholder="" value="<?php echo $cc_num;?>"required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
              <div class="col-md-2 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input Name=cc_exp type="text" class="form-control" id="cc-expiration" placeholder="" value="<?php echo $cc_exp;?>"required>
                <div class="invalid-feedback">
                  (MM/YY)
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>


          </div>
          </form>
        </div>
      </div>


      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Tix4Flix</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
