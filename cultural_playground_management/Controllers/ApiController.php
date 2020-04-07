<?php session_start(); ?>
<?php
include './../confic.php';
include './../httpful.phar';
include './../Model/games.php';
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
 * date: 28-1-63
 * comment: get data the user
 * input: -
 * output: museum_code, museum_name, thumbnail, tel and email
 */
function getApiUser()
{
    $url = "https://www.navanurak.in.th/museum_api/main_museums.php";
    $data_from_url = getApi($url);
    foreach ($data_from_url as $data_from_url) {
        if ($data_from_url->museum_code == $_SESSION["museum_code"]) {
            $data = array(
                'museum_code' => $data_from_url->museum_code,
                'museum_name' => $data_from_url->museum_name,
                'thumbnail' => $data_from_url->thumbnail,
                'tel' => $data_from_url->tel,
                'email' => $data_from_url->email
            );
            $_SESSION["thumbnail"] = $data_from_url->thumbnail;
            $_SESSION["email"] = $data_from_url->email;
            $_SESSION["museum_name"] = $data_from_url->museum_name;
        }
    }
    // echo session_id();

    // echo $_SESSION["id"];
    $result = $data;
    return $result;
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
 * comment: get data the game
 * input: -
 * output: game_id and game_name
 */
function getApiGame()
{

    $sql = get_games();
    while ($value = $sql->fetch_assoc()) {
        $data[] = array(
            'game_id' => $value['id_game'],
            'game_name' => $value['name']
        );
    }
    $result = $data;
    return $result;
}

/**
 * name: Mr.Jesdakorn Saelor
 * date: 23-2-63
 * comment: The function used to count the number of data sets for each game
 * input: -
 * output: item_count, matching_count, puzzle_count, quiz_count, mole_count and cosmos_count
 */
function getApiCountDataset()
{
    $matching_count = 0;
    $puzzle_count = 0;
    $quiz_count = 0;
    $mole_count = 0;
    $cosmos_count = 0;
    $item_count = getCount(getApiItem());
    $sql = get_datamuseum();
    while ($value = $sql->fetch_assoc()) {
        if ($value['Name'] == $_SESSION["museum_code"]) {
            if ($value['code_game'] == 2) {
                $matching_count++;
            } else if ($value['code_game'] == 3) {
                $puzzle_count++;
            } else if ($value['code_game'] == 4) {
                $quiz_count++;
            } else if ($value['code_game'] == 5) {
                $mole_count++;
            } else if ($value['code_game'] == 6) {
                $cosmos_count++;
            }
        }
    }
    $data = array(
        'item_count' => $item_count,
        'matching_count' => $matching_count,
        'puzzle_count' => $puzzle_count,
        'quiz_count' => $quiz_count,
        'mole_count' => $mole_count,
        'cosmos_count' => $cosmos_count
    );
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
function postApiCreateDataset(Request $request)
{
    $sequence = 1;
    $date = date("Ymd");
    $time = time();
    $randomNumber = mt_rand();
    $items = $this->getApiItem();
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $code_user =  Auth::user()->museum_code;
    foreach ($items as $items) {
        foreach ($request->all_items as $all_items) {
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
    $anurak['anurak'] = $dataset;
    $obj = stripslashes(json_encode($anurak, JSON_UNESCAPED_UNICODE));
    $link_past_file_sql = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
    $link_past_file = "$_SERVER[PHP_SELF]";
    $cut_url = str_replace("index.php", "", $link_past_file);

    $past_file = str_replace($cut_url, "file_json/json", $cut_url);
    $past_file_sql = str_replace("index.php", "file_json/json", $link_past_file_sql);

    $store_file = $past_file . $date . $time . $randomNumber . '.json';
    $store_file_sql = $past_file_sql . $date . $time . $randomNumber . '.json';
    $sql = DB::insert("insert into datamuseum (sumCount, Name, Url, code_game,created_at, updated_at) VALUES (0, '$code_user','$store_file_sql','$request->gameId','$created_at','$updated_at')");

    if ($sql) {
        $file = fopen($store_file, 'x');
        fwrite($file, $obj);
        if ($file) {
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
// /**
//  * name: Mr.Jesdakorn Saelor
//  * date: 21-2-63
//  * comment: Search dataset
//  * input: gameId
//  * output: status and item
//  */
// function postApiSearchDataset(Request $request)
// {
//     $sql = ApiModel::get_datamuseum();
//     $count = DB::table('datamuseum')->where('code_game', $request->gameId)->where('Name', Auth::user()->museum_code)->count();
//     if ($count > 0) {
//         foreach ($sql as $sql) {
//             if ($sql->Name == Auth::user()->museum_code && $sql->code_game == $request->gameId) {
//                 $item[] = array(
//                     'item' => $sql,
//                     'status' => "success"
//                 );
//             }
//         }
//     } else {
//         $item[] = array(
//             'status' => "warning"
//         );
//     }

//     $result = $item;
//     return $result;
// }
// /**
//  * name: Mr.Jesdakorn Saelor
//  * date: 21-2-63
//  * comment: Delete datasets
//  * input: dataset_code
//  * output: status
//  */
// function postApiDeleteDataset(Request $request)
// {
//     $sql = ApiModel::get_filr_datamuseum($request->dataset_code);
//     $link_past_file_sql = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
//     $cut_url = str_replace("index.php", "", $link_past_file_sql);
//     foreach ($sql as $sql) {
//         $past_file = str_replace($cut_url, "", $sql->Url);
//     }
//     if (unlink($past_file)) {
//         $item = array(
//             'status' => "success"
//         );
//         ApiModel::delect_datamuseum($request->dataset_code);
//     } else {
//         $item = array(
//             'status' => "unsuccessful"
//         );
//     }



//     $result = $item;
//     return $result;
// }
// /**
//  * name: Mr.Jesdakorn Saelor
//  * date: 24-2-63
//  * comment: Creat game from dataset
//  * input: gameId and dataset_code
//  * output: game_url, dataset_code and user_code
//  */
// function postApiCreatGame(Request $request)
// {
//     $user_code =  Auth::user()->museum_code;
//     $sql = ApiModel::get_games_url($request->gameId);
//     foreach ($sql as $sql) {
//         $item = array(
//             'game_url' => $sql->url,
//             'dataset_code' => $request->dataset_code,
//             'user_code' => $user_code
//         );
//     }
//     $result = $item;
//     return $result;
// }
// /**
//  * name: Mr.Jesdakorn Saelor
//  * date: 24-2-63
//  * comment: Show item game from dataset
//  * input: id
//  * output: dataset_url
//  */
// function getDataset($id)
// {

//     $code_user =  Auth::user()->museum_code;
//     $sql = ApiModel::get_filr_datamuseum($id);
//     foreach ($sql as $sql) {
//         $item = array(
//             'dataset_url' => $sql->Url
//         );
//     }
//     $result = $item;
//     return response()->json(
//         $result,
//         200,
//         ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
//         JSON_UNESCAPED_UNICODE
//     );
// }


