<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users_model
 *
 * @author Jiskit
 */
class users_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function users() {
        return $this->db->select("select * from users where role = '2'");
    }

    function update($POST) {
        $dId = $POST["id"];
        unset($POST["id"]);
        $status = ["", "approved", "rejected"][(int) $POST["status"]];
        $uData = $this->getUserInfo($dId);
        if (!$uData):
            die(json_encode(array("status" => 1702, "msg" => "This user status can not be update!")));
        endif;
        if ($this->db->update("users", $POST, "id={$dId}")):
            $html = "<h2>Dear {$uData["name"]}</h2><p>This is to notify you that your registration have being {$status}<br>Best regard NAFDAC</p>";
            $this->sendEmail($uData["email"], $uData["name"], "Food and drugs authentication", $html);
            die(json_encode(array("status" => 1701, "msg" => "User registration have being {$status}")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to update user status please try again later!")));
    }

    protected function getUserInfo($id) {
        return $this->db->selectSingleData("select * from users where id = {$id}");
    }

}
