<html>
<?php require ('head.php');?>
<body>
    <?php require('header.php');?>
    <form action="http://localhost/ToDoList/?action=addUser" method="post" class="container center_div">

        <!--<div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName">
        </div>

        <div class="form-group col-md-6">
            <label for="inputSurname">Surname</label>
            <input type="text" class="form-control" id="inputSurname">
        </div>-->

        <div class="form-group col-md-6">
            <label for="inputLogin">Login</label>
            <input type="text" class="form-control" name="login">
        </div>

        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Password">
        </div>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <input type="submit" value="Submit">
            <input type="hidden" name="action" value="addUser">
        </div>

    </form>
</body>
</html>