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



    public function home($para = [])
    {
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $data = $this->userModel->getAllUser();
        $data['cats'] = $this->categModel->getAllCategory();
        $data['posts'] = $this->postModel->getCat($para[0]);
        $this->view("member/home", $data);
    }

    public function create()
    {
        $data = [
            'cats' => '',
            'title' => '',
            'desc' => '',
            'file' => '',
            'content' => '',
            'title_err' => '',
            'desc_err' => '',
            'file_err' => '',
            'content_err' => ''
        ];
        $data['cats'] = $this->categModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $root = dirname(dirname(dirname(__FILE__)));
            // echo $root;
            $files = $_FILES['file'];
            // print_r($files);

            $data['title'] = $_POST['title'];
            $data['desc'] = $_POST['desc'];
            $data['content'] = $_POST['content'];

            if (empty($data['title'])) {
                $data['title_err'] = "Please enter title!";
            }
            if (empty($data['desc'])) {
                $data['desc_err'] = "Please write description!";
            }
            if (empty($data['content'])) {
                $data['content_err'] = "Please write content!";
            }

            if(empty($data['title_err']) && empty($data['desc_err']) && empty($data['content_err'])) {
                if(!empty($files['name'])) {
                    move_uploaded_file($files['tmp_name'], $root . '/public/assets/uploads/' . $files['name']);
                    if ($this->postModel->insertPost($_POST['cat_id'], $data['title'], $data['desc'], $files['name'], $data['content'])) {
                        flash("pis", "Post Insert Successfully.");
                        redirect(URLROOT . "member/home/1");
                    } else {
                        $this->view("member/create", $data);
                    }
                }else {
                    flash("fne", "Please Insert A File");
                    $this->view("member/create", $data);
                }
            } else {
                $this->view("member/create", $data);
            }
        }else {
            $this->view("member/create", $data);
        }
    }

    public function show($para = [])
    {
        $post = $this->postModel->getPostById($para[0]);
        $this->view('member/show', ['post' => $post]);
    }
}

?>