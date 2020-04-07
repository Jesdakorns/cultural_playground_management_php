<?php session_start(); ?>
<?php
/**
 * name: Mr.Jesdakorn Saelor
 * date: 21-2-63
 * comment: Show item game from dataset
 * input: id
 * output: dataset_url
 */
function getDataset($request)
{

    include './../../confic.php';
    $code_user =  $_SESSION["museum_code"];
    $requestPost = json_decode($request);
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT Url FROM datamuseum WHERE Id = $requestPost->Id";
    $resultSql = $con->query($sql);

    foreach ($resultSql as $resultSql) {
        $item = array(
            'dataset_url' => $resultSql['Url']
        );
    }
    $result = $item;
    return $result;
}


$dataPost = array(
    'Id' => isset($_GET['Id']) ? $_GET['Id'] : null
);
$myJSON = json_encode($dataPost);
$resultJson = getDataset($myJSON);

echo json_encode($resultJson, JSON_UNESCAPED_UNICODE);