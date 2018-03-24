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
 

    $result = $conn->query("select title, rating from Movie");
    
    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";
    
    while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
                  $title = $row['title'];
                  $rating = $row['rating']; 
                  echo '<option value="'.$rating.'">'.$title . ' ' . $rating.'</option>';
                 
    }

    echo "</select>";
    echo "</body>";
    echo "</html>";
?>
