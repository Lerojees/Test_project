<?php
session_start();

require_once '../config/db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT email, password FROM users WHERE email = ?";
    $params = ["s", $email];

    $user = fetchData($query, $params);
    
    if ($user) {
        $userData = $user[0];

        if (password_verify($password, $userData['password'])) {

            $_SESSION['email'] = $userData['email'];

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid credential";
        }
    } else {
        $error = "User not foud";
    }
}
?>