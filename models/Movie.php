<?php
    class Movie {
        private $conn;
        private $table = 'movie';

        public $movie_id;
        public $title;
        public $image;
        public $summary;
        public $genre;
        public $release_year;
        public $rating;
        

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT
                movie_id,
                title,
                image,
                summary,
                genre,
                release_year,
                rating
                FROM
                ' . $this->table . ' movie
                ORDER BY
                title';   

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }