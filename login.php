<?php

session_start();

$message = '';
if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            background-color: #91a5a7;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 2rem;
        }

        .card h4 {
            font-weight: bold;
            color: #ffffff;
        }

        .form-label {
            color: #ffffff;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #4a6fa5;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3b5c85;
        }

        .error-message {
            color: #ff0000;
            font-style: italic;
        }

        .register-link {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <h4 class="text-center mb-4">LOGIN</h4>
        <form action="./ctrl_login.php" method="POST">
            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    placeholder="Masukkan Username" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan Password" required>
            </div>

            <?php if (isset($message)): ?>
                <p class="error-message"><?= $message ?></p>
            <?php endif; ?>

            <input type="submit" name="submit" value="Login" class="btn btn-primary form-control mt-3">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>