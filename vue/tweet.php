<?php if (isset($_POST["size_max"])) {
    echo "<p>Veuillez sélectionner une taille inférieure à 16 Mo.</p>";
} ?>
<form action="modele/send_tweet.php" method="POST" enctype="multipart/form-data">
    <div class="tweet-form">
        <h2 for="tweet">Home</h2>
        <textarea oninput="my_textarea(<?php echo $_SESSION['user']->getId(); ?>)" name="tweet" id="tweet" class="form-control" placeholder="What's happening?" required></textarea>
        <div id="list-button">
            <div class="list-button">
                <label for="image">
                    <input style="display:none;" type="file" name="image" id="image">
                    <i class="fa fa-image"></i>
                </label>
                <label for="GIF" onclick="see_gif()">
                    <i class="fa fa-camera-retro"></i>
                    <input style="display:none;" type="" name="" id="">
                </label>
                <label for="">
                    <input style="display:none;" type="file" name="" id="">
                    <i class="fa fa-chart-line"></i>
                </label>
                <label for="" onclick="emoji()">
                    <i class="fa fa-face-grin-wide"></i>
                </label>
            </div>
            <button class="btn btn-primary" type="submit">Tweet now</button>
        </div>
    </div>
</form>