<?php

class user {
    public int $id;
    public string $register_date;
    public string $lastname;
    public string $name;
    public string $birth;
    public string $mail;
    // public array $tweet;
    public string $pseudo;
    protected string $password;

    public function __construct($id, $register_date, $lastname, $name, $birth, $mail, $password, $pseudo /*, $tweet */)
    {
        $this->id = $id;
        $this->register_date = $register_date;
        $this->lastname = $lastname;
        $this->name = $name;
        $this->birth = $birth;
        $this->mail = $mail;
        $this->password = $password;
        $this->pseudo = $pseudo;
        //$this->tweet = $tweet;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setRegister_date($register_date)
    {
        $this->register_date = $register_date;
    }

    public function getRegister_date()
    {
        return $this->register_date;
    }

    public function format_date_profile()
    {
        $date = new DateTime($this->register_date);
        return $date->format("F Y");
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /* public function setTweet($tweet)
    {
        $this->tweet = $tweet;
    }

    public function getTweet()
    {
        return $this->tweet;
    } */
}
