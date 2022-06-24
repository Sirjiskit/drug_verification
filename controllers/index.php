<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Jiskit
 */
Session::init();

class index extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->menu = 'Landing page';
        $this->view->title = 'Home';
        $this->view->customlibrary = array("index/js/index");
        $this->view->render('inc/_header');
        $this->view->render('partials/_navbar_landing');
        $this->view->render('index/index');
        $this->view->render('partials/_footer');
        $this->view->render('inc/_footer');
    }

}
