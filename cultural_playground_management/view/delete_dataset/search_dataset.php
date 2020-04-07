<?php session_start(); ?>
<?php

/**
 * name: Mr.Jesdakorn Saelor
 * date: 23-2-63
 * comment: The functions used to count
 * input: data
 * output: count
 */
function getCount($request)
{
    $count = 0;
    $data = $request;
    foreach ($data as $data) {
        $count++;
    }
    $result = $count;
    return $result;
}
/**
 * name: Mr.Jesdakorn Saelor
 * date: 21-2-63
 * comment: Search dataset
 * input: gameId
 * output: status and item
 */
function postApiSearchDataset($request)
{
    include './../../confic.php';
    $code_user = $_SESSION['museum_code'];
    $requestPost = json_decode($request);
 
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT * FROM datamuseum WHERE Name = $code_user and code_game = $requestPost->gameId";
    $resultSql = $con->query($sql);


    

    $count = getCount($resultSql);

    if ($count > 0) {
        foreach ($resultSql as $resultSql) {

         
                $item[] = array(
                    'item' => $resultSql['Id'],
                    'status' => "success"
                );

        }
    } else {
        $item[] = array(
            'status' => "warning"
        );
    }

    $result = $item;
    return $result;
}



$dataPost = array(
    'gameId' => isset($_POST['gameId']) ? $_POST['gameId'] : null,
);
$myJSON = json_encode($dataPost);
$resultJson = postApiSearchDataset($myJSON);

echo json_encode($resultJson, JSON_UNESCAPED_UNICODE);
