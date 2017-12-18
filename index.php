<html>
    <body>
        <?php
        require_once(__DIR__.'/config/Config.php');
        require_once(__DIR__.'/config/Autoload.php');

        session_start();
        Autoload::load();

        $controller = new FrontController();
        ?>
    </body>
</html>