<?php include_once "modele/function.php"; ?>
<div class="d-flex flex-nowrap flex-row" id="user_list">
    <?php foreach (get_following($_SESSION["user"]->getId()) as $key => $value) { ?>
        <div class="m-1 btn" onclick="get_message(<?php echo $_SESSION['user']->getId() . ',' . $value['id']; ?>)">
            <img src="images/utilisateur.png" alt="user" width="50" />
            <p><?php echo $value["lastname"] . " " . $value["name"]; ?></p>
        </div>
    <?php } ?>
</div>