<?php

class logout_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function process()
    {
    	//$this->saveLog("Logged Out");
    	Session::destroy();
		header("location: ".URL);
    }
}