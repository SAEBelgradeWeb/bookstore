<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

/*
 *
 * If connection fails, we would like to break the code completely.
 */

if(!$conn) {
    die('FATAL ERROR: There was an error connecting to database');
}
