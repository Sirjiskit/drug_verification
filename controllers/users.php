<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author Jiskit
 */
class users extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    function index() {
        $this->view->menu = 'users';
        $this->view->title = 'Users';
        $this->view->users = $this->model->users();
        $this->view->customlibrary = array("users/js/index");
        $this->view->csslibrary = array('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min', 'vendors/datatables.net-buttons-bs4/buttons.bootstrap4.min',
            'vendors/datatables.net-responsive-bs4/responsive.bootstrap4.min');
        $this->view->jslibrary = array('vendors/datatables.net/jquery.dataTables.min', 'vendors/datatables.net-bs4/js/dataTables.bootstrap4.min',
            "vendors/datatables.net-buttons/dataTables.buttons.min", "vendors/datatables.net-buttons/buttons.html5.min", 'vendors/datatables.net-buttons/buttons.colVis.min', "vendors/datatables.net-buttons-bs4/buttons.bootstrap4.min",
            "vendors/datatables.net-responsive/dataTables.responsive.min", "vendors/datatables.net-responsive-bs4/responsive.bootstrap4.min");
        $this->view->render('inc/_header');
        $this->view->render('partials/_sidebar');
        $this->view->render('partials/_navbar');
        $this->view->render('users/index');
        $this->view->render('partials/_footer');
        $this->view->render('inc/_footer');
    }

    function update() {
        $this->model->update(filter_input_array(INPUT_POST));
    }

}
