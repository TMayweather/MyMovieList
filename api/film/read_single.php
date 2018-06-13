<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Movie.php';

$database = new Database();
$db = $database->connect();

$movie = new Movie($db);

$movie->movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : die();

$movie->read_single();

$movie_arr = array(
    'movie_id' => $movie->movie_id,
    'title' => $movie->title,
    'image' => $movie->image,
    'summary' => $movie->summary,
    'genre' => $movie->genre,
    'release_year' => $movie->release_year,
    'rating' => $movie->rating
);

print_r(json_encode($movie_arr));