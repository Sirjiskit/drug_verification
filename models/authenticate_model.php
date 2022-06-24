<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authenticate_model
 *
 * @author Jiskit
 */
class authenticate_model extends Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function getHTML($POST) {
        $html = '<table class="table"><thead><tr><th>Product Type</th><th>Product name</th><th>Manufacturer</th><th>Active Ingredient/Class(es)</th>'
                . '<th>Expire in</th> <th>Status</th></tr></thead>';
        $d = $this->drugs(filter_var($POST["search"], FILTER_SANITIZE_STRING));
        $f = $this->food(filter_var($POST["search"], FILTER_SANITIZE_STRING));
        if(count($d) == 0 && count($f) == 0):
            die('<div class="text-danger">No drug or food dound!</div>');
        endif;
        foreach ($d as $row):
            $html .= "<tr><td>Drugs</td>";
            $html .= "<td>{$row["name"]}</td>";
            $html .= "<td>{$row["address"]}</td>";
            $html .= "<td>{$row["drugs_class"]}</td>";
            $html .= "<td>{$row["days"]} days</td>";
            $html .= "<td>" . ['Not approved', "Approved", "No approved"][$row["status"]] . "</td></tr>";
        endforeach;
        foreach ($f as $row):
            $html .= "<tr><td>Food</td>";
            $html .= "<td>{$row["name"]}</td>";
            $html .= "<td>{$row["manufacturer"]}</td>";
            $html .= "<td>{$row["ingredient"]}</td>";
            $html .= "<td>{$row["days"]} days</td>";
            $html .= "<td>" . ['Not approved', "Approved", "No approved"][$row["status"]] . "</td></tr>";
        endforeach;
        $html .= '</table>';
        echo $html;
    }

    function drugs($search) {
        return $this->db->select("select d.*,datediff(d.doe, CURRENT_TIMESTAMP) days, u.company "
                        . "from drugs d JOIN users u ON d.userId = u.id WHERE d.barcode LIKE '%{$search}%' OR "
                        . "d.name LIKE '%{$search}%' OR d.address LIKE '%{$search}%'");
    }

    function food($search) {
        return $this->db->select("select d.*,datediff(d.doe, CURRENT_TIMESTAMP) days, u.company from food d JOIN "
                        . "users u ON d.userId = u.id WHERE d.regNo LIKE '%{$search}%' OR "
                        . "d.name LIKE '%{$search}%' OR d.manufacturer LIKE '%{$search}%'");
    }

}
