<?php
include "user.php";
include "function.php";

if (isset($_GET["id"]) && isset($_GET["who_am_i_follow"])) {
    follow_user(intval($_GET["who_am_i_follow"]), intval($_GET["id"]));
}
