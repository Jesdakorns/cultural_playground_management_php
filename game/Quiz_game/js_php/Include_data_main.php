<?php
error_reporting(-1);
ini_set('display_errors', 'Off');
include('./js_php/Database.php');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
$get_volume = isset($_GET['volume']) ? $_GET['volume']:true;
// $get_id = $_POST['Id'];
// $get_num = $_POST['Num'];
echo "<script>console.log('$get_id'+'/'+'$get_volume');</script>";
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
  }
} else {
  echo "ERROR LOAD SQL";
}
$conn->close();
$json = file_get_contents($url);
$obj = json_decode($json);
$i = 0;
foreach ($obj as $obj1) {
  $count = count($obj1);
}
// echo "<script>console.log('จำนวนข้อมูลทั้งหมด:'+$count);</script>";
?>
