<?php


/**
 * name: Mr.Jesdakorn Saelor
 * date: 28-1-63
 * comment: get data the game
 * input: -
 * output: game_id and game_name
 */
function getApiGame()
{

    include './../../confic.php';
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT * FROM games";
    $result = $con->query($sql);
    while ($value = $result->fetch_assoc()) {
        $data[] = array(
            'game_id' => $value['id_game'],
            'game_name' => $value['name']
        );
    }
    $result = $data;
    return $result;
}

$result = getApiGame();
echo json_encode ($result, JSON_UNESCAPED_UNICODE );