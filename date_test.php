<!DOCTYPE html>
<html>
<body>

<?php
$startdate=strtotime("Today");
    echo $startdate;
$enddate=strtotime("+1 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("", $startdate) . "<br>";
  $startdate = strtotime("+1 day", $startdate);
}
?>

</body>
</html>