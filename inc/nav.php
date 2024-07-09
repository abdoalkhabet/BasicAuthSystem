<nav class="navbar  navbar-expand-lg bg-dark  border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PHP PROJECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (!isset($_SESSION["auth"])) :
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">profile</a>
                    </li>
                <?php endif; ?>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> -->
            </ul>
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION["auth"])) :
                ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger" aria-current="page" href="logout.php">logout</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>