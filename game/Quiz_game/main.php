<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Docume
    </title>
</head>
<?php include('./js_php/Include_data_main.php') ?>

<body>
    <div class="overlay-text  text-center" id="overlay">
    </div>

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
            <img class=" setting" src="./img/setting.png" class="rounded float-right" alt="">
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card">
                            <img class="setting home" id="home" src="./img/home.png">
                            <?php if ($get_volume == "true" || $get_volume == 1) { ?>
                                <img class="rounded float-right setting volume_on visible" id="volume_on" src="./img/volume_on.png">
                                <img class="rounded float-right setting volume_off" id="volume_off" src="./img/volume_off.png">
                            <?php } else if ($get_volume == "false" || $get_volume == 0) { ?>
                                <img class="rounded float-right setting volume_on " id="volume_on1" src="./img/volume_on.png">
                                <img class="rounded float-right setting volume_off visible" id="volume_off1" src="./img/volume_off.png">
                            <?php } ?>
                            <img class="setting music_on " id="music_start" src="./img/music_start.png">
                            <img class="setting music_off visible" id="music_stop" src="./img/music_stop.png">

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
                        <h1 class="h1">ยินดีด้วย</h1>
                        <div id="star">
                            <div class="row justify-content-center">
                                <div class=" align-self-end" id="star1"> </div>
                                <div class=" align-self-center" id="star2"> </div>
                                <div class=" align-self-end" id="star3"> </div>
                            </div>
                        </div>
                        <h1 class="h1">คะแนน</h1>
                        <div class="h1" id="total_scorePerCent"></div>
                        <div class="row align-items-center justify-content-center icon_menu">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><img id="menu" src="./img/menu.png" style="width: 100%;"> </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><img id="restart" src="./img/restart.png" style="width: 100%;"> </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"><img id="list" src="./img/list.png" style="width: 100%;" data-toggle="modal" data-target="#exampleModal"> </div>
                            <div id="exampleModal1" data-toggle="modal" data-target="#exampleModal"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="bg_main">
                    <div id="topic"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bg_time">
                    <div class="timer">
                        <div id="btimeGauge"></div>
                        <div id="timeGauge"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bg_Quiz">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-4 col-sm-5 col-9">
                            <div id="qImage"></div>
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-7 col-12">
                            <h3 class="text-center" style="color:#ffff">ภาพต่อไปนี้คือภาพอะไร</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="bg_ans">
                                        <div id="ans1">
                                           
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="bg_ans">
                                        <div id="ans2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ตรวจสอบคำตอบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="main_list">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./js_php/Main_game.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
</body>

</html>