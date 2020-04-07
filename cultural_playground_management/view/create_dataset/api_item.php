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

$result = getApiItem();
echo json_encode ($result, JSON_UNESCAPED_UNICODE );