<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Movie.php';

$database = new Database();
$db = $database->connect();

$movie = new Movie($db);

// Get posted data
$data = json_decode(file_get_contents("php://input"));

$movie->movie_id = $data->movie_id;

if($movie->delete()) {
    echo json_encode(
        array('message' => 'Movie Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'Movie Not Deleted')
    );
}