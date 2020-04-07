<?php

function get_games()
{
    include './../confic.php';
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT * FROM games";
    $result = $con->query($sql);
    return $result;
}

function get_datamuseum()
{
    include './../confic.php';
    $con = new mysqli("$servername", "$username", "$password", "$dbname");
    $sql = "SELECT * FROM datamuseum";
    $result = $con->query($sql);
    return $result;
}
