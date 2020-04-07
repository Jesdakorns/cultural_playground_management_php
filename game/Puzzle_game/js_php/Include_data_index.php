<?php
error_reporting(-1);
ini_set('display_errors', 'Off');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
$get_num = isset($_GET['Num']) ? $_GET['Num'] : 1;
include('./js_php/Database.php');
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM datamuseum WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url = $row["Url"];
        $namegame =  $row["Name"];
        $count = $row["sumCount"];
        $count++;
    }
} else {
    echo "ERROR LOAD SQL";
}
$sql = "UPDATE datamuseum SET sumCount=$count WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
$conn->close();
$json = file_get_contents($url);
$obj = json_decode($json); 

?>