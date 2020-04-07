<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/game.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<?php include('../js_php/Include_data_main.php') ?>

<body>
    <div class="center" style="z-index:4">
        <div class="row ">
            <div class="col-4 ">
                <div class="bg_results ">
                    <img class="results" id="results" width="150">

                </div>
            </div>
        </div>
    </div>

    <div class="row menu_setting">
        <div class="col-12">
            <div>
                <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"">
            <img class=" setting" src="../img/setting.png" class="rounded float-right" alt="">
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card">
                            <img class="setting home" id="home" src="../img/home.png">
                            <?php if ($get_volume == "true" || $get_volume == 1) { ?>
                                <img class="rounded float-right setting volume_on visible" id="volume_on" src="../img/volume_on.png">
                                <img class="rounded float-right setting volume_off" id="volume_off" src="../img/volume_off.png">
                                <img class="setting music_on visible" id="music_start" src="../img/music_start.png">
                                <img class="setting music_off " id="music_stop" src="../img/music_stop.png">
                            <?php } else if ($get_volume == "false" || $get_volume == 0) { ?>
                                <img class="rounded float-right setting volume_on " id="volume_on1" src="../img/volume_on.png">
                                <img class="rounded float-right setting volume_off visible" id="volume_off1" src="../img/volume_off.png">
                                <img class="setting music_on " id="music_start" src="../img/music_start.png">
                                <img class="setting music_off visible" id="music_stop" src="../img/music_stop.png">
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay-text-end text-center" id="end">
        <div class="container center">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="box-victory">
                        <h1 class="h1">ยินดีด้วยคุณได้</h1>
                        <!-- <div id="star">
                            <div class="row justify-content-center">
                                <div class=" align-self-end" id="star1"> </div>
                                <div class=" align-self-center" id="star2"> </div>
                                <div class=" align-self-end" id="star3"> </div>
                            </div>
                        </div> -->
                        <div id="score_conclude"></div>
                        <h1 class="h1">คะแนน</h1>
                        <div class="h1" id="total_scorePerCent"></div>
                        <div class="row align-items-center justify-content-center icon_menu">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><img id="menu" src="../img/menu.png" style="width: 100%;"> </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><img id="restart" src="../img/restart.png" style="width: 100%;"> </div>
                            <div id="exampleModal1" data-toggle="modal" data-target="#exampleModal"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <ul id="scoreBoard">
                    <li>เวลา: <span id="time">0</span> </li>
                    <li><button class="btn btn-primary" id="btn">เริ่มเกม</button></li>
                    <li>คะแนน: <span id="score">0</span></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" style="height:25px;">
                <center>
                    <h5 style="color:#FFFFFF;" id="title"></h5>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div id="scene">
                    <!-- <img src="../img/cloud.png" id="cloud"> -->
                    <?php foreach ($obj as $object) { ?>
                        <?php for ($i = 0; $i < 8; $i++) { ?>
                            <img src="<?= $object[$i]->image; ?>" class="object object<?= $i ?>" id=" object" >
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <!-- <p style="witdt: 400px; margin: 0 auto;">Hi: <span id="high">0</span></p> -->
            </div>
        </div>
    </div>
    <?php include('../js_php/Main_game.php') ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>