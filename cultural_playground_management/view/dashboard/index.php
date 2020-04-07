<?php session_start();?>

<?php include './../layout/apphead.php'?>
<?php include './../layout/app.php'?>

<?php
if (!$_SESSION["id"]) {?>
    <script type="text/javascript">
        window.location = "../../view/login";
    </script>
<?php }?>


<div class="content-wrapper">
    <!-- start content name -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> หน้าหลัก
        </h3>
    </div>
    <!-- end content name -->
    <!-- start content -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/database.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">
                                จำนวนข้อมูล
                            </h3>
                            <h1 class="mb-5" id="item_count">0</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/casino.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">Matching Game</h3>
                            <h1 class="mb-5" id="matching_count">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/puzzle.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">Puzzle Game</h3>
                            <h1 class="mb-5" id="puzzle_count">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-warning card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/trivial.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">Quiz Game</h3>
                            <h1 class="mb-5" id="quiz_count">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-primary card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/tools-and-utensils.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">Mole Game</h3>
                            <h1 class="mb-5" id="mole_count">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 stretch-card grid-margin">
                    <div class="card bg-gradient-dark card-img-holder text-white">
                        <div class="card-body remake">
                            <img src="../../assets/images/dashboard/spring-swing-rocket.png" class="card-img-absolute" alt="circle-image" />
                            <h3 class="font-weight-normal mb-3">Cosmos Game</h3>
                            <h1 class="mb-5" id="cosmos_count">0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-5">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="mb-4">ตารางแสดงจำนวนการใช้งานข้อมูล</h3>
                            <form id="myForm">
                                <table id="antiques_statistics_table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> ลำดับ </th>
                                            <th> ชุดข้อมูล </th>
                                            <th> เกม </th>
                                            <th> จำนวนการใช้งาน </th>

                                        </tr>
                                    </thead>
                                </table>
                                <hr />
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-5 mb-5">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="mb-4">สถิติแสดงภาพรวมของเกม</h3>
                            <div id="chartContainer" style="height: 430px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="mb-4">ตารางแสดงจำนวนการใช้งานชุดข้อมูล</h3>
                            <form id="myForm" >
                                <table id="chart_table" class="table table-striped table-bordered" style="width:100%;">
                                    <thead >
                                        <tr style="white-space: nowrap;">
                                            <th> ลำดับ </th>
                                            <th> ชุดข้อมูล </th>
                                            <th> เกม </th>
                                            <th> จำนวนการใช้งาน </th>

                                        </tr>
                                    </thead>
                                </table>
                                <hr />
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>
<?php include './../layout/appfooter.php'?>
<script>

</script>