<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
</head>
<?php require('head.php');?>

<body>
<?php require('header.php');?>
    <h1>Error :</h1>
    <?php
    if(isset($error)) {
        if(is_array($error)) {
            foreach ($error as $err) {
                echo($err);
            }
        }
        else {
            echo $error;
        }
    }
    ?>
</body>
</html>