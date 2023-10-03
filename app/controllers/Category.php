<?php

class Category extends Controller
{
    private $categModel;
    public function __construct()
    {
        $this->categModel = $this->model('CategoryModel');
    }

    public function create($data = [])
    {
        $data = [
            "name" => "",
            "name_err" => "",
            "cats" => $this->categModel->getAllCategory()
        ];

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            $data['name'] = $_POST['name'];

            if(empty($data['name'])) {
                $data['name_err'] = "Category name must be supply!";
                $this->view('admin/category/home', $data);
            }else{
                if($this->categModel->getCategoryByName($data['name'])) {
                    $data['name_err'] = "Category name already in used!";
                    $this->view('admin/category/home', $data);  
                } else {
                    if($this->categModel->insertNewCategory($data['name'])) {
                        flash("cat_create_success" , "Category Created Successfully");
                        $data['cats'] = $this->categModel->getAllCategory();
                        $this->view('admin/category/home', $data); 
                    }else {
                        flash("cat_create_fail" , "Category Create Failed!");
                        $this->view('admin/category/home', $data);
                    }
                }
            }
        }else {
            $this->view('admin/category/home', $data);
        }
                
    }

    public function edit($data = [])
    {
        $dta = [
            "name" => "",
            "name_err" => "",
            "cats" => "",
            "currentCat" => ""
        ];
        $dta['cats'] = $this->categModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $dta['name'] = $_POST['name'];
            if(!empty($dta['name'])) {
                if($this->categModel->updateCategory(getCurrentId(), $dta['name'])) {
                    deleteCurrentId();
                    redirect(URLROOT . 'category/create');
                } else {
                    $dta['currentCat'] = $this->categModel->getCategoryById(getCurrentId());
                    deleteCurrentId();
                    flash("cat_edit_error", "Category update fail!");
                    redirect(URLROOT . 'admin/category/edit', $dta);
                }
            }else {
                $dta['name_err'] = "Category name must supply!";
                $dta['currentCat'] = $this->categModel->getCategoryById(getCurrentId());
                deleteCurrentId();
                $this->view("admin/category/edit", $dta);
            }
        } else {
            setCurrentId($data[0]);
            $dta['currentCat'] = $this->categModel->getCategoryById($data[0]);
            $this->view("admin/category/edit", $dta);
        }
    }

    public function delete($data = [])
    {
        if($this->categModel->deleteCategory($data[0])) {
            redirect(URLROOT . 'category/create');
        }else {
            redirect(URLROOT . 'category/create');
        }
    }
}

?>