<html>
<?php require_once('head.php');?>

<body>
    <?php require_once('header.php');?>

        <section class="col-lg-10">
            <h1>Création d'une liste</h1>
            <form method="post">
                <label>Name : </label>
                <input type="text" name="name">
                <input type="submit" value="Add List">
                <input type="hidden" name="action" value="createPublicList"/>

            </form>
        </section>
</body>

</html>
