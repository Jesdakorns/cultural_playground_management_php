<?php session_start();?>
<?php
include './../../confic.php';
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
    return $result;
}
/**
 * name: Mr.Jesdakorn Saelor
 * date: 23-2-63
 * comment: The function used to count the number
 * input: request
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
 * date: 23-2-63
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
                'email' => $data_from_url->email,
            );
            $_SESSION["thumbnail"] = $data_from_url->thumbnail;
            $_SESSION["email"] = $data_from_url->email;
            $_SESSION["museum_name"] = $data_from_url->museum_name;
        }
    }
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
                'pic_path' => $data_url->pic_path,
            );
            $sequence++;
        }
    }
    $result = $data;
    return $result;
}

/**
 * name: Mr.Jesdakorn Saelor
 * date: 23-2-63
 * comment: The function used to count the number of game datasets
 * input: -
 * output: item_count, matching_count, puzzle_count, quiz_count, mole_count and cosmos_count
 */
function getApiCountDataset()
{
    include './../../confic.php';
    $matching_count = 0;
    $puzzle_count = 0;
    $quiz_count = 0;
    $mole_count = 0;
    $cosmos_count = 0;
    $matching = 0;
    $puzzle = 0;
    $quiz = 0;
    $mole = 0;
    $playGameCount = 0;
    $cosmos = 0;
    $sequence = 1;
    $datasets = [];
    $game = [];
    $item = getApiItem();
    $item_count = getCount(getApiItem());
    $con = new mysqli("$servername", "$username", "$password", "$dbname");

    $sql = "SELECT * FROM games";
    $result_game = $con->query($sql);
    while ($value_game = $result_game->fetch_assoc()) {
        $dataGame[] = array(
            'id_game' => $value_game['id_game'],
            'name' => $value_game['name'],
        );
    }

    $sql = "SELECT * FROM datamuseum";

    $result = $con->query($sql);
    $count = getCount($result);

    if ($count > 0) {
        foreach ($result as $value) {

            if ($value['Name'] == $_SESSION["museum_code"]) {

                if ($value['code_game'] == 2) {
                    $matching_count++;

                    $game = $dataGame[1]['name'];
                    $sequence = $matching_count;
                    $matching += $value['sumCount'];
                } else if ($value['code_game'] == 3) {
                    $puzzle_count++;
                    $game = $dataGame[2]['name'];
                    $sequence = $puzzle_count;
                    $puzzle += $value['sumCount'];
                } else if ($value['code_game'] == 4) {
                    $quiz_count++;
                    $game = $dataGame[3]['name'];
                    $sequence = $quiz_count;
                    $quiz += $value['sumCount'];
                } else if ($value['code_game'] == 5) {
                    $mole_count++;
                    $game = $dataGame[4]['name'];
                    $sequence = $mole_count;
                    $mole += $value['sumCount'];
                } else if ($value['code_game'] == 6) {
                    $cosmos_count++;
                    $game = $dataGame[5]['name'];
                    $sequence = $cosmos_count;
                    $cosmos += $value['sumCount'];
                }
                $playGameCount += $value['sumCount'];
                $dataGames[] = array(
                    'series' => $sequence,
                    'id' => $value['Id'],
                    'url' => $value['Url'],
                    'code_game' => $value['code_game'],
                    'game' => $game,
                    'count' => $value['sumCount'],
                );

                // $sequence++;
            }
        }
        ;

        $matching = number_format($matching * 100 / $playGameCount, 2, '.', '');
        $puzzle = number_format($puzzle * 100 / $playGameCount, 2, '.', '');
        $quiz = number_format($quiz * 100 / $playGameCount, 2, '.', '');
        $mole = number_format($mole * 100 / $playGameCount, 2, '.', '');
        $cosmos = number_format($cosmos * 100 / $playGameCount, 2, '.', '');

        $percent = [$matching, $puzzle, $quiz, $mole, $cosmos];
        for ($i = 0; $i < 5; $i++) {
            $dataGraph[$i] = array(
                'name' => $dataGame[$i + 1]['name'],
                'percent' => $percent[$i],

            );
        }
        $getdataGames = array_column($dataGames, 'count');
        array_multisort($getdataGames, SORT_DESC, $dataGames);

        foreach ($result as $result) {

            $json = \Httpful\Request::get($result['Url'])->send();
            $json_data[] = json_decode($json, true);

        }
        $get_count_url = getCount($json_data);
        // echo $get_count_url;
        $sequence = 0;
        $count_num = 0;
        foreach ($item as $item1) {
            $count_num_asrray[] = 0;
        }
        $o = 0;
        $sum = 0;
        for ($index_url = 0; $index_url < $get_count_url; $index_url++) {
            // print_r($json_data[$index_url]['anurak']);

            foreach ($json_data[$index_url]['anurak'] as $value) {

                $item_dataset[] = array(
                    'title' => $value['title'],
                    'image' => $value['image'],
                );

            }

        }
        $count_item_dataset = getCount($item_dataset);
        // print_r($item_dataset);
        // print_r($item);
        foreach ($item as $item) {
            for ($i = 0; $i < $count_item_dataset; $i++) {

                if ($item_dataset[$i]['image'] == $item['pic_path']) {
                    // echo " <br><br><br>$sequence ตรง " . $item_dataset[$i]['image'] . "=" . $item['pic_path'];
                    $count_num += 1;
                } else {
                    // echo " <br><br><br>$sequence ไม่ตรง " . $item_dataset[$i]['image'] . "!=" . $item['pic_path'];
                    $count_num += 0;
                }

            }
            // echo $count_num . "<br>";
            $sum = $count_num + $count_num_asrray[$sequence];
            $count_num_asrray[$sequence] = $sum;
            $dataAntiquesStatistics[] = array(
                'sequence' => $sequence + 1,
                'title' => $item['obj_title'],
                'image' => $item['pic_path'],
                'count' => $count_num_asrray[$sequence],
            );
            $count_num = 0;
            $sequence++;
        }
        $getAntiquesStatistics = array_column($dataAntiquesStatistics, 'count');
        array_multisort($getAntiquesStatistics, SORT_DESC, $dataAntiquesStatistics);
        // print_r($count_num_asrray);

    } else {
        $dataGames[] = array(
            'status' => 'not data',
        );
        $dataGraph[] = array(
            'status' => 'not data',
        );
        $dataAntiquesStatistics[] = array(
            'status' => 'not data',
        );
    }

    $data = array(
        'item_count' => $item_count,
        'matching_count' => $matching_count,
        'puzzle_count' => $puzzle_count,
        'quiz_count' => $quiz_count,
        'mole_count' => $mole_count,
        'cosmos_count' => $cosmos_count,
        'dataGames' => $dataGames,
        'dataGraph' => $dataGraph,
        'dataAntiquesStatistics' => $dataAntiquesStatistics,
    );
    $result = $data;
    return $result;
}

$result = getApiCountDataset();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
