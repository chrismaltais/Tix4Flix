<!DOCTYPE html>
<html>
<body>

<?php
$startdate=strtotime("Today");
$enddate=strtotime("+1 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d y", $startdate) . "<br>";
  $startdate = strtotime("+1 day", $startdate);
}
?>

</body>
</html>