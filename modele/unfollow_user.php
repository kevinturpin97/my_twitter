<?php
include_once "user.php";
include_once "function.php";
session_start();

if (isset($_SESSION["user"]) && isset($_GET["user"])) {
    delete_follower(intval($_SESSION["user"]), intval($_GET["user"]));
}

return header("Location: http://localhost:8000/profile.php");
