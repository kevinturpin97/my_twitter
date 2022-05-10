<?php include_once "modele/function.php"; ?>
<div class="panel">
    <form action="" id="form">
        <label for="search"><i class="fa fa-search"></i></label>
        <input type="text" name="search" id="search" class="form-control" placeholder="Search">
    </form>
    <div class="ground">
        <h2>You might like</h2>
        <?php if (you_might_like($_SESSION["user"]->getId())) { ?>
            <?php foreach (you_might_like($_SESSION["user"]->getId()) as $key => $value) { ?>
                <?php //echo  
                ?>
                <div class="card my_card">
                    <div class="img_info_user">
                        <img src="images/utilisateur.png" alt="user-picture" width="50">
                        <div class="my_info">
                            <a href="#"><?php echo $value["lastname"] . " " . $value["name"]; ?></a>
                            <cite>@<?php echo $value["pseudo"]; ?></cite>
                        </div>
                    </div>
                    <button class="btn btn-dark" onclick="follow_user(<?php echo $value['id']; ?>, <?php echo $_SESSION['user']->getId(); ?>)">FOLLOW</button>
                </div>

            <?php } ?>

            <a class="nav-link" href="#">Show more</a>

        <?php } else { ?>

            <p style="display:flex;align-items:center;"><i style="font-size:25px;" class="fa fa-face-sad-cry"></i>..nobody </p>

        <?php } ?>
    </div>
    <br>
    <div class="row">
        <a href="modele/logout.php" class="btn btn-danger">Sign out</a>
    </div>
    <footer class="footer">
        <p>Copyright &copy; 2022 - Team WINDOWS W&#64;C</p>
    </footer>
</div>