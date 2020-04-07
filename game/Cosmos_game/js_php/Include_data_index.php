<?php

/**
 * name: Mr.Jesdakorn Saelor
 * date: 29-12-62
 * comment: get dataset of game from URL in database
 * input: get_museum, get_id and get_volume
 * output: URL
 */
error_reporting(-1);
ini_set('display_errors', 'Off');
include('Database.php');
$get_museum = isset($_GET['Museum']) ? $_GET['Museum'] : 1;
$get_id = isset($_GET['Id']) ? $_GET['Id'] : 1;
$get_volume = isset($_GET['volume']) ? $_GET['volume'] : 1;
