<?php include "Connection.php" ?>

<?php
if (isset($_SESSION["userId"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page - Your Description Here">
    <meta name="keywords" content="login, authentication, web development">
    <meta name="author" content="Your Name">
    <link rel="icon" href="Assets/img/circle-user-solid-min.png" type="image/x-icon">

    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>

    <header>
        <!-- Header content goes here, if any -->
    </header>

    <main>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="Assets/img/login img.jpg" class="img-fluid"
                            alt="Login image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="post" action="login.php">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fa-brands fa-github"></i>
                                </button>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter email" />
                                    <label class="" for="email"></label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Enter password" />
                                    <label class="" for="password"></label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="Remember_me" />
                                    <label class="form-check-label" for="Remember_me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="Forgot_password.php" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                                        class="link-danger">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <!-- Footer content goes here, if any -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
