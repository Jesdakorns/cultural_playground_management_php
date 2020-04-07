<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<?php include('js_php/Include_data_index.php') ?>
<body>

</body>
<script>
  $(document).on("click", "html", function() {
    location.replace("main?Museum=" + <?php echo $get_museum ?> + "&Id=" + <?php echo $get_id ?> + "&volume=" + <?php echo $get_volume ?>);
  });
</script>
</html>