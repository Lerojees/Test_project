<?php
session_start();

// Check is user authorized
if (!isset($_SESSION['email'])) {
    // if not, redirect to login page
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dog-container {
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        }
        .dog-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="dog-container">
        <h2>Hello! Here your daily dog picture!</h2>
        <img id="dog-image" class="dog-image" src="" alt="Dog Image">
    </div>

    <!-- JS for taking dog picture -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            async function fetchDogImage() {
                try {
                    const responce = await fetch('https://dog.ceo/api/breeds/image/random');
                    const data = await responce.json();

                    if (data && data.message) {
                        document.getElementById('dog-image').src = data.message;
                    } else {
                        console.error("Error: can't get url of image");
                    }

                } catch (error) {
                    console.error("Error while taking a picture: ", error);
                }
            }
            
            fetchDogImage();
        });
    </script>
</body>
</html>