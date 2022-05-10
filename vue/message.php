<?php
if (isset($_GET["user"]) && isset($_GET["guest"])) {
    include_once "../modele/function.php"; ?>
    <div class="content_messagerie" id="content_message">
        <?php foreach (get_message(intval($_GET["user"]), intval($_GET["guest"])) as $key => $value) { ?>

            <?php if ($value["user_send"] == intval($_GET["user"])) { ?>
                <div class="user_message">
                    <img width="50" height="50" src="images/utilisateur.png" alt="<?php echo $value['pseudo']; ?>">
                    <p><?php echo $value["content"]; ?></p>
                </div>
            <?php } else { ?>
                <div class="guest_message">
                    <img width="50" height="50" src="images/utilisateur.png" alt="<?php echo $value['pseudo']; ?>">
                    <p><?php echo $value["content"]; ?></p>
                </div>
        <?php }
        } ?>

    </div>
    <form action="modele/send_message.php" method="POST">
        <div class="d-flex footer_messagerie">
            <div class="col-8">
                <textarea name="message" id="message"></textarea>
            </div>
            <div class="col-4">
                <input type="submit" value="Send" class="btn btn-primary">
            </div>
        </div>
        <input type="hidden" name="user" value="<?php echo $_GET["guest"]; ?>">
    </form>
<?php } ?>