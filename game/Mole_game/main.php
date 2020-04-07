<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>เกมหาโบราณวัตถุ</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<?php include('./php/DB_main.php'); ?>

<body>

  <div class="overlay-text-end text-center" id="end">
    <div class="grid-main box-victory">
      <h1 class="title">คะแนน</h1>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="g">
            <div class=" align-self-end " id="star1"> </div>
            <div class=" align-self-center " id="star2"> </div>
            <div class=" align-self-end " id="star3"> </div>
          </div>
        </div>
      </div>
      <h1 class="title" id="score_totle">0</h1>
      <div class="grid-box-victory">
        <div class="btn-home"><img src="./img/home.png"> </div>
        <div class="btn-restart"><img src="./img/restart.png"></div>
      </div>
    </div>
  </div>

  <div class="grid-container-setting">
    <div class="row">
      <div class="">
        <div class="col-auto">
          <a id="btn-setting-click" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
            <img class="btn-setting " src="./img/setting.png" class="rounded float-right" alt="setting">
          </a>
        </div>
        <div class="col-auto">
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card-setting">
              <img class="btn-setting btn-home" src="./img/home.png">
              <?php if ($get_volume == "true" || $get_volume == 1) { ?>
                <img class="btn-setting rounded volume_on visible" id="volume_on" src="./img/volume_on.png">
                <img class="btn-setting rounded volume_off" id="volume_off" src="./img/volume_off.png">
                <img class="btn-setting music_on visible" id="music_start" src="./img/music_start.png">
                <img class="btn-setting music_off " id="music_stop" src="./img/music_stop.png">
              <?php } else if ($get_volume == "false" || $get_volume == 0) { ?>
                <img class="btn-setting rounded volume_on " id="volume_on1" src="./img/volume_on.png">
                <img class="btn-setting rounded volume_off visible" id="volume_off1" src="./img/volume_off.png">
                <img class="btn-setting music_on " id="music_start" src="./img/music_start.png">
                <img class="btn-setting music_off visible" id="music_stop" src="./img/music_stop.png">
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($obj as $value) { ?>
    <h1 class="title text-center"><?= $value[$get_num]->title ?></h1>
  <?php } ?>
  <div class="grid-container">
    <header class="grid-header">
      <div class="controls">
        <h3 class="score">คะแนน : <span>0</span></h3>
        <h3 class="timer">เวลา : <span>0</span> <span id="Bonus"></span></h3>
      </div>
      <div class="text-center">
        <button class="btn btn-start" type="button" name="start" id="start">เริ่มเกม</button>
      </div>
    </header>

    <div class="main-game">
      <?php foreach ($obj as $value) { ?>
        <?php for ($i = 0; $i < 6; $i++) { ?>
          <div class="base">
            <img class="object" src="<?= $value[$get_num]->image ?>" alt="Mole">
            <img class="img-base" src="./img/grass.png" alt="Grass">
          </div>
      <?php }
      } ?>
    </div>
  </div>

</body>

<?php include('./js/scripts.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>