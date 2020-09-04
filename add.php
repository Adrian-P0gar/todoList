<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>


    <title>Document</title>
    <?php require 'navbar.php';
    require 'dbConnection.php';
    ?>
</head>
<body>
        <h1> Add new tasks! </h1>


            <form action="add.php" method="post" id="form">
                <div id="input">
                    <p>
                        <label for="name0"> Name: </label>
                        <input type="text" name="name[]" id="name0" >
                        <label for="description0"> Description: </label>
                        <input type="text" name="description[]" id="description0">
                        <label for="dueDate0">Due Date:</label>
                        <input type="date" id="dueDate0" name="dueDate[]">
                    </p>
                </div>
                <button type="submit" value="Submit" >Submit</button>
                <button type="button" onclick="addNewTask()"> New Task  </button>
            </form>


        <?php
        if(count($_POST) > 0){

            $counter = 0;

            while ($counter < count($_POST['name'])){
                $query = "INSERT INTO tasks (name ,description, duedate) VALUES ('".$_POST['name'][$counter]."','".$_POST['description'][$counter]."','".$_POST['dueDate'][$counter]."')";

                if(mysqli_query($conn , $query)){
                    echo "good";
                }
                else{
                  echo  mysqli_error($conn) ;
                }
                $counter++;
            }
        }



        ?>
            <script type="text/javascript">
                let counter = 0;
                addNewTask = function (){
                    counter++;
                    const doc =  document.getElementById('input');

                    let iName = document.createElement("input");
                    iName.setAttribute('type',"text");
                    iName.setAttribute('name','name[]');
                    iName.setAttribute("id", "name"+counter)
                    let labelName = document.createElement('label');
                    labelName.setAttribute("id", 'lbName'+ counter);
                    labelName.setAttribute("for", 'name'+ counter);
                    let labelDescription = document.createElement('label');
                    labelDescription.setAttribute("id", 'lbDescription'+ counter);
                    labelDescription.setAttribute("for", 'description'+ counter);
                    let iDescription = document.createElement("input");
                    iDescription.setAttribute('type',"text");
                    iDescription.setAttribute('name',"description[]");
                    iDescription.setAttribute("id", "description"+counter)
                    let labelDate = document.createElement('label');
                    labelDate.setAttribute("id", 'dueDate'+ counter);
                    labelDate.setAttribute("for", 'dueDate'+ counter);
                    let iDate = document.createElement("input");
                    iDate.setAttribute('type',"date");
                    iDate.setAttribute('name',"dueDate[]");
                    iDate.setAttribute("id", "dueDate"+counter)

                    let par = document.createElement("p");
                    par.appendChild(labelName);
                    par.appendChild(iName);
                    par.appendChild(labelDescription);
                    par.appendChild(iDescription)
                    par.appendChild(labelDate);
                    par.appendChild(iDate)
                    doc.appendChild(par);

                    document.getElementById('lbName'+counter).innerHTML = "Name: ";
                    document.getElementById('lbDescription'+counter).innerHTML = " Description: ";
                    document.getElementById('dueDate'+counter).innerHTML = "Due Date: ";
             }



    </script>

</body>
</html>


