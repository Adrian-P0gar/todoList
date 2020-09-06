<?php

class Request
{

    function __constructor()
    {

    }

    function get_response()
    {
        if ($_POST["type"] === "GetData") {
           return $this->get_data();
        } else if ($_POST["type"] === "DeleteData"){
            return $this->delete_data($_POST['id']);
        } else if ($_POST["type"] === "CheckDone"){
            return $this->checkDone($_POST['id']);
        }
    }

    function get_data()
    {
        require 'dbConnection.php';

        $query = 'SELECT * FROM tasks';
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

        return json_encode($result);

    }
    function delete_data($id){
        require 'dbConnection.php';

        $query = 'UPDATE tasks SET deleted = "0"
            WHERE id='.$id;
        $sql = mysqli_query($conn, $query);

        $result = [
            "Response"=>$sql
            ];

        return json_encode($result);
    }

    function checkDone($id){
        require 'dbConnection.php';
        $query = 'UPDATE tasks SET done = IF(done = 0, 1, 0) WHERE id ='.$id  ;
        $sql = mysqli_query($conn, $query);

        $result = [
            "Response"=>$sql
        ];

        return json_encode($result);

    }

}
header('Content-Type: application/json');
$request = new Request();
echo $request->get_response();
die();