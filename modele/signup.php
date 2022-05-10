<?php
include_once "../controller/database.php";
include_once "../controller/user_request.php";

if (isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["lastname"]) && isset($_POST["name"]) && isset($_POST["pseudo"]) && isset($_POST["birthdate"])) {
    signup($_POST["lastname"], $_POST["name"], $_POST["mail"], $_POST["password"], $_POST["pseudo"], $_POST["birthdate"]);

    return header("Location: http://localhost:8000");
    exit;
}

return header("Location: http://localhost:8000");
exit;
