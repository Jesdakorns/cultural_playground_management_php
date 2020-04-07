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
            </span> เพิ่มชุดข้อมูล
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
                </div>
            </div>
        </div>
    </div>

    <div class="card-description">
        <div id="div1"></div>
        <p><code>* หมายเหตุ: กรุณาเลือกข้อมูลให้ครบทั้งหมด 8 ข้อมูล ก่อนทำการบันทึก</code></p>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form id="myForm">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> ลำดับ </th>
                                    <th> รูปภาพ </th>
                                    <th> ชื่อ </th>
                                    <th> ดำเนินการ </th>
                                </tr>
                            </thead>
                        </table>
                        <hr />
                    </form>
                    <div class="mt-3">
                        <div class="template-demo">
                            <button type="submit" id="submit_add" class="btn btn-gradient-success btn-fw">บันทึก</button>
                            <button type="reset" class="btn btn-gradient-light btn-fw" onclick="myFunction()">ล้างข้อมูลที่เลือก</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function myFunction() {
        document.getElementById("myForm").reset();
    }
</script>
<?php include './../layout/appfooter.php' ?>