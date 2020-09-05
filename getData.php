<?php
require 'dbConnection.php';

$query = 'SELECT * FROM tasks';
$sql = mysqli_query($conn , $query);

$result =mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));