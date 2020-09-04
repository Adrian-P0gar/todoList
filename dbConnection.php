<?php

$conn = mysqli_connect('localhost', 'pogar', 'bonfiscal706623', 'todolist');

if(!$conn){
    die(mysqli_connect_error());
}

