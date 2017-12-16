<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">ToDoList</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <form method="POST">
                        <input type="submit" value="Home">
                        <input type="hidden" name="action" value="goToHome"/>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST">
                        <input type="submit" value="Inscription">
                        <input type="hidden" name="action" value="goToInscription"/>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST">
                        <input type="submit" value="Add List">
                        <input type="hidden" name="action" value="goToAddList"/>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Connection
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form action="http://localhost/ToDoList/?action=connect" method="post">
                            <div class="form-group col-md-6">
                                <label for="inputLogin">Login</label>
                                <input type="text" class="form-control" id="inputLogin">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <input type="submit" value="Submit">
                            <input type="hidden" name="action" value="connect">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>

</html>
