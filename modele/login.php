<?php
include_once "../controller/database.php";
include_once "../controller/user_request.php";
include_once "user.php";

if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $user = signin($_POST["mail"], $_POST["password"]);
    if (count($user) != 0) {
        session_start();
        $_SESSION["user"] = new user(
            $user["id"], 
            $user["register_date"], 
            $user["lastname"], 
            $user["name"], 
            $user["birth"], 
            $user["mail"], 
            $user["password"],
            $user["pseudo"]
        );
        return header("Location: http://localhost:8000/dashboard.php");
        exit;
    }

}


return header("Location: http://localhost:8000/index.php");
exit;
