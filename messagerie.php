<!DOCTYPE html>
<html lang="en">
<?php include "vue/head.php"; ?>

<body>
    <?php if (isset($_SESSION["user"])) { ?>

        <?php include "vue/header_left.php"; ?>

        <div class="container" id="dashboard">
            <div class="col-md-12">
                <h2>Messages</h2>
                <?php include "vue/list_user.php"; ?>
                <?php if (isset($_GET["guest"])) { ?>
                    <div class="d-flex flex-nowrap flex-column" id="my_message">
                        <script>
                            get_message(<?php echo $_SESSION['user']->getId() . ',' . $_GET['guest']; ?>);
                        </script>
                        <!-- include with ajax and autorefresh -->
                    <?php } else { ?>
                        <div class="d-flex flex-nowrap flex-column" id="my_message">
                        <?php } ?>
                        </div>
                    </div>
            </div>

            <?php include "vue/header_right.php"; ?>

        <?php } ?>

</body>

</html>