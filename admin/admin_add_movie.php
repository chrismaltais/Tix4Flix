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
        $sql = "insert into Movie (title, plot_synopsis, run_time, rating, director, production_company, start_date, end_date, supplier) values ('$title','$synopsis','$run_time','$rating','$director','$production_company', $start_date, $end_date, '$supplier');";
        echo $sql;
        $conn->query($sql);
        
        $actors_temp = str_replace(", ", "?", $main_actors);
        $actors_temp2 = str_replace(",", "?", $actors_temp);
        $actor_array = explode("?", $actors_temp2);
        $num_actors = count($actor_array);

        for ($i = 0; $i < $num_actors; $i++) {
            echo "Title in for loop is: " . $title;
            echo "Name of actor is: " . $actor_array[$i];
            $sql = "insert into Movie_Actors (title, main_actor) values ('$title', '$actor_array[$i]')";
            $conn->query($sql);
        }
        echo "New records created successfully";
        header('Location: ../admin/admin.php'); 
    } else {
        header('Location: ../admin/admin_add_supplier.html'); 
    }


$conn->close();
?>
