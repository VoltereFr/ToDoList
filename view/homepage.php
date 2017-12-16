<html>
    <?php require('head.php');?>

    <body>
        <?php require('header.php');?>

        <section class="col-lg-10">
            <h1>Welcome on ToDoList</h1>
        </section>

        <table>
            <thead>
            <tr>
                <td>Nom</td>
                <td>Date de création</td>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($res)) {
                foreach ($res as $row) {

                    echo "<tr>";
                    echo "<td><a href=\"?listId=".$row->getId()."&listName=".$row."&action=consultPublicList\">" . $row . "</a></td>";
                    echo "<td><a href=\"?listId=".$row->getId()."&action=deleteList\">Delete</a></td>";
                    echo "</tr>";
                }
            }
            else{
                var_dump($res);
                echo "<h2>Error</h2>";
            }
            ?>
            </tbody>
        </table>

    </body>
</html>
