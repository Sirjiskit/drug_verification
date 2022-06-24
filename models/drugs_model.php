<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of drugs_model
 *
 * @author Jiskit
 */
class drugs_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function create($POST, $userId) {
        $POST["drugs_class"] = implode(",", $POST["drugs_class"]);
        unset($POST["confirm"]);
        if (strtotime($POST["dom"]) >= strtotime($POST["doe"])):
            die(json_encode(array("status" => 1702, "msg" => "Manufacture date can not be the same or less than expiring date!")));
        endif;
        $data = array_merge($POST, array("userId" => $userId));
        if ($this->db->insert("drugs", $data)):
            die(json_encode(array("status" => 1701, "msg" => "New drugs successfully added kindly wait while administrator approved.<br>You will be communicated via email when approved!")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to add new drug please try again later!")));
    }

    function drugs() {
        return $this->db->select("select d.*,datediff(d.doe, CURRENT_TIMESTAMP) days, u.company from drugs d JOIN users u ON d.userId = u.id");
    }

    function update($POST) {
        $dId = $POST["id"];
        unset($POST["id"]);
        $dData = $this->getDrugInfo($dId);
        $status = ["", "approved", "rejected"][(int) $POST["status"]];
        if (!$dData):
            die(json_encode(array("status" => 1702, "msg" => "Unable to update drug status please try again later!")));
        endif;
        $uData = $this->getDrugUserInfo($dData["userId"]);
        if (!$uData):
            die(json_encode(array("status" => 1702, "msg" => "This drug status can not be update!")));
        endif;
        if ($this->db->update("drugs", $POST, "id={$dId}")):
            $html = "<h2>Dear {$uData["name"]}</h2><p>This is to notify you that your drug name {$dData["name"]} with a barcode no. {$dData["barcode"]} have being {$status}<br>Best regard NAFDAC</p>";
            $this->sendEmail($uData["email"], $uData["name"], "Food and drugs authentication", $html);
            die(json_encode(array("status" => 1701, "msg" => "Drug name {$dData["name"]} with a barcode no. {$dData["barcode"]} have being {$status}")));
        endif;
        die(json_encode(array("status" => 1702, "msg" => "Unable to update drug status please try again later!")));
    }

    protected function getDrugInfo($id) {
        return $this->db->selectSingleData("select * from drugs where id = {$id}");
    }

    protected function getDrugUserInfo($id) {
        return $this->db->selectSingleData("select * from users where id = {$id}");
    }

}
