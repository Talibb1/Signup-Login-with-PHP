<?php
include "Connection.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Password Reset - Enter your email to reset your password.">
    <meta name="keywords" content="password reset, forgot password, email, instructions">
    <meta name="author" content="Your Name">
    <link rel="icon" href="Assets/img/circle-user-solid-min.png" type="image/x-icon">

    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <!-- Header content goes here, if any -->
    </header>

    <main class="d-flex p-5 justify-content-center flex-wrap">
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white bg-primary">Password Reset</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Enter your email address and we'll send you an email with instructions to reset your password.
                </p>
                <div class="form-outline">
                    <input type="email" id="email" name="email" title="Insert Email" placeholder="Insert Email"  class="form-control my-3" />
                    <label class="form-label" for="Email"></label>
                </div>
                <a href="otp-input-field/index.php" class="btn btn-primary w-100">Send Message</a>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="login.php">Login</a>
                    <a class="" href="signup.php">Register</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- Footer content goes here, if any -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>