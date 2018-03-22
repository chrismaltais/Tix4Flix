<?php 
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "complexdb";
    $review = $_POST["review"]; 
    //$member = $_SESSION["user_id"];
    //$title = $_SESSION["title"];
    $member = 1;
    $title = "Harry Potter";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get rating of movie selected in find_movies.php
    $sql = "insert into opinion (member_id, title, review) values ('$member','$title','$review');";
    
    $result = $conn->query($sql);

?>
