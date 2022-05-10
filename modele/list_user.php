<?php
include_once "../controller/database.php";
include_once "function.php";
include_once "user.php";
session_start();

if (isset($_GET["followers"])) {
    foreach (get_follower(intval($_GET["followers"])) as $key => $value) {
        echo "<div class='d-flex flex-nowrap direction-row'><p class='btn list_user' onclick=\"insert_user('" . $value["pseudo"] . "')\">" . $value["lastname"][0] . ". " . $value["name"] . " <span style='color:#0a58ca;'>@" . $value["pseudo"] . "</span></p></div>";
    }
}
elseif (isset($_GET["following"])) {
    foreach (get_following(intval($_GET["following"])) as $key => $value) {
        echo "<div class='d-flex flex-nowrap direction-row'><button onclick='unfollow(" . $value["id"] . ")' class='btn btn-danger'>x</button><p class='btn list_user' onclick=\"insert_user('" . $value["pseudo"] . "')\">" . $value["lastname"][0] . ". " . $value["name"] . " <span style='color:#0a58ca;'>@" . $value["pseudo"] . "</span></p></div>";
    }
}
