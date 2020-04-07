<?php

/**
 * name: Mr.Jesdakorn Saelor
 * date: 28-11-62
 * comment: get dataset of game from URL in database
 * input: get_museum, get_id, get_num and get_volume
 * output: title and image
 */
error_reporting(0);
ini_set('display_errors', 'Off');
include('Database.php');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
$get_num = isset($_GET['Num']) ? $_GET['Num'] : 1;
$get_volume = isset($_GET['volume']) ? $_GET['volume'] : true;

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // header('Location: error.php?Museum=' . $get_museum . '&Id=' . $get_id);
}

$sql = "SELECT * FROM datamuseum  WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url = $row["Url"];
      
        // echo ("<script>console.log('LOAD SQL DATA')</script>");
    }
} else {
    // echo ("<script>console.log('LOAD SQL NOT DATA')</script>");
}

$result = $conn->query($sql);
$conn->close();
$json = file_get_contents($url);
$obj = json_decode($json);

foreach ($obj as $object) {
    $count_json = count($object);
}
