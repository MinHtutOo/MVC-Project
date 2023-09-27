<?php

class User extends Controller 
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $data = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "confirm_password" => $_POST['confirm_password'],
                "name_err" => '',
                "email_err" => '',
                "password_err" => '',
                "confirm_password_err" => ''
            ];

            if(empty($data['name'])) {
                $data['name_err'] = "User name must be Supply!";
            }

            if(empty($data['email'])) {
                $data['email_err'] = "Email must be Supply!";
            }

            if(empty($data['password'])) {
                $data['password_err'] = "Password must be Supply!";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Password must be Supply!";
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Password do not match!";
                }
            }

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                if($this->userModel->register($data['name'], $data['email'], $data['password'])) {
                    $this->view("user/login");
                }else {
                    $this->view("user/register");
                }
            }else {
                $this->view("user/register", $data);
            }

        }else {
            $this->view("user/register");
        }
        
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $data = [
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "email_err" => '',
                "password_err" => '',
            ];
        
            if(empty($data['email'])) {
                $data['email_err'] = "Email must be Supply!";
            }

            if(empty($data['password'])) {
                $data['password_err'] = "Password must be Supply!";
            }

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                echo "Good to go";
            }else {
                $this->view("user/login", $data);
            }
        }else {
            $this->view("user/login");
        }
    }
}

?>