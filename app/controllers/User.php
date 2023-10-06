<?php

class User extends Controller 
{
    private $userModel;
    private $postModel;
    private $categModel;
    
    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->postModel = $this->model("PostModel");
        $this->categModel = $this->model("CategoryModel");
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
            }else {
                if($this->userModel->getUserByEmail($data['email'])) {
                    $data['email_err'] = "Email is already exist!";
                }
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
                    flash('register_success',"Register success, please login!");
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

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $rowUser = $this->userModel->getUserByEmail($data['email']);
                if(!empty($rowUser)) {
                    $hash_pass = $rowUser->password;

                    if(password_verify($data['password'], $hash_pass)) {
                        // echo "success";
                        
                        if($_POST['email']  === "htuthtut@gmail.com"){
                            setUserSession($rowUser);
                            redirect(URLROOT . 'admin/home');
                        }else {
                            setUserSession($rowUser);
                            redirect(URLROOT . 'member/home/1');
                        }
                        
                        
                    } else {
                        // echo "fail";
                        flash("login_fail", "Login Fail!");
                        $this->view('user/login');
                    }
                } else {
                    $data['email_err'] = "Email Error!";
                }
            }else {
                $this->view("user/login", $data);
            }
        }else {
            $this->view("user/login");
        }
    }

    public function logout()
    {
        unsetUserSession();
        //$this->view('home/index/1');
        redirect(URLROOT);
    }

    public function member($para = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $data = $this->userModel->getAllUser();
        $data['cats'] = $this->categModel->getAllCategory();
        $data['posts'] = $this->postModel->getCat($para[0]);
        $this->view("user/member", $data);
    }

    public function mshow($para = [])
    {
        $post = $this->postModel->getPostById($para[0]);
        $this->view('user/mshow', ['post' => $post]);
    }
}

?>