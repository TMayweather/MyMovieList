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
 <script type="text/javascript" src="./js/read.js"></script>
    <title>My Movie List</title>
</head>
<body>
   <h1>Welcome to my movie list</h1> 

   <div id="list">
   </div>

   <form action="./create.php" method="POST">
   <div>
   <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="title" value="">
   </div>
    <div>
   <label for="image">Image</label>
    <input type="text" name="image" id="image" placeholder="http://" value="">
   </div>
   <textarea type="text" name="summary" id="summary" rows="10" cols="50" value="">Movie summary goes here</textarea>
   <button type="submit">Add</button>
   </form>
</body>
</html>