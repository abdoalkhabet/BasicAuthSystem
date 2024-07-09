<?php
session_start();
include '../core/funcations.php';
include '../core/valid.php';
$errors = [];
if (checkRequestMethod("POST") && ckeckPostInput("name")) {
    foreach ($_POST as $key => $val) {
        $$key = sanitizeInput($val);
    };
    // $name = sanitizeInput($_POST['name']);
    // $email = sanitizeInput($_POST['email']);
    // $password = sanitizeInput($_POST['password']);

    // validation function
    if (!requiredVal($name)) {
        $errors[] = " name is required";
    } elseif (!minVal($name, 3)) {
        $errors[] = " name must be greater than 3 characters";
    } elseif (!maxVal($name, 25)) {
        $errors[] = " name must be smaller than 25 characters";
    }
    // --------------------------------------------------------

    if (!requiredVal($email)) {
        $errors[] = " email is required";
    } elseif (!emailVal($email)) {
        $errors[] = " please enter a valid email address";
    }
    // -------------------------------------------------------------
    if (!requiredVal($password)) {
        $errors[] = " password is required";
    } elseif (!minVal($password, 6)) {
        $errors[] = " password must be greater than 6 characters";
    } elseif (!maxVal($password, 20)) {
        $errors[] = " password must be smaller than 20 characters";
    }

    if (empty($errors)) {
        $users_file = fopen("../data/users.csv", "a+");
        $data = [$name, $email, sha1($password)];
        fputcsv($users_file, $data);
        //redirect user 
        $_SESSION['auth'] = [$name, $email];
        redirect("../index.php");
        die();
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../register.php");
        die;
    }
} else {
    echo "not supported method";
};
