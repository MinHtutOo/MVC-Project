<?php

class Admin extends Controller
{
    private $postModel;
    private $categModel;

    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->categModel = $this->model("CategoryModel");
    }

    public function home()
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $data['cats'] = $this->categModel->getAllCategory();
        $data['posts'] = $this->postModel->getAllPost();
        // print_r($data['posts']);
        
        $this->view('admin/home', $data);
    }
}

?>