<html>
    <?php require('head.php');?>

    <body>
        <?php require('header.php');?>

        <section class="col-lg-10">
            <h1>Welcome on ToDoList</h1>
        </section>

        <table>
            <?php
            if(isset($res)) {
                foreach ($res as $row) {

                    echo "<tr>";
                    echo "<td><a href=\"?listId=".$row->getId()."&action=consultPublicList\">" . $row . "</a></td>";
                    echo "<td><a href=\"?listId=".$row->getId()."&action=deleteList\">Delete</a></td>";
                    echo "</tr>";
                }
            }
            else{
                var_dump($res);
                echo "<h2>Error</h2>";
            }
            ?>
        </table>

    </body>
</html>
