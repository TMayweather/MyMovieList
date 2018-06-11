<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Film.php';

$database = new Database();
$db = $database->connect();

$film = new Film($db);

$result = $film->read();

$num = $result->rowCount();

if($num > 0) {
    $films_arr = array();
    $films_arr['data'] = array();

    while($row = $result->fetch(PDO:: FETCH_ASSOC)) {
        extract($row);

        $film_item = array (
            'id' => $film_id,
            'title' => $title,
            'description' => html_entity_decode($description),
            'release_year' => $release_year
        );

        array_push($films_arr['data'], $film_item);
    }

    echo json_encode($films_arr);
} else {
    echo json_encode(
        array('message' => 'No Films Found')
    );
}