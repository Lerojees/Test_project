<?php
session_start();

require_once '../config/db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    $query = "INSERT INTO users (email, password) VALUES (?, ?)";
    $params = ["ss", $email, $password];

    if (insertData($query, $params)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Something went wrong! Try again later";
    }
}

closeConnection();
?>