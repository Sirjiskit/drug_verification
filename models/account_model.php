<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account_model
 *
 * @author Jiskit
 */
class account_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function register($POST) {
        unset($POST["tc"]);
        $email = $this->db->selectSingleData("select * from users where email = '{$POST["email"]}'");
        if ($email):
            die(json_encode(array("status" => 1702, "msg" => "Email address already exists!")));
        endif;
        $POST["password"] = sha1($POST["password"]);
        if ($this->db->insert("users", array_merge($POST, array("role" => 2)))):
            $html = "<h2>Dear {$POST["name"]}</h2><p>Your account successfully created kindly wait while administration approved your registration.<br>You will be communicated with you when approved!<br>Best regard NAFDAC</p>";
            $this->sendEmail($POST["email"], $POST["name"], "Food and drugs authentication", $html);
            die(json_encode(array("status" => 1701, "msg" => "Your account successfully created kindly wait while administrator approved your registration.<br>You will be communicated via email when approved!")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to create your accont please try again later!")));
    }

    public function run() {
        $username = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $INPUT = array(':email' => $username, ':password' => sha1($password));
        $sth = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sth->execute($INPUT);
        $count = $sth->rowCount();
        $data = $sth->fetch();
        $error = "";
        if ($count > 0) {
            if ((int) $data["status"] == 0 || (int) $data["status"] == 2):
                $error = "account/login?hasError=403";
            else:
                Session::init();
                Session::set('loggedIn', true);
                Session::set('id', $data['id']);
                Session::set('name', $data['name']);
                Session::set('role', (int) intval($data['role']));
            endif;
        } else {
            $error = "account/login?hasError=404";
        }
        header("location: " . URL . $error);
    }

}
