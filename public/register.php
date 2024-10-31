<?php
session_start();
require_once '../includes/reg_logic.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .registrarion-container {
            width: 100%;
            max-width: 400px;
            height: 500px;
            width: 300px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="registrarion-container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Registration</h2>
            </div>
            <div class="card-body">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="example@mail.com"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="password"
                            minlength="8"
                            pattern="^[a-zA-Z0-9]+$"
                            title="Вы можете использовать только латинские буквы."
                            required
                        />
                    </div>
                    <?php if ($error): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
        <div class="mt-3 text-center">
            <h6>Already have an account?</h6><a href="login.php">Log in!</a>
        </div>
    </div>
</body>
</html>