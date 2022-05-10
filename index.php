<!DOCTYPE html>
<html lang="en">
<?php
include "modele/user.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Don't Tweet Her.</title>
</head>

<body>

    <header id="home_login">
        <nav class="navbar bg-light">
            <ul class="navbar-nav justify-content-between flex-row align-items-center" style="width: 100%; padding: 0 5%;">
                <a href="#" class="navbar-brand"><img src="images/logo.png" alt="logo" width="50"> Twitter</a>
                <li class="nav-item">No account yet? <a class="btn btn-primary" href="register.php">Sign up</a></li>
            </ul>
        </nav>
    </header>

    <div class="container-fluid" style="padding: 0 !important; position: fixed; z-index: -1;">
        <div class="row">
            <video src="images/background.mp4" autoplay loop></video>
        </div>
    </div>

    <?php if (!isset($_SESSION["user"])) { ?>

        <div class="container" style="margin-top: 5% !important;">
            <div class="row justify-content-center">
                <div class="col-md-4 p-5" style="background-color: rgba(248,249,250,0.5); border-radius: 10px;">
                    <form action="modele/login.php" method="POST">
                        <label for="mail" class="mt-2">Mail adress: </label>
                        <input type="email" name="mail" id="mail" class="form-control mt-2">
                        <label for="password" class="mt-2">Password: </label>
                        <input type="password" name="password" id="password" class="form-control mt-2">
                        <input type="submit" value="Sign in" class="btn btn-primary mt-2">
                    </form>
                </div>
            </div>
        </div>

    <?php } else {
        return header("Location: http://localhost:8000/dashboard.php");
    }
    ?>

    <script src="js/script.js"></script>
</body>

</html>