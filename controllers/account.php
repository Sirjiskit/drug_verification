<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Jiskit
 */
class account extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->view->menu = 'login';
        $this->view->title = 'Login page';
        $this->view->render('inc/_header');
        $this->view->render('account/login');
        $this->view->render('inc/_footer');
    }

    function register() {
        $this->view->menu = 'Register';
        $this->view->title = 'Register page';
        $this->view->customlibrary = array("account/js/register");
        $this->view->jslibrary = array('vendors/jquery/dist/jquery.validate.min', 'vendors/jquery/dist/additional-methods.min');
        $this->view->render('inc/_header');
        $this->view->render('account/register');
        $this->view->render('inc/_footer');
    }

    function create() {
        $this->model->register(filter_input_array(INPUT_POST));
    }

    function authentication() {
        $this->model->run();
    }

}
