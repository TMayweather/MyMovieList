<?php
    class Film {
        private $conn;
        private $table = 'film';

        public $film_id;
        public $title;
        public $description;
        public $release_year;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT
                film_id,
                title,
                description,
                release_year
                FROM
                ' . $this->table . ' film
                ORDER BY
                title';   

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }