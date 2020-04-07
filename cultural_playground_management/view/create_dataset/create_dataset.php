<?php session_start(); ?>
<?php
include './../../httpful.phar';
/**
 * name: Mr.Jesdakorn Saelor
 * date: 28-1-63
 * comment: The function used in pull api
 * input: url
 * output: data
 */
function getApi($url)
{
    $json_url = $url;
    $json = \Httpful\Request::get($json_url)->send();
    $object = json_decode($json);
    $result = $object;
    return  $result;
}
/**
 * name: Mr.Jesdakorn Saelor
 * date: 28-1-63
 * comment: get data the item
 * input: -
 * output: sequence, ownermuseum_code, obj_title and pic_path
 */
function getApiItem()
{
    $sequence = 1;
    $url = "https://www.navanurak.in.th/museum_api/item_museums.php";
    $data_url = getApi($url);
    foreach ($data_url as $data_url) {
        if ($data_url->ownermuseum_code == $_SESSION["museum_code"]) {
            $data[] = array(
                'sequence' => $sequence,
                'ownermuseum_code' => $data_url->ownermuseum_code,
                'obj_title' => $data_url->obj_title,
                'pic_path' => $data_url->pic_path
            );
            $sequence++;
        }
    }
    $result = $data;
    return $result;
}


/**
 * name: Mr.Jesdakorn Saelor
 * date: 28-1-63
 * comment: save file dataset
 * input: game_id, items
 * output: status
 */



function postApiCreateDataset($request)
{
    include './../../confic.php';
    $sequence = 1;
    $date = date("Ymd");
    $time = time();
    $randomNumber = mt_rand();
    $items = getApiItem();

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $code_user =  $_SESSION["museum_code"];

    $requestPost = json_decode($request);

    foreach ($items as $items) {
        if ($requestPost->gameId != null || $requestPost->all_items != null) {
            foreach ($requestPost->all_items as $all_items) {

                if ($items['sequence'] == $all_items) {

                    $dataset[] = array(
                        'sequence' => $sequence,
                        'title' => $items['obj_title'],
                        'image' => $items['pic_path']
                    );

                    $sequence++;
                }
            }
        }
    }

    $anurak['anurak'] = $dataset;
    $obj = stripslashes(json_encode($anurak, JSON_UNESCAPED_UNICODE));
    $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    $link_past_file_sql = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
    $link_past_file = "$_SERVER[PHP_SELF]";
    $cut_url = str_replace("index.php", "", $link_past_file);

    $past_file = str_replace($cut_url, "../../assets/json/json", $cut_url);
    $past_file_sql = str_replace("view/create_dataset/create_dataset.php", "assets/json/json", $link_past_file_sql);

    $store_file = $past_file . $date . $time . $randomNumber . '.json';
    $store_file_sql = $past_file_sql . $date . $time . $randomNumber . '.json';


    $file = fopen($store_file, 'x');
    fwrite($file, $obj);
    if ($file) {
        $con = new mysqli("$servername", "$username", "$password", "$dbname");
        $sql = "INSERT INTO datamuseum (sumCount, Name, Url, code_game,created_at, updated_at) VALUES (0, '$code_user','$store_file_sql','$requestPost->gameId','$created_at','$updated_at')";
        $result = $con->query($sql);
        if ($result) {
            $response = array(
                'status' => "success"
            );
        } else {
            $response = array(
                'status' => "unsuccessful"
            );
        }
    } else {
        $response = array(
            'status' => "error"
        );
    }

    $result = $response;
    return $result;
}
$structure = '../../assets/json';
if (!is_dir($structure)) {
    mkdir($structure);
}
$dataPost = array(
    'gameId' => isset($_POST['gameId']) ? $_POST['gameId'] : null,
    'all_items' => isset($_POST['all_items']) ? $_POST['all_items'] : null
);
$myJSON = json_encode($dataPost);

$resultJson = postApiCreateDataset($myJSON);

echo json_encode($resultJson, JSON_UNESCAPED_UNICODE);
