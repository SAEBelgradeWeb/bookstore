<?php

$id= mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "DELETE FROM books WHERE id = '$id'");
    if ($result) {
        header('Location: ./?module=books&action=list');
    }
