<?php

// Connetion to database
$host = 'mysql-8.0';
$dbname = 'reg_users';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// func for entering data in table
function insertData($query, $params) {
    global $conn;

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    $stmt->bind_param(...$params);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}

//func for fetching data
function fetchData($query, $params) {
    global $conn;

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    if ($params) {
        $stmt->bind_param(...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC); // Obtaining all data as an associative array

    $stmt->close();

    return $data;
}

function closeConnection() {
    global $conn;
    $conn->close();
}
?>