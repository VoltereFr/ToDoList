<html>
    <?php require('head.php');?>

    <body>

    <?php require('header.php');?>
        <form action="http://localhost/ToDoList/AddTask.php?action=addTask" method="post">
            <div>
                <label>name</label>
                <input type="text" name="nom" />
            </div>
            <div>
                <label>task</label>
                <input type="text" name="tache" />
            </div>
            <div>
                <label>categ</label>
                <input type="text" name="categ" />
            </div>
            <div>
                <label>done</label>
                <input type="boolean" name="done"/>
            </div>
            <div>
                <button type="submit">Valider</button>
                <input type="submit" value="Add Task">
            </div>
        </form>
    </body>
</html>


