<?php

/**
 * name: Mr.Jesdakorn Saelor
 * date: 29-12-62
 * comment: get dataset of game from URL in database
 * input: get_museum, get_id and get_volume
 * output: URL
 */
// error_reporting(1);
// ini_set('display_errors', 'Off');
include('Database.php');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
$get_volume = isset($_GET['volume']) ? $_GET['volume'] : 1;
echo ("
<script type='text/javascript'>
var data_title = new Array();
</script>
");
$counts = 0;
$count = 0;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM datamuseum  WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $url = $row["Url"];
    $namegame =  $row["Name"];
    $count = $row["sumCount"];
    $count++;
  }
} else {
  // echo "<script>console.log('ERROR LOAD SQL')</script>";
}

$sql = "UPDATE datamuseum SET sumCount=$count  WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
$conn->close();
$json = file_get_contents($url);
$obj = json_decode($json);
$i = 0;
foreach ($obj as $obj1) {
  $count = count($obj1);
}

foreach ($obj as $obj_title) {
  for ($i = 0; $i < $count; $i++) {
    $num = $obj_title[$i]->title;
    echo "<script>data_title[$counts] = ['$num']</script>";
    $counts++;
  }
}
