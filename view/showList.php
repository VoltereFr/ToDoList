<html>
<?php require ('head.php');?>
<body>
<?php require('header.php');?>
    <table>
        <thead>
        <?php
            echo "<th>";
            echo "<td><p>" . $list . "</p></td>";
            echo "<td><a href=\"?listId=".$list->getId()."&action=deleteList\">Delete</a></td></th>";
        ?>
        </thead>
        <tbody>
        <?php
        if(isset($task_tab)) {
            foreach ($task_tab as $row) {

                echo "<tr>";
                echo "<td><p>".$row."</p></td>";
                echo "<td><a href=\"?listId=".$list->getId()."&id=". $row->getId() ."&action=deleteTask\">Delete</a></td>";
                echo "</tr>";
                echo "</tr>";
            }
        }
        else{
            echo "<tr><td><p>Pas de tâches</p></td></tr>";
        }
        ?>
        </tbody>

    </table>
    <form>
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
            <input type="hidden" name="id_list" value="<?php echo $list->getId() ?>">
            <input type="submit" value="Add Task">
            <input type="hidden" name="action" value="insertTask">

        </div>
    </form>
</html>
