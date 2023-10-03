<?php

class Controller 
{
    public function __construct()
    {
        // $this->userModel = $this->model('UserModel');
    }

    public function view($view, $data=[])
    {
        if(file_exists("../app/views/" . $view . ".php")){
            require_once "../app/views/" . $view . ".php";
        }
    }

    public function model($model)
    {
        // print_r($model);
        if(file_exists("../app/models/" . $model . ".php")) {
                // print_r("../app/models/" . $model . ".php");
            require_once "../app/models/" . $model . ".php";
            return new $model;
        }
    }
}

?>