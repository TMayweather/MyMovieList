<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Movie.php';

$database = new Database();
$db = $database->connect();

$movie = new Movie($db);

// Get posted data
$data = json_decode(file_get_contents("php://input"));

$movie->title = $data->title;
$movie->image = $data->image;
$movie->summary = $data->summary;
$movie->genre = $data->genre;
$movie->release_year = $data->release_year;
$movie->rating = $data->rating;


if($movie->create($title, $image, $summary, $genre, $release_year, $rating)) {
    echo json_encode(
        array('message' => 'Post Created')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}

