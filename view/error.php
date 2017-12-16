<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
</head>
<body>
    <h1>Error</h1>
    <?php
    if(isset($dVueError)) {
        if(is_array($dVueError)) {
            foreach ($dVueError as $error) {
                echo($error);
            }
        }
        else {
            echo $dVueError;
        }
    }
    ?>
</body>
</html>