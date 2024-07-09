<?php
include('inc/header.php');
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
    die;
}
include('inc/nav.php')
?>

<style>
    .home-container {
        text-align: center;
        margin-top: 50px;
    }

    .home-title {
        font-size: 2rem;
        font-weight: bold;
    }

    .home-subtitle {
        font-size: 4rem;
        font-weight: lighter;
    }
</style>


<div class="container home-container border">
    <div class="row">
        <div class="col">
            <p class="home-title">Home Page</p>
            <p class="home-subtitle">Welcome Again</p>
        </div>
    </div>
</div>
<?php
include('inc/footer.php')
?>