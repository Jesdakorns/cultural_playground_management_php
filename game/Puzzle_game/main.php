<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!--My CSS -->
    <link rel="stylesheet" href="./css/Responsive_main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Puzzle game</title>
</head>


<body>




    <div class="overlay-text-start visible text-center" id="start">
        <span class="overlay-text-medium" id="timestart" style="font-size: 28vw;">3</span>
    </div>
    <div class="overlay-text-end text-center" id="end">
        <div class="container center">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-sm-8 col-12">
                    <div class="box-victory">
                        <h1 class="h1">คะแนน</h1>
                        <div id="star">
                            <div class="row g">
                                <div class=" align-self-end" id="star1"> </div>
                                <div class=" align-self-center" id="star2"> </div>
                                <div class=" align-self-end" id="star3"> </div>
                            </div>
                        </div>
                        <h1 class="h1">เวลา</h1>
                        <div class="h1" id="total_time"></div>
                        <div class="row align-items-center justify-content-center icon_menu">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4"> <img id="menu" src="./img/menu.png" width="90"> </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4"> <img id="restart" src="./img/restart.png" width="90"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="time"></div>
    <div align="right">

        <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="     margin-top: 5px;   margin-right: 18px;">
            <img class="setting" src="./img/setting.png" class="rounded float-right" alt="">
        </a>

    </div>
    <div class="row justify-content-end" style="
    margin-right: 2px;
">
        <div class="" style="z-index: 6;">
            <div class="collapse multi-collapse" id="multiCollapseExample1" style="margin-right: 14px;">
                <div class="card">
                    <img class="setting" id="home" src="./img/home.png" class="rounded float-right" alt="">
                    <img class="setting" id="restart1" src="./img/restart1.png" class="rounded float-right" alt="">
                    <?php
                    $get_volume = isset($_GET['volume']) ? $_GET['volume'] : "";
                    echo "<script>console.log('$get_volume');</script>"; ?>
                    <?php if ($get_volume == "true") { ?>
                        <img class="setting music_on visible" id="music" src="./img/music_on.png" class="rounded float-right" alt="">
                        <img class="setting music_off " id="music1" src="./img/music_off.png" class="rounded float-right" alt="">


                    <?php } else if ($get_volume == "false") { ?>
                        <img class="setting music_on1 " id="music2" src="./img/music_on.png" class="rounded float-right" alt="">
                        <img class="setting music_off1 visible" id="music3" src="./img/music_off.png" class="rounded float-right" alt="">
                    <?php } ?>
                    <img class="setting music_on " id="music_start" src="./img/music_start.png" class="rounded float-right" alt="">
                    <img class="setting music_off visible" id="music_stop" src="./img/music_stop.png" class="rounded float-right" alt="">

                </div>
            </div>
        </div>
    </div>
    <div class="container center">
        <div class="row align-items-center justify-content-center">

            <div class="col-xl-4 col-lg-12 col-md-4 col-sm-4 col-12">
                <div class="">
                    <div class="">
                        <div class="">
                            <div id="name"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-8 col-sm-8 col-12">
                <div class="">
                    <div class="">
                        <div class="">
                            <div id="puzzle-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('./js_php/Main_game.php'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>