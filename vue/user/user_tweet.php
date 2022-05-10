<?php
include_once "modele/user.php";
include_once "modele/function.php";
?>

<?php foreach (get_user_tweet($_SESSION["user"]->getId()) as $key => $list_tweet) { ?>

    <div class="col">
        <div class="tweet">
            <div class="user_tweet">
                <img src="images/utilisateur.png" alt="ImageUser" width="50">
                <div>
                    <p class="info_tweet"><a href="#" style="text-decoration: none !important;"><span style="text-decoration: underline; font-weight: bold;"><?php echo $list_tweet["lastname"] . " " . $list_tweet["name"]; ?></span> @<?php echo $list_tweet["pseudo"]; ?></a> · <?php echo $list_tweet["date"]; ?></p>
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
                <button class="btn">
                    <i class="fa fa-heart"></i>
                    23
                </button>
                <button class="btn">
                    <i class="fa fa-arrow-up-from-bracket"></i>
                </button>
            </div>
        </div>
    </div>

<?php } ?>