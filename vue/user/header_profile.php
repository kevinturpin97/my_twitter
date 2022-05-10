<?php
include_once "modele/user.php";
include_once "modele/function.php";
?>
<div class="row">
    <div class="col-md-12" id="header_profile">
        <a href="dashboard.php" class="btn shadow-none"><i class="fa fa-arrow-left"></i></a>
        <div class="col">
            <h2><?php echo $_SESSION["user"]->getLastname() . " " . $_SESSION["user"]->getName(); ?></h2>
            <p><?php echo get_number_tweet($_SESSION["user"]->getId()); ?> tweets</p>
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

    <button class="btn btn-secondary"><i class="fa fa-gear"></i> Set up profile</button>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col">
            <h2><?php echo $_SESSION["user"]->getLastname() . " " . $_SESSION["user"]->getName(); ?></h2>
            <p>@<?php echo $_SESSION["user"]->getPseudo(); ?></p>
            <p><i class="fa fa-calendar" style="margin: 0 !important;"></i> Joined on <?php echo $_SESSION["user"]->format_date_profile(); ?></p>
            <div id="follow">
                <p class="btn" onclick="ajax_following(<?php echo $_SESSION['user']->getId(); ?>)"><b><?php echo get_nb_following($_SESSION["user"]->getId()); ?></b> Following</p>
                <p class="btn" onclick="ajax_follower(<?php echo $_SESSION['user']->getId(); ?>)"><b><?php echo get_nb_follower($_SESSION["user"]->getId()); ?></b> Followers</p>
            </div>
        </div>
    </div>
</div>