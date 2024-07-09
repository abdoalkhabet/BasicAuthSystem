<?php
session_start();
include 'core/funcations.php';
session_destroy();
redirect('login.php');
die;
