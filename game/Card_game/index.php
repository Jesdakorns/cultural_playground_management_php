<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Your CSS -->
  <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- w3schools CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <title>Home</title>
</head>
<style>
  body {
    margin: 0;
    background: #ffff;
  }

  header {
    padding: 1% 0% 0% 0%;
  }

  section {
    padding: 3%;
  }

  footer {
    padding: 0% 0% 1% 0%;
  }

  .bg {
    background: #ffff;
  }

  .bg_header1 {
    font-weight: bold;
    padding: 2%;
    font-size: 48px;
    background-image: url('./Assets/Images/cardgame_image/tour-bg.png');
    background-repeat: repeat-x;
  }

  .bg_footer {
    width: 100%;
    height: 265px;
    background-image: url('./Assets/Images/cardgame_image/desk.png');
    background-repeat: repeat-x;
    /* background-attachment: fixed;
      background-position: bottom; */
  }

  .bg_shadow {
    width: 100%;
    height: 250px;
    background-image: url("./Assets/Images/cardgame_image/sliderbg2.png");
    background-repeat: repeat-x;
  }

  .btn {
    border: 4px solid #ffff;
    background: #ffff;
    border-radius: 20px;
    padding: 1% 2% 1% 2%;
    -webkit-box-shadow: 0px 0px 7px 7px rgba(112, 111, 112, 1);
    -moz-box-shadow: 0px 0px 7px 7px rgba(112, 111, 112, 1);
    box-shadow: 0px 0px 7px 7px rgba(112, 111, 112, 1);
    font-size: 32px;
  }

  .btn-padding {
    padding: 0% 0% 1% 0%;
  }

  .btn-level1 {
    color: #ffff;
    background: #009933;
  }

  .btn-level2 {
    color: #ffff;
    background: #ff9933;
  }

  .btn-level3 {
    color: #ffff;
    background: #ff3300;
  }

  .btn:hover {
    background: #ffff;

  }

  @media (orientation: portrait) {

    /* ipadPro */
    @media (max-width: 1300px) {
      header {
        padding: 2% 0% 13% 0%;
        /* color: #ff33cc; */
      }

      section {
        padding: 8%;
      }

      footer {
        padding: 13% 0% 2% 0%;
      }

      .bg_header {

        font-size: 72px;
      }

      .bg_footer {
        height: 250px;
        margin-top: -2%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 42px;
      }

      .btn-padding {
        padding: 0% 0% 2% 0%;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    /* ipad */
    @media (max-width: 800px) {
      header {
        padding: 2% 0% 11% 0%;
        /* color: #99ccff; */
      }

      section {
        padding: 6%;
      }

      footer {
        padding: 11% 0% 2% 0%;
      }

      .bg_header {

        font-size: 56px;
      }

      .bg_footer {
        height: 250px;
        margin-top: 3%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 32px;
      }

      .btn-padding {
        padding: 0% 0% 2% 0%;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    /*  iphone 6,7,8 = 375x667
        iphone 6,7,8 Plus = 414x736
        iphone x = 375x812 */
    @media (max-width: 500px) {
      header {
        padding: 2% 0% 5% 0%;
        /* color: #ff3300; */
      }

      section {
        padding: 4%;
      }

      footer {
        padding: 5% 0% 2% 0%;
      }

      .bg_header {

        font-size: 32px;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 20px;
      }

      .btn-padding {
        padding: 0% 0% 2% 0%;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    /*  iphone 6,7,8 = 375x667
        iphone 6,7,8 Plus = 414x736
        iphone x = 375x812 */
    @media (max-width: 420px) {
      header {
        padding: 2% 0% 5% 0%;
        /* color: #ff9933; */
      }

      section {
        padding: 4%;
      }

      footer {
        padding: 5% 0% 2% 0%;
      }

      .bg_header {

        font-size: 32px;
      }

      .bg_footer {
        height: 250px;
        margin-top: 0%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 20px;
      }

      .btn-padding {
        padding: 0% 0% 2% 0%;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    @media (max-width: 320px) {
      header {
        padding: 2% 0% 2% 0%;
        /* color: #009933; */
      }

      section {
        padding: 1%;
      }

      footer {
        padding: 2% 0% 2% 0%;
      }

      .bg_header {

        font-size: 18px;
      }

      .bg_footer {
        height: 250px;
        margin-top: 2%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 16px;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }
  }

  @media (orientation: landscape) {
    @media (max-width: 1400px) {}

    @media (max-width: 1024px) {}

    @media (max-width: 823px) {
      header {
        padding: 2% 0% 2% 0%;
        /* color: #009933; */
      }

      section {
        padding: 1%;
      }

      footer {
        padding: 2% 0% 2% 0%;
      }

      .bg_header {

        font-size: 18px;
      }

      .bg_footer {
        height: 250px;
        margin-top: -27%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 16px;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    @media (max-width: 736px) {
      header {
        padding: 2% 0% 2% 0%;
        /* color: #009933; */
      }

      section {
        padding: 1%;
      }

      footer {
        padding: 2% 0% 2% 0%;
      }

      .bg_header {

        font-size: 18px;
      }

      .bg_footer {
        height: 250px;
        margin-top: -30%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 16px;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }

    @media (max-width: 568px) {
      header {
        padding: 2% 0% 2% 0%;
        /* color: #009933; */
      }

      section {
        padding: 1%;
      }

      footer {
        padding: 2% 0% 2% 0%;
      }

      .bg_header {

        font-size: 18px;
      }

      .bg_footer {
        height: 250px;
        margin-top: -40%;
      }

      .btn {
        border: 4px solid #ffff;
        background: #ffff;
        border-radius: 12px;
        padding: 1% 2% 1% 2%;
        font-size: 16px;
      }

      .btn-level1 {
        color: #ffff;
        background: #009933;
      }

      .btn-level2 {
        color: #ffff;
        background: #ff9933;
      }

      .btn-level3 {
        color: #ffff;
        background: #ff3300;
      }
    }
  }
</style>
<?php
error_reporting(-1);
ini_set('display_errors', 'Off');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;

include('js/database.php');


$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM datamuseum WHERE Name=$get_museum and Id=$get_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {

    $namegame =  $row["Name"];
  }
}
$conn->close();
?>

<body>
  <div class="container-fluid  ">
    <!-- <div id="victory-text" class="overlay-text-b">
      <span class="icon-b" ><img src="./Assets/Images/logo.png" alt=""></span>
      <p class="text-icon-b">โปรดหมุนอุปกรณ์ของคุณ</p>
    </div> -->
    <header>
      <div class="row">
        <div class="col-12">
          <h1 class="bg_header bg_header1 text-center">
            Matching Game

          </h1>
        </div>
      </div>
    </header>
    <!-- <aside></aside> -->

    <section>

      <div class="row align-items-center">
        <div class="col-12 text-center btn-padding">
          <a class="btn btn-level1" href="./level1.php?Museum=<?php echo $get_museum?>&Id=<?php echo $get_id ?>">
            LEVEL1
            <?php for ($i = 0; $i < 1; $i++) { ?>
              <i class="fa fa-star"></i>
            <?php } ?>
          </a>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-12 text-center btn-padding">
          <a class="btn btn-level2" href="./level2.php?Museum=<?php echo $get_museum?>&Id=<?php echo $get_id ?>">
            LEVEL2
            <?php for ($i = 0; $i < 2; $i++) { ?>
              <i class="fa fa-star"></i>
            <?php } ?>
          </a>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-12 text-center btn-padding">
          <a class="btn btn-level3" href="./level3.php?Museum=<?php echo $get_museum?>&Id=<?php echo $get_id ?>">
            LEVEL3
            <?php for ($i = 0; $i < 3; $i++) { ?>
              <i class="fa fa-star"></i>
            <?php } ?>
          </a>
        </div>
      </div>
    </section>

    <footer class="bg_footer">

    </footer>

  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
</body>

</html>