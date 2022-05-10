<?php
include_once "../controller/database.php";
include_once "controller/database.php";

function get_all_tweet()
{
    global $db;

    $query = "SELECT list_tweet.id_tweet, list_tweet.id_users, list_tweet.tweet, list_tweet.image,  DATE_FORMAT(list_tweet.date, '%d %b') as 'date', list_tweet.available, 
    users.name, users.lastname, users.id, users.pseudo 
    FROM list_tweet 
    INNER JOIN users ON list_tweet.id_users = users.id 
    ORDER BY list_tweet.id_tweet DESC;";
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }

    $list = hashtag($list);

    return $list;
}


function hashtag(array $list) /***** Gère les hashtags par découpe + ajout lien ******/
{
    foreach ($list as $key => $value) {
        $explode = explode(" ", $value["tweet"]);
        foreach ($explode as $c => $n_value) {
            if (preg_match("/#/", $n_value)) {
                $explode[$c] = "<a class='hashtag' href='hashtag.php?tag=" . substr($n_value, 1) . "'>".$n_value;
                $explode[$c] .= "</a>";
            }
        }
        $list[$key]["tweet"] = implode(" ", $explode);
    }

    return $list;
}

function get_user_tweet(int $id_user)
{
    global $db;

    $query = "SELECT list_tweet.id_tweet, list_tweet.id_users, list_tweet.image, list_tweet.tweet, DATE_FORMAT(list_tweet.date, '%d %b') AS 'date', list_tweet.available, 
    users.name, users.lastname, users.id, users.pseudo 
    FROM list_tweet 
    INNER JOIN users ON list_tweet.id_users = users.id 
    WHERE users.id =" . $id_user . " ORDER BY list_tweet.id_tweet DESC;";
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }

    $list = hashtag($list);

    return $list;
}

function send_tweet(int $id_user, string $tweet, $data, $file_type)
{
    $dbname = "common-database";
    $dbusername = "debian-sys-maint";
    $dbpassword = "m8epZLpg06LYvjk3";
    $db = new PDO(
        "mysql:host=localhost;dbname=$dbname;charset=utf8",
        $dbusername,
        $dbpassword
    );

    $tweet = str_split($tweet);

    foreach ($tweet as $key => $value) { //* ********************* *//
        if ($value == "'")              //* Gère les apostrophes  *//
            $tweet[$key] = "\'";       //* ********************* *//
    }

    $tweet = implode("", $tweet);
    $date = new DateTime();
    $date = $date->format('Y-m-d');
    if ($data != "")
        $query = "INSERT INTO `list_tweet`(`id_users`, `tweet`, `date`, `image`, `file_type`) VALUES ( " . $id_user . ", '" . $tweet . "', '" . $date . "','" . $data . "','" . $file_type . "')";
    else
        $query = "INSERT INTO `list_tweet`(`id_users`, `tweet`, `date`) VALUES ( " . $id_user . ", '" . $tweet . "', '" . $date . "')";
    
        return $db->exec($query);

}

function get_nb_follower(int $id_user)
{
    global $db;

    $query = "SELECT COUNT(*) FROM follow WHERE id_users=" . $id_user;

    foreach ($db->query($query) as $key => $value) {
        return $value[0];
    }
}

function get_nb_following(int $id_user)
{
    global $db;

    $query = "SELECT COUNT(*) FROM follow WHERE id_followers=" . $id_user;

    foreach ($db->query($query) as $key => $value) {
        return $value[0];
    }
}

function get_follower(int $id_user)
{
    global $db;

    $query = "SELECT users.id, users.lastname, users.name, users.pseudo FROM users INNER JOIN follow ON users.id = follow.id_followers WHERE follow.id_users=" . $id_user;
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
        
    }
    return $list;
}

function get_following(int $id_user)
{
    global $db;

    $query = "SELECT users.id, users.lastname, users.name, users.pseudo FROM users INNER JOIN follow ON users.id = follow.id_users WHERE follow.id_followers=" . $id_user;
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }
    return $list;
}

function get_number_tweet(int $id_user)
{
    global $db;

    $query = "SELECT COUNT(*) FROM list_tweet WHERE id_users=" . $id_user;

    foreach ($db->query($query) as $key => $value) {
        return $value[0];
    }
}

function get_info_user(int $id_user)
{
    global $db;

    $query = "SELECT id, lastname, name, birth, pseudo, register_date FROM users WHERE id=" . $id_user;

    foreach ($db->query($query) as $key => $value) {
        return $value;
    }
}

function get_tweet_by_hashtag(string $hashtag)
{
    global $db;

    $query = "SELECT list_tweet.id_tweet, list_tweet.id_users, list_tweet.tweet, DATE_FORMAT(list_tweet.date, '%d %b') 
            AS 'date', list_tweet.available, users.name, users.lastname, users.id, users.pseudo
            FROM list_tweet INNER JOIN users ON list_tweet.id_users = users.id 
            WHERE tweet LIKE '%#" . $hashtag . "%';";
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }

    $list = hashtag($list);

    return $list;
}

function follow_user(int $id_user, int $id_follow)
{
    global $db;

    $query = "INSERT INTO `follow`(`id_users`, `id_followers`) VALUES (" . $id_user . ", " . $id_follow . ")";

    return $db->exec($query);
}

function you_might_like(int $id)
{
    global $db;

    $query = "SELECT users.id, users.pseudo, users.name, users.lastname FROM users LEFT JOIN follow ON follow.id_users = users.id WHERE NOT users.id = " . $id . " AND follow.id_users IS NULL LIMIT 3;";
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }

    return $list;
}

function delete_follower(int $id_user, int $id_follow)
{
    global $db;

    $query = "DELETE FROM follow WHERE follow.id_users=" . $id_follow . " AND follow.id_followers=" . $id_user;

    return $db->exec($query);
}

function get_message(int $id_user, int $id_guest)
{
    global $db;

    $query = "SELECT message.content, message.date, message.user_send, message.user_receive, users.lastname, users.name, users.pseudo FROM message INNER JOIN users ON message.user_send = users.id WHERE (message.user_send=" . $id_guest ." AND message.user_receive=" . $id_user . ") OR (message.user_send=" . $id_user . " AND message.user_receive=" . $id_guest .") AND message.available=1 ORDER BY message.id ASC LIMIT 20;";
    $list = [];

    foreach ($db->query($query) as $key => $value) {
        $list[] = $value;
    }

    return $list;
}

function send_message (int $id_user, int $id_guest, string $content)
{
    global $db;

    $query = "INSERT INTO message (date, content, user_send, user_receive) VALUES (NOW(),'" . $content . "', " . $id_user . ", " . $id_guest . ");";

    return $db->exec($query);
}

function i_like_it (int $id_user, int $id_tweet)
{
    global $db;

    $query = "INSERT INTO CLS (id_users, LikeMe, id_tweet) VALUES (" . $id_user . ", TRUE, " . $id_tweet . ")";

    return $db->exec($query);
}
