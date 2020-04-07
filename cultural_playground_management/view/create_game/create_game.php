<?php session_start(); ?>
<?php


/**
 * name: Mr.Jesdakorn Saelor
 * date: 24-2-63
 * comment: Creat game from dataset
 * input: gameId and dataset_code
 * output: game_url, dataset_code and user_code
 */
function postApiCreatGame($request)
{
    include './../../confic.php';
    $code_user =  $_SESSION["museum_code"];
    $requestPost = json_decode($request);

    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT url FROM games WHERE id_game = $requestPost->gameId";
    $resultSql = $con->query($sql);


    foreach ($resultSql as $resultSql) {

        $item = array(
            'game_url' => $resultSql['url'],
            'dataset_code' => $requestPost->dataset_code,
            'code_user' => $code_user
        );
    }
    $result = $item;
    return $result;
}

$dataPost = array(
    'gameId' => isset($_POST['gameId']) ? $_POST['gameId'] : null,
    'dataset_code' => isset($_POST['dataset_code']) ? $_POST['dataset_code'] : null
);
$myJSON = json_encode($dataPost);
$resultJson = postApiCreatGame($myJSON);

echo json_encode($resultJson, JSON_UNESCAPED_UNICODE);
