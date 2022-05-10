<!DOCTYPE html>
<html lang="en">

<?php include "vue/head.php"; ?>

<body>

    <?php if (!isset($_SESSION["user"])) return header("Location: http://localhost:8000/index.php"); ?>

    <?php include "vue/header_left.php"; ?>

    <div class="container pt-0">

        <?php
        if (!isset($_GET["user"])) {
            include "vue/user/header_profile.php";
        } else {
            include "vue/guest/header_profile.php";
        }
        ?>

        <div class="row" id="list-tweet">
            <div class="col-md-12">
                <h6>Tweets</h6>

                <?php
                if (!isset($_GET["user"])) {
                    include "vue/user/user_tweet.php";
                } else {
                    include "vue/guest/user_tweet.php";
                }
                ?>

            </div>
        </div>
    </div>

    <?php include "vue/header_right.php"; ?>
</body>

</html>