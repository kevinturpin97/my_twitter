<?php
include_once "user.php";
include_once "function.php";

session_start();

$data = null;
$file_type = null;

if (isset($_POST["tweet"]) && isset($_SESSION["user"])) {
    if (strlen($_POST["tweet"]) <= 280) {
        if (isset($_FILES["image"]["name"]) != "") {
            $img = file_get_contents($_FILES["image"]["tmp_name"]);
            $data = base64_encode($img);
            $file_type = $_FILES["image"]["type"];
            if (($_FILES["image"]["size"] > 16500000) && (isset($_FILES["image"]["size"])))
                return header("Location: http://localhost:8000/dashboard.php?size_max=true");
        }

        

        send_tweet(intval($_SESSION["user"]->getId()), $_POST["tweet"], $data, $file_type);
        return header("Location: http://localhost:8000/dashboard.php");
    }
}
