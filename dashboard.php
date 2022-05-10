<!DOCTYPE html>
<html lang="en">

<?php include "vue/head.php" ?>

<body>
    <?php if (!isset($_SESSION['user'])) return header("Location: http://localhost:8000/index.php"); ?>

    <?php include "vue/header_left.php"; ?>

    <div class="container" id="dashboard">
        <div class="col-md-12">

            <?php include "vue/tweet.php"; ?>

            <div id="timeline">

            </div>

        </div>
    </div>

    <?php include "vue/header_right.php"; ?>
</body>

</html>