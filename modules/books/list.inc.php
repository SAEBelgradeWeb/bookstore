<div style="margin-bottom: 40px;">
    <a href="./?module=books&action=create" class="btn btn-primary">Create new book</a>
</div>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Cover</th>
        <th>ISBN</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>


    <?php
    $result = mysqli_query($conn, "
SELECT books.*, CONCAT(authors.lastname, \", \", authors.firstname) AS author, genre.genre , publishers.name AS publisher
FROM books
LEFT JOIN authors ON books.authors_id = authors.id
LEFT JOIN genre ON books.genre_id = genre.id
LEFT JOIN publishers ON books.publishers_id = publishers.id");

    while($row = mysqli_fetch_assoc($result)):

    ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['cover'] ?></td>
        <td><?= $row['isbn'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['publisher'] ?></td>
        <td><?= $row['genre'] ?></td>
        <td>Edit | <a href="./?module=books&action=delete&id=<?= $row['id'] ?>">Delete</a></td>
    </tr>

    <?php endwhile; ?>

</table>