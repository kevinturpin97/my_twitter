<!DOCTYPE html>
<html lang="en">
<?php include "vue/head.php"; ?>

<body>
    <?php if (isset($_SESSION["user"]) && isset($_GET["tag"])) { ?>

        <?php include "vue/header_left.php"; ?>

        <div class="container" id="dashboard">

            <div class="col-md-12">
                <h2 class="mb-5">Every tweets about #<?php echo $_GET["tag"]; ?></h1>

                    <?php include "vue/tweet_hashtag.php"; ?>

            </div>
        </div>

        <?php include "vue/header_right.php"; ?>

    <?php } ?>
</body>

</html>