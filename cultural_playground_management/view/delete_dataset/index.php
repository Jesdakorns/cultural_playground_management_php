<?php session_start(); ?>
<?php include './../layout/apphead.php' ?>
<?php include './../layout/app.php' ?>
<?php
if (!$_SESSION["id"]) { ?>
    <script type="text/javascript">
        window.location = "../../view/login";
    </script>
<?php } ?>


<div class="content-wrapper">


    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> ลบชุดข้อมูล
        </h3>
    </div>


    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleSelectGender">เลือกเกม</label>
                        <select class="form-control" id="games" name="games">

                        </select>
                    </div>
                    <button type="submit" class="btn btn-gradient-info" id="search_game">ค้นหา</button>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row mt-5" id="data_delect">


    </div>




</div>



<?php include './../layout/appfooter.php' ?>