<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }

    public function index($data = [])
    {
        $data = $this->userModel->getAllUser();
        $this->view("home/index", $data);
    }
}

?>