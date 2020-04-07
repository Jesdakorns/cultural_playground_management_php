<?php
/**
 * name: Mr.Jesdakorn Saelor
 * date: 24-2-63
 * comment: The functions used to count
 * input: email and password
 * output: id, museum_code and name
 */
session_start();
include './../../confic.php';
$con = new mysqli("$servername", "$username", "$password", "$dbname");
mysqli_set_charset($con, "utf8");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    while ($value = $result->fetch_assoc()) {

        $_SESSION["id"] = $value["id"];
        $_SESSION["museum_code"] = $value["museum_code"];
        $_SESSION["name"] = $value["name"];
        session_write_close();
    }
?>
    <script type="text/javascript">
        window.location = "../../view/dashboard";
    </script>
<?php
} else { ?>
    <script type="text/javascript">
        window.location = "../../view/login";
    </script>
<?php }
?>