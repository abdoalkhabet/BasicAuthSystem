<?php
session_start();
include '../core/funcations.php';
include '../core/valid.php';
$errors = [];
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $val) {
        $$key = $val;
    };
    if (!requiredVal($email)) {
        $errors[] = " email is required";
    }
    if (!requiredVal($password)) {
        $errors[] = " password is required";
    }
    if (empty($errors)) {
        $users = fopen("../data/users.csv", "r");
        $login_succ = false;
        $all_user = [];
        while (($data = fgetcsv($users)) !== false) {
            $all_user[] = $data;
        }

        fclose($users);
        foreach ($all_user as $user) {
            $name_stored = $user[0];
            $stored_email = $user[1];
            $stored_pass = $user[2];

            if ($stored_email == $email && $stored_pass == sha1($password)) {
                $login_succ = true;
                break;
            }
        }
        if ($login_succ) {
            echo "login successfully";
            // $_SESSION['login'] = true;
            $_SESSION["auth"] = [$name_stored, $email];
            redirect('../index.php');
            die;
        } else {
            $errors[] = "Invalid email or password";
            redirect("../login.php");
            die;
        }
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../login.php");
        die;
    }
} else {
    echo "Please enter";
}
