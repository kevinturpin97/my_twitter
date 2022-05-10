<?php
include_once "user.php";
include_once "function.php";

session_start();
if (isset($_POST["message"]) && isset($_SESSION["user"]) && isset($_POST["user"])) {
    send_message(intval($_SESSION["user"]->getId()), intval($_POST["user"]), $_POST["message"]);
    return header("Location: http://localhost:8000/messagerie.php?guest=" . $_POST["user"]);
}

return header("Location: http://localhost:8000/messagerie.php");
