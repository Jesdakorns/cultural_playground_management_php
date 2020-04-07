<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>เกมหาโบราณวัตถุ</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style_select.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<style type="text/css">

 
</style>
<?php include('./php/DB_index.php'); ?>

<body>
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-12 ">
        <h1 class="grid-title">เลือกโบราณวัตถุ</h1>
      </div>
    </div>
    <ul class="gallery">
      <?php foreach ($obj as $value) { ?>
        <?php for ($i = 0; $i < $count_json; $i++) { ?>
          <?php if ($i == 0) { ?>
            <div class="row justify-content-center ">
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i  ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i]->image ?>" alt="image" />
                    <p><?= $value[$i]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 1 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 1]->image ?>" alt="image" />
                    <p><?= $value[$i + 1]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 2 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 2]->image ?>" alt="image" />
                    <p><?= $value[$i + 2]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 3 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 3]->image ?>" alt="image" />
                    <p><?= $value[$i + 3]->title ?></p>
                  </a></li>
              </div>
            <?php } else if ($i == 4) { ?>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i]->image ?>" alt="image" />
                    <p><?= $value[$i]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 1 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 1]->image ?>" alt="image" />
                    <p><?= $value[$i + 1]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 2 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 2]->image ?>" alt="image" />
                    <p><?= $value[$i + 2]->title ?></p>
                  </a></li>
              </div>
              <div class="col-6 col-md-4 col-lg-3 mb-5">
                <li value="<?= $i + 3 ?>" onclick="Select(this);"><a href="#"><img src="<?= $value[$i + 3]->image ?>" alt="image" />
                    <p><?= $value[$i + 3]->title ?></p>
                  </a></li>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
</body>
<script>
  function Select(e) {
    var id = $(e).val();
    console.log(id);
    location.replace('main.php?Museum=<?= $get_museum ?>&Id=<?= $get_id ?>&Num=' + id + '&volume=<?= $get_volume ?>');
  }
  $("#Select").on("change", function() {
    // data_index
    var index = $("#Select").val();
    console.log(index);
    if (index >= 0) {
      data_index[index];
      $("#img").html("<img src='" + data_index[index] + "' class='rounded mx-auto d-block' style='width: 100% ; '>");

    } else if (index < 0) {
      alert("กรุณาเลือกข้อมูลที่จะเล่น");
      $("#img").html("<img src='./img/img_bg.png' class='rounded mx-auto d-block' style='width: 100% ; '>");
    }
    // alert($("#Select").val()); 
  });
</script>

</html>