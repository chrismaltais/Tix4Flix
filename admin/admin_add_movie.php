<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "complexdb";

$title = $_POST["title"]; 
$synopsis = $_POST["synopsis"]; 
$run_time = $_POST["run_time"]; 
$rating = $_POST["rating"]; 
$director =  $_POST["director"];
$production_company = $_POST["production_company"];  
$start_date = $_POST["start_date"]; 
$end_date = $_POST["end_date"]; 
$main_actors = $_POST["main_actors"];  
$supplier = $_POST["supplier"]; 

 


// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqlsupp = "select * from Supplier where company_name = '$supplier' ";
$result = $conn->query($sqlsupp);
    if (mysqli_num_rows($result)!=0) {
        $sql = "insert into Movie (title, plot_synopsis, run_time, rating, director, production_company, start_date, end_date, supplier) values ('$title','$synopsis','$run_time','$rating','$director','$production_company','$start_date', '$end_date', '$supplier');";
        $sql .= "insert into Movie_Actors(title, main_actor) values ('$title', '$main_actors');";
        $conn->multi_query($sql);
        echo "New records created successfully";
        header('Location: ../admin/admin.php'); 
    } else {
        header('Location: ../admin/suppliers.php'); 
    }


$conn->close();
?>
