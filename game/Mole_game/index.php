<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>เกมหาโบราณวัตถุ</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style_index.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<?php include('./php/DB_index.php'); ?>

<body class="bg">
 
    <div class="container-start">
      <div class="box-1">
        <div class="role">
          <div class="block"></div>
          <button class="btn btn-start" type="button" id="start_game">เริ่มเกม</button>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="box">
        <div class="title">
          <span class="block"></span>
          <h1>เกมหาโบราณวัตถุ</h1>
        </div>
      </div>
    </div>
 
</body>

<script>
  $(document).on("click", "#start_game", function() {
    location.replace("./select.php?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?>);
  });
</script>

</html>