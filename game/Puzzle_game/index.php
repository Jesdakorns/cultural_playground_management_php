<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--My CSS -->
    <link rel="stylesheet" href="./css/Responsive_index.css">
    <!-- <link rel="stylesheet" href="./css/Button_menu/Button_menu.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Puzzle game</title>

</head>
<?php include('./js_php/Include_data_index.php'); ?>
<?php include('./js_php/Post_index.php'); ?>
<body>
    <div id="Showtext" class="Show"></div>
    <div class="center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 name_style">
                    <div id="demo">
                        <span class="color-1">P</span>
                        <span class="color-2">U</span>
                        <span class="color-3">Z</span>
                        <span class="color-4">Z</span>
                        <span class="color-1">L</span>
                        <span class="color-1">E</span>
                        <span class="color-2">&nbsp</span>
                        <span class="color-2">G</span>
                        <span class="color-3">A</span>
                        <span class="color-4">M</span>
                        <span class="color-1">E</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            
                <?php foreach ($obj as $result) { ?>
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="">
                    <a class="click" href='javascript:show_per("<?php echo $get_museum ?>","<?php echo $get_id ?>","<?php echo $i ?>","true");'>
                        <img class="flex fa fa-github custom-icon" src="<?php echo $result[$i]->image; ?>">
                    </a>
                </div>
                    </div>
                <?php } ?>
                <?php } ?> </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>