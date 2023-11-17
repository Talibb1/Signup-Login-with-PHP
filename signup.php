<?php
include "Connection.php";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $first_name = filter_input(INPUT_POST, "First_name", FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, "Last_name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING);
    $conform_password = filter_input(INPUT_POST, "conform_password", FILTER_SANITIZE_STRING);

    // Validate data
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($conform_password)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($password_pattern, $password)) {
        $errors[] = "Password must be at least 8 characters long and include one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    if ($password !== $conform_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if there are no validation errors
    if (empty($errors)) {
        // Check if the email already exists
        $check_email_query = "SELECT * FROM `user_signup` WHERE `user_email` = :user_email";
        $check_email_query_prepare = $connection->prepare($check_email_query);
        $check_email_query_prepare->bindParam(':user_email', $email);
        $check_email_query_prepare->execute();

        // If the email already exists, display an error
        if ($check_email_query_prepare->rowCount() > 0) {
            $errors[] = "Email is already in use. Please choose a different email address.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute the INSERT query
            $register_user_query = "INSERT INTO `user_signup`(`first_name`, `last_name`, `user_email`, `user_password`) VALUES (:first_name, :last_name, :user_email, :user_password)";
            $register_user_query_prepare = $connection->prepare($register_user_query);
            $register_user_query_prepare->bindParam(':first_name', $first_name);
            $register_user_query_prepare->bindParam(':last_name', $last_name);
            $register_user_query_prepare->bindParam(':user_email', $email);
            $register_user_query_prepare->bindParam(':user_password', $hashed_password);

            if ($register_user_query_prepare->execute()) {
                // Registration successful
                // You can redirect to a login page or perform other actions
                header("location: login.php");
                exit();
            } else {
                // Registration failed
                $errors[] = "Registration failed. Please try again.";
            }
        }
    }
}


// Close the database connection
$connection = null;
?>

<!-- Rest of your HTML code -->

<?php
// Display validation errors
if (!empty($errors)) {
    echo '<div class="alert alert-danger">';
    foreach ($errors as $error) {
        echo '<p>' . $error . '</p>';
    }
    echo '</div>';
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign up for an account.">
    <meta name="keywords" content="sign up, registration, account creation">
    <meta name="author" content="Your Name">
    <link rel="icon" href="Assets/img/circle-user-solid-min.png" type="image/x-icon">
    <title>Signup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
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
        <section class="text-center text-lg-start">
            <!-- Jumbotron -->
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <article class="card cascading-right" style="
                            background: hsla(0, 0%, 100%, 0.55);
                            backdrop-filter: blur(30px);
                            ">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5">Sign up now</h2>

                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                                    <!-- first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="First_name" name="First_name"
                                                    title="Insert First Name" class="form-control"
                                                    placeholder="First name" />
                                                <label class="" for="First_name"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="Last_name" name="Last_name"
                                                    title="Insert Last Name" class="form-control"
                                                    placeholder="Last name" />
                                                <label class="" for="Last_name"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" title="Insert Email"
                                            class="form-control" placeholder="Enter email" />
                                        <label class="" for="email"></label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="Password" name="Password" title="Insert Password"
                                            class="form-control" placeholder="Password" />
                                        <label class="" for="Password"></label>
                                    </div>
                                    <!-- Conform Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="conform_password" name="conform_password"
                                            title="Insert Conform Password" class="form-control"
                                            placeholder="Conform Password" />
                                        <label class="" for="Conform Password"></label>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" title="Subscribe to our newsletter"
                                            type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Subscribe to our newsletter
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-primary btn-block mb-2" title="Click To Signup">
                                        Sign up
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">

                                        <p class="small mt-2 mb-2" title="Click To Login">you have an account? <a
                                                href="login.php" class="link-danger">Login</a></p>

                                        <button type="button" title="Login with facebook"
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button href="<?php echo $loginURL; ?>" title="Login with google" type="button"
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" title="Login with github"
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                            class="w-100 rounded-4 shadow-4" alt="" />
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->
    </main>

    <footer>
        <!-- Footer content goes here, if any -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>