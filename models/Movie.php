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
            public function read_single() {
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
               WHERE
               movie_id = ?
               ';

                $stmt = $this->conn->prepare($query);

                //BIND ID
                $stmt->bindParam(1, $this->movie_id);

                $stmt->execute();

                $row = $stmt->fetch(PDO:: FETCH_ASSOC);

                $this->title = $row['title'];
                $this->image = $row['image'];
                $this->summary = $row['summary'];
                $this->genre = $row['genre'];
                $this->release_year = $row['release_year'];
                $this->rating = $row['rating'];
            }

            public function create($title, $image, $summary, $genre, $release_year, $rating) {
            $query = 'INSERT INTO ' . 
                $this->table . '
                (title,image,summary,genre,release_year,rating)
              VALUES
              (:title,:image,:summary,:genre,:release_year,:rating)';
              

                $stmt = $this->conn->prepare($query);

                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->image = htmlspecialchars(strip_tags($this->image));
                $this->summary = htmlspecialchars(strip_tags($this->summary));
                $this->genre = htmlspecialchars(strip_tags($this->genre));
                $this->release_year = htmlspecialchars(strip_tags($this->release_year));
                $this->rating = htmlspecialchars(strip_tags($this->rating));

                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':image', $this->image);
                $stmt->bindParam(':summary', $this->summary);
                $stmt->bindParam(':genre', $this->genre);
                $stmt->bindParam(':release_year', $this->release_year);
                $stmt->bindParam(':rating', $this->rating);
                
                if($stmt->execute()) {
                    return true;
                }
               printf("Error: %s.\n", $stmt->error);
                return false;
            }

            public function update() {
            $query = 'UPDATE movie '
                    . 'SET title = :title, '
                    . 'image = :image, ' 
                    . 'summary = :summary, '
                    . 'genre = :genre, '
                    . 'release_year = :release_year, '
                    . 'rating = :rating '
                    . 'WHERE movie_id = :movie_id';
             

                $stmt = $this->conn->prepare($query);

                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->image = htmlspecialchars(strip_tags($this->image));
                $this->summary = htmlspecialchars(strip_tags($this->summary));
                $this->genre = htmlspecialchars(strip_tags($this->genre));
                $this->release_year = htmlspecialchars(strip_tags($this->release_year));
                $this->rating = htmlspecialchars(strip_tags($this->rating));
                $this->movie_id = htmlspecialchars(strip_tags($this->movie_id));

                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':image', $this->image);
                $stmt->bindParam(':summary', $this->summary);
                $stmt->bindParam(':genre', $this->genre);
                $stmt->bindParam(':release_year', $this->release_year);
                $stmt->bindParam(':rating', $this->rating);
                $stmt->bindParam(':movie_id', $this->movie_id);
                
                if($stmt->execute()) {
                    return true;
                }
               printf("Error: %s.\n", $stmt->error);
                return false;
            }
    }