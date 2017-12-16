<html>
    <?php require('head.php');?>

    <body>

    <?php require('header.php');?>

        <form action="http://localhost/ToDoList/AddTask.php?action=addTask" method="post">
            <div>
                <label>name</label>
                <input type="text" name="name" />
            </div>
            <div>
                <label>task</label>
                <input type="text" name="task" />
            </div>
            <div>
                <label>categ</label>
                <input type="text" name="categ" />
            </div>
            <div>
                <button type="submit">Valider</button>
                <input type="submit" value="Add Task">
                <input type="hidden" value="addTask">
            </div>
        </form>
    </body>
</html>


