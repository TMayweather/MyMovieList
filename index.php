<?php
include ('./config/Database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <title>MY Movie List</title>
    
    <script>
    //TESTING FRONT END THINGS
var movies = '';
$.ajax({
    type: "GET",
    url: 'api/film/read.php',
    success: function(data){
     useData(data);  
    }
});

const useData = (data) => {
movies = data.data;
console.log(movies);

movies.forEach((movie) => {
const movieItem = document.createElement('li')
movieItem.textContent = movie.title
document.querySelector('#list').appendChild(movieItem)
})
}

    </script>
</head>
<body>
   <h1>Welcome to my movie list</h1> 

   <div id="list">
        <!-- <?php
        
        $pg = "SELECT * FROM movie LIMIT 3";
        $result = pg_query($conn, $pg);
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                echo "<p>";
                echo $row['title'];
                $image = $row['image'];
                echo '<img src="'.$image.'" >';
                echo "<br>";
                echo $row['summary'];
                echo "<br>";
                echo $row['genre'];
                echo "</p>";
            }
        } else {
            echo "There are no movies!";
        }
        ?> -->
   </div>
</body>
</html>