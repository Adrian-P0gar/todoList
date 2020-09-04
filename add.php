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
    ?>
</head>
<body>
        <h1> ruta de add</h1>

        <div id="forms">
            <form action="add.php" method="post" id="0">
            <input type="text" name="name" id="name0">
            <input type="text" name="description" id="description0">
            </form>


        </div>

        <button type="button" onclick="addNewTask()"> New Task  </button>
        <button type="button" onclick="submitAll()"> Submit  </button>
        <?php
            foreach ($_POST as $postVar){
                echo $postVar. "sd";
            }


        ?>

            <script type="text/javascript">
                let counter = 0;
                addNewTask = function (){
                    counter++;
              const doc =  document.getElementById('forms');
              const newForm = document.createElement("form");
              newForm.setAttribute('method','post');
              newForm.setAttribute('action',"add.php");
                newForm.setAttribute('id',counter.toString());
                let iName = document.createElement("input");
                iName.setAttribute('type',"text");
                iName.setAttribute('name','name');
                iName.setAttribute("id", "name"+counter)
                let iDescription = document.createElement("input");
                iDescription.setAttribute('type',"text");
                iDescription.setAttribute('name',"description");
                iDescription.setAttribute("id", "description"+counter)
                newForm.appendChild(iName);
                newForm.appendChild(iDescription);
                doc.appendChild(newForm);
             }
            submitAll = function (){
                let x = []
                let i=0;
               while (i<=counter){
                   // document.getElementById(i.toString()).submit();
                   x.push(document.getElementById(i.toString()))

                   i++;
               }
               let dataStr = JSON.stringify(x);
               console.log(document.getElementById("name0").value);
                console.log(document.getElementById("description0").value);

            }

    </script>

</body>
</html>


