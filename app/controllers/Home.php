<?php

class Home extends Controller
{
    private $userModel;
    private $postModel;
    private $categModel;

    public function __construct() 
    {
        $this->userModel = $this->model("UserModel");
        $this->postModel = $this->model("PostModel");
        $this->categModel = $this->model("CategoryModel");
    }

    public function mainHome()
    {
        $data = [
            'cats' => ''
        ];
        $data = $this->userModel->getAllUser();
        $data['cats'] = $this->categModel->getAllCategory();
        $this->view("/home/mainHome", $data);
    }

    public function index($para = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $data = $this->userModel->getAllUser();
        $data['cats'] = $this->categModel->getAllCategory();
        $data['posts'] = $this->postModel->getCat($para[0]);

        // print_r($data['posts']);
        $this->view("/home/index", $data);
    }

    public function show($para = [])
    {
        $post = $this->postModel->getPostById($para[0]);
        $this->view('home/show', ['post' => $post]);
    }
}

?>