<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author Jiskit
 */
class dashboard extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        $this->view->menu = 'dashboard';
        $this->view->title = 'Dashboard';
        $this->view->render('inc/_header');
        $this->view->render('partials/_sidebar');
        $this->view->render('partials/_navbar');
        $this->view->render('dashboard/index');
        $this->view->render('partials/_footer');
        $this->view->render('inc/_footer');
    }

}
