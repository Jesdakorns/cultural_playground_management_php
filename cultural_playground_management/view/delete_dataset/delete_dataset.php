<?php session_start(); ?>
<?php

/**
 * name: Mr.Jesdakorn Saelor
 * date: 21-2-63
 * comment: Delete datasets
 * input: dataset_code
 * output: status
 */
function postApiDeleteDataset($request)
{
    include './../../confic.php';

    $code_user = $_SESSION['museum_code'];
    $requestPost = json_decode($request);
    $dataset_code = $requestPost->dataset_code;
    // echo $dataset_code ;
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT Url FROM datamuseum WHERE Id = $dataset_code";
    $resultSql = $con->query($sql);



    $link_past_file_sql = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
  
    $cut_url = str_replace("view/delete_dataset/delete_dataset.php", "", $link_past_file_sql);

        
    foreach ($resultSql as $resultSql) {

        $past_file = str_replace($cut_url, "../../", $resultSql['Url']);
    }

    if (unlink($past_file)) {
        $item = array(
            'status' => "success"
        );
        $sql = "DELETE FROM datamuseum WHERE Id = $dataset_code";
        $resultSql = $con->query($sql);
    } else {
        $item = array(
            'status' => "unsuccessful"
        );
    }
    $result = $item;
    return $result;
}


$dataPost = array(
    'dataset_code' => isset($_POST['dataset_code']) ? $_POST['dataset_code'] : null
);
$myJSON = json_encode($dataPost);
$resultJson = postApiDeleteDataset($myJSON);

echo json_encode($resultJson, JSON_UNESCAPED_UNICODE);
