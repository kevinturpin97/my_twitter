<?php
include_once "../modele/user.php";
include_once "../modele/function.php";
session_start();
if (isset($_SESSION["user"])) { ?>
    <?php foreach (get_all_tweet() as $key => $list_tweet) { ?>

        <div class="row">
            <div class="col-md-12">
                <div class="tweet">
                    <div class="user_tweet">
                        <img src="images/utilisateur.png" alt="ImageUser" width="50">
                        <div>
                            <p class="info_tweet">

                                <?php if ($list_tweet["id"] === $_SESSION["user"]->getId()) { ?>
                                    <a href="profile.php" style="text-decoration: none !important;">
                                    <?php } else { ?>
                                        <a href="profile.php?user=<?php echo $list_tweet["id"]; ?>" style="text-decoration: none !important;">
                                        <?php } ?>

                                        <span style="text-decoration: underline; font-weight: bold;"><?php echo $list_tweet["lastname"] . " " . $list_tweet["name"]; ?>
                                        </span> @<?php echo $list_tweet["pseudo"]; ?>
                                        </a> · <?php echo $list_tweet["date"]; ?>
                            </p>
                            <div class="resume_tweet">
                                <p><?php echo $list_tweet["tweet"]; ?></p>
                                <?php if (($list_tweet["image"]) != "") { ?>
                                    <img style="width:100%;height:auto;" src="data:<?php echo $list_tweet['file_type']; ?>;base64, <?php echo $list_tweet['image']; ?>" />
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="list-tweet-button">
                        <button class="btn">
                            <i class="fa fa-comment"></i>
                            8
                        </button>
                        <button class="btn">
                            <i class="fa fa-retweet"></i>
                            10
                        </button>
                        <button class="btn" onclick="console.log(<?php echo $_SESSION['user']->getId(); ?>)">
                            <i class="fa-regular fa-heart"></i>
                           <!-- <i class="fa-regular fa-heart"></i> -->
                            0
                        </button>
                        <button class="btn">
                            <i class="fa fa-arrow-up-from-bracket"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

<?php }
} ?>