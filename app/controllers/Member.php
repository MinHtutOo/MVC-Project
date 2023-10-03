<?php

class Member extends Controller 
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
                            redirect(URLROOT . 'user/member/1');
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