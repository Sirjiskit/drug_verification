<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authenticate
 *
 * @author Jiskit
 */
class authenticate extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function search() {
        $this->model->getHTML(filter_input_array(INPUT_POST));
    }

}
