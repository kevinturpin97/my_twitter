<?php
include_once "modele/user.php";
include_once "modele/function.php";

$user = get_info_user($_GET["user"]);
$nbr_tweet = count(get_user_tweet($_GET["user"]));
?>
<div class="row">
    <div class="col-md-12" id="header_profile">
        <a href="dashboard.php" class="btn shadow-none"><i class="fa fa-arrow-left"></i></a>
        <div class="col">
            <h2><?php echo $user["lastname"] . " " . $user["name"]; ?></h2>
            <p><?php echo $nbr_tweet; ?> tweets</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <img src="images/banner.jpg" alt="banner">
    </div>
</div>
<div class="row" id="userprofile">
    <div class="col-md-3">
        <img src="images/utilisateur.png" alt="userimage" id="userimage">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col">
            <h2><?php echo $user["lastname"] . " " . $user["name"]; ?></h2>
            <p>@<?php echo $user["pseudo"]; ?></p>
            <p><i class="fa fa-calendar" style="margin: 0 !important;"></i> Joined on <?php echo $user["register_date"]; ?></p>
            <div id="follow">
                <p class="btn" onclick="ajax_following(<?php echo $_GET['user']; ?>)"><b><?php echo get_nb_following($_GET['user']); ?></b> Following</p>
                <p class="btn" onclick="ajax_follower(<?php echo $_GET['user']; ?>)"><b><?php echo get_nb_follower($_GET['user']); ?></b> Followers</p>
            </div>
        </div>
    </div>
</div>