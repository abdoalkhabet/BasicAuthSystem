<?php
include('inc/header.php');

include('inc/nav.php')
?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Register</h2>
            <?php
            if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error) :
            ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        echo $error;
                        ?>
                    </div>
            <?php endforeach;
                unset($_SESSION['errors']);
            endif; ?>
            <form action="handel/handelRegister.php" method="post" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group p-2 my-1">
                    <button type="submit" name="submit" class="btn btn-outline-primary form-control">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php
include('inc/footer.php')
?>