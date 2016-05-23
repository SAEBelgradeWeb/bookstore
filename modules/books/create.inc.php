<?php

if(isset($_POST['title'])) {

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
  $genre = mysqli_real_escape_string($conn, $_POST['genre']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $query = "INSERT INTO books SET title = '$title', authors_id = '$author', publishers_id = '$publisher', genre_id = '$genre', cover = '$image', isbn='$isbn'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));

    } else {
        mysqli_free_result($result);
        header("Location: ./index.php?module=books&action=list");

    }





}

?>

<form action="" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <select name="author" id="author" class="form-control">
            <?php


            $result = mysqli_query($conn, "SELECT * FROM authors");

            while($row = mysqli_fetch_assoc($result)) : ?>

                <option value="<?= $row['id']; ?>"><?= $row['lastname'] . ", ". $row['firstname'] ?></option>

            <?php endwhile; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="publisher">Publisher</label>
        <select name="publisher" id="publisher" class="form-control">
            <?php


            $result = mysqli_query($conn, "SELECT * FROM publishers");

            while($row = mysqli_fetch_assoc($result)) : ?>

                <option value="<?= $row['id']; ?>"><?= $row['name']  ?></option>

            <?php endwhile; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="genre">Genre</label>
        <select name="genre" id="genre" class="form-control">
            <?php


            $result = mysqli_query($conn, "SELECT * FROM genre");

            while($row = mysqli_fetch_assoc($result)) : ?>

                <option value="<?= $row['id']; ?>"><?= $row['genre']; ?></option>

            <?php endwhile; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control">
    </div>

    <div class="form-group">
        <label for="image">Cover image</label>
        <input type="text" name="image" id="image" class="form-control">
    </div>

    <div class="form-group">
       <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>