<!DOCTYPE html>
<html lang="en">
<?php include('./js_php/Include_data_index.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style_index.css">
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
    <title>Document</title>
</head>


<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="header">
                    <h1 class="">QUIZ GAME</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container center">
        <div class="row align-items-center justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-8 ">

                <div class="section">
                    <a href="./main.php?Museum=<?php echo $get_museum ?>&Id=<?php echo $get_id ?>&volume=<?php echo $get_volume ?>"><button>เริ่มเกม</button></a>
                </div>
                <p></p>
                <div class="section">
                    <a><button data-toggle="modal" data-target="#exampleModalCenter">คำแนะนำภาพไอคอน</button></a>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">คำแนะนำภาพไอคอน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/menu.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-10 col-sm-10 col-9">
                            <h3>กลับหน้าหลัก</h3>
                        </div>
                    </div>
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/restart.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9">
                            <h3>เริ่มเกมใหม่</h3>
                        </div>
                    </div>
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/list.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9">
                            <h3>ตรวจเช็คคำตอบ</h3>
                        </div>
                    </div>
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/setting.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9">
                            <h3>ตั้งค่าเสียง</h3>
                        </div>
                    </div>
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/music_start.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9">
                            <h3>เสียงเพลง</h3>
                        </div>
                    </div>
                    <div class="row align-items-center" style="border-bottom:1px solid #e2e2e2;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3" style="padding: 5px;">
                            <img src="./img/volume_on.png" style="width: 100%;">
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-9">
                            <h3>เสียงประกอบ</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-112405207-1"></script>
</body>

</html>