<?php

class Post extends Controller
{
    private $postModel;
    private $categModel;
    public function __construct()
    {
        $this->postModel = $this->model("PostModel");
        $this->categModel = $this->model("CategoryModel");
    }

    // public function index()
    // {
    //     echo "I am index method of " . __CLASS__ . " class<br>";
    // }

    // public function show($data = []) 
    // {
    //     echo "I am show method of " . __CLASS__ . " class<br>";
    //     echo "<pre>" . print_r($data,true) . "</pre>";
    // }

    public function home($para = [])
    {
        // print_r($para);
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        // print_r($this->postModel);

        // $data = $this->categModel->getAllCategory();
        // print_r($this->postModel->getCat($para[0]));
        $data['cats'] = $this->categModel->getAllCategory();
        $data['posts'] = $this->postModel->getCat($para[0]);
        // print_r($data['posts']);
        $this->view("admin/post/home", $data);
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
                        redirect(URLROOT . "post/home/1");
                    } else {
                        $this->view("admin/post/create", $data);
                    }
                }else {
                    flash("fne", "Please Insert A File");
                    $this->view("admin/post/create", $data);
                }
            } else {
                $this->view("admin/post/create", $data);
            }
        }else {
            $this->view("admin/post/create", $data);
        }
    }

    public function show($para = [])
    {
        $post = $this->postModel->getPostById($para[0]);
        $this->view('admin/post/show', ['post' => $post]);
    }

    public function edit($para = [])
    {
        
        if($_SERVER['REQUEST_METHOD'] == "POST") {
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
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $root = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];
            $filename = $_FILES['file']['name'];

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
                }else {
                    $filename = $_POST['old_file'];
                    
                    //$this->view("admin/post/create", $data);
                }
                $curId = getCurrentId();
                deleteCurrentId();
                if($this->postModel->updateData($curId, $_POST['cat_id'], $data['title'], $data['desc'], $filename, $data['content'])){
                    flash("pes", "Post Edit Success.");
                    redirect(URLROOT . 'post/show/' . $curId);
                }
                else{
                    flash("pef", "Post Edit Fail!");
                    redirect(URLROOT . 'post/edit/' . $curId);
                }
            } else {
                $this->view("admin/post/create", $data);
            }
        }else{
            setCurrentId($para[0]);
            $data['cats'] = $this->categModel->getAllCategory();
            $data['post'] = $this->postModel->getPostById($para[0]);
            $this->view('admin/post/edit', $data);
        }
    }

    public function delete($para = [])
    {
        
        $data = [
            'cats' => '',
            'posts' => ''
        ];
        $dta = $this->postModel->getPostById($para[0]);
        if($this->postModel->deletePost($para[0])) {
            redirect(URLROOT . 'post/home/' . $dta->cat_id);
        }else {
            flash("del_fail", "Delete Fail!");
            $data['cats'] = $this->categModel->getAllCategory();
            $data['posts'] = $this->postModel->getCat($para[0]);
            $this->view("admin/post/home", $data);
        }

        
    }
}

?>