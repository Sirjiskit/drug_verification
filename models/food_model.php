<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of food_model
 *
 * @author Jiskit
 */
class food_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function create($POST, $userId) {
        unset($POST["confirm"]);
        if (strtotime($POST["dom"]) >= strtotime($POST["doe"])):
            die(json_encode(array("status" => 1702, "msg" => "Manufacture date can not be the same or less than expiring date!")));
        endif;
        $data = array_merge($POST, array("userId" => $userId));
        if ($this->db->insert("food", $data)):
            die(json_encode(array("status" => 1701, "msg" => "New food successfully added kindly wait while administrator approved.<br>You will be communicated via email when approved!")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to add new food please try again later!")));
    }

    function food() {
        return $this->db->select("select d.*,datediff(d.doe, CURRENT_TIMESTAMP) days, u.company from food d JOIN users u ON d.userId = u.id");
    }

    function update($POST) {
        $dId = $POST["id"];
        unset($POST["id"]);
        $dData = $this->getFoodInfo($dId);
        $status = ["", "approved", "rejected"][(int) $POST["status"]];
        if (!$dData):
            die(json_encode(array("status" => 1702, "msg" => "Unable to update product status please try again later!")));
        endif;
        $uData = $this->getFoodUserInfo($dData["userId"]);
        if (!$uData):
            die(json_encode(array("status" => 1702, "msg" => "This product status can not be update!")));
        endif;
        if ($this->db->update("food", $POST, "id={$dId}")):
            $html = "<h2>Dear {$uData["name"]}</h2><p>This is to notify you that your product name {$dData["name"]} with a registration no. {$dData["regNo"]} have being {$status}<br>Best regard NAFDAC</p>";
            $this->sendEmail($uData["email"], $uData["name"], "Food and drugs authentication", $html);
            die(json_encode(array("status" => 1701, "msg" => "Product name {$dData["name"]} with a registration no. {$dData["regNo"]} have being {$status}")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to update product status please try again later!")));
    }

    protected function getFoodInfo($id) {
        return $this->db->selectSingleData("select * from food where id = {$id}");
    }

    protected function getFoodUserInfo($id) {
        return $this->db->selectSingleData("select * from users where id = {$id}");
    }

}
