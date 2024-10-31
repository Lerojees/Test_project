<?php
session_start();
require_once '../includes/auth_logic.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            height: 500px;
            width: 300px;
            padding: 15px;
        }
        #joke-container {
            max-width: 400px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div id="joke-container" class="mt-3 text-center text-muteed container"></div>
    
    <div class="login-container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <!--If any errors-->
                    <?php if ($error): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
        <div class="mt-3 text-center">
            <h6>Don't have an account?</h6><a href="register.php">Register!</a>
        </div>
    </div>

    <!--add script for jokes -->
    <script>
        async function fetchJoke() {
            try {
                const responce = await fetch('https://official-joke-api.appspot.com/jokes/programming/random');
                const data = await responce.json();
                const joke = data[0]
                document.getElementById('joke-container').innerText = joke.setup ? `${joke.setup} - ${joke.punchline}` : joke.joke;
            } catch (error) {
                console.error("An error while fetching joke: ", error);
            }
        }

        fetchJoke();
    </script>
</body>
</html>