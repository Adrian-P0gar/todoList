
<html>

<header>
<?php
require 'navbar.php';
require 'dbConnection.php';
?>
</header>

<body>
<div style="
   background-color: black;
   color:white;
  text-align: center;"> To to list </div>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Due Date</th>
            <th scope="col">Associated Image</th>
            <th scope="col">Done</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>



        </thead>
        <tbody class="tbody">
<?php
//$query = 'SELECT * FROM tasks';
//$result = mysqli_query($conn , $query);
//
//while ($row = $result->fetch_assoc()){
//    $isChecked = '';
//    if($row['done']  == 0){
//        $isChecked = "checked";
//    }
//
//    echo  "<th scope='row'>".$row['id'].'</th>
//<td>'.$row['name'].'</td>
//<td>'.$row['description'] .'</th>
//<td>'.$row['duedate'].'</th>
//<td>'.$row['image'].'</td>
//<td>'. "<input type='checkbox' name='checked' ". $isChecked.">". '</td>
//<td>'.'<a class="btn btn-secondary" href="update.php/'.$row['id'].'">Update</a>' . '</td>
//<td>'."Delete".'</td></tr>';
//}


?>
        </tbody></table>

<script src="main.js"></script>
</body>


</html>


<?php
