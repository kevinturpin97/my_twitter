<?php

function hash_psw(string $str){
    $psw = hash("ripemd160", $str . "vive le projet tweet_academy");
    return $psw;
}

function signup(string $lastname, string $name, string $mail, string $password, string $pseudo, string $birthdate) 
{
    global $db;

    $psw = hash_psw($password);
    $query = "INSERT INTO users (`register_date`, `lastname`, `name`, `birth`, `mail`, `password`, `pseudo`) VALUES (NOW(),'".$lastname."','".$name."','".$birthdate."','".$mail."','".$psw."','".$pseudo."');";
    $db->prepare($query);

    return $db->exec($query);
}

function signin(string $mail, string $password) 
{
    global $db;

    $verify_psw = hash_psw($password);

    $query = "SELECT * FROM users WHERE mail='$mail' AND password='$verify_psw';";

    foreach ($db->query($query) as $key => $value) {
        return $value;
    }
}
