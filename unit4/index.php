<?php

// PROCESSING SECTION (POST)

$errors = [];
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES, "UTF-8");
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $confirm = $_POST["confirm_password"];

    // 1. Check empty fields
    if (
        empty($username) ||
        empty($email) ||
        empty($password) ||
        empty($confirm)
    ) {
        $errors[] = "All fields must be filled.";
    }

    // 2. Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // 3. Password rules
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must include at least one number.";
    }

    if (!preg_match("/[!@#$%^&*]/", $password)) {
        $errors[] =
            "Password must include at least one special character (!@#$%^&*).";
    }

    // 4. Confirm password
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    // Success message
    if (empty($errors)) {
        $successMessage = "Registration successful! Welcome, $username.";
    }
}

// GET METHOD DEMO SECTION
$welcome = isset($_GET["msg"])
    ? htmlspecialchars($_GET["msg"])
    : "No GET message received.";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Two-Column GET & POST Demo</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        .container {
            display: flex;
            gap: 40px;
        }
        .box {
            padding: 20px;
            width: 45%;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        h2 { margin-top: 0; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<h1>Community Platform Prototype</h1>

<div class="container">

    <!--      LEFT COLUMN: GET       -->
    <div class="box">
        <h2>GET Method Demo</h2>

        <p><strong>Message from GET:</strong> <?= $welcome ?></p>

        <p>Try visiting this URL to test GET:</p>

        <p><code>http://localhost/index.php?msg=Hello+World</code></p>

        <hr>

        <p>You can also test GET using this mini-form:</p>

        <form method="GET" action="">
            <input type="text" name="msg" placeholder="Enter message">
            <button type="submit">Send GET</button>
        </form>
    </div>


    <!--   RIGHT COLUMN: POST FORM   -->
    <div class="box">
        <h2>User Registration (POST)</h2>

        <?php
        if (!empty($errors)) {
            echo "<div class='error'><strong>Please fix these errors:</strong><ul>";
            foreach ($errors as $e) {
                echo "<li>$e</li>";
            }
            echo "</ul></div>";
        }

        if (!empty($successMessage)) {
            echo "<p class='success'>$successMessage</p>";
        }
        ?>

        <form action="" method="POST">
            <p>Username:<br>
                <input type="text" name="username"></p>

            <p>Email:<br>
                <input type="text" name="email"></p>

            <p>Password:<br>
                <input type="password" name="password"></p>

            <p>Confirm Password:<br>
                <input type="password" name="confirm_password"></p>

            <button type="submit">Register</button>
        </form>
    </div>

</div>

</body>
</html>
