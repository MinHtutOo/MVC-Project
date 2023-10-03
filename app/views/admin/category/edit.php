<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>

<div class="container-fluid p-0">
    <div class="d-flex" >

        <div class="col-md-3">
            <!-- sidebar start -->
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                </div>

                <div class="card-block">
                    <!-- Menu Start -->
                    <?php foreach ($data['cats'] as $category): ?>
                    <ul class="list-group">
                        <li class="list-group-item rounded-0 d-flex justify-content-between">
                            <span>
                                <a href="#" class="english text-decoration-none"><?php echo $category->name; ?></a>
                            </span>

                            <span>
                                <a href="<?php echo URLROOT . 'category/edit/' . $category->id ?>" class="english"><i class="fa fa-edit text-warning"></i></a>
                                <a href="<?php echo URLROOT . 'category/delete/' . $category->id ?>" class="english"><i class="fa fa-trash text-danger"></i></a>
                            </span>
                            
                        </li>
                    <?php endforeach; ?>
                        
                    </ul>
                    <!-- Menu End -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
        

        <div class="col-md-5 offset-md-2 my-5">
        <?php flash('register_success'); ?>
                <?php flash('login_fail'); ?>
                <h1 class="english text-info text-center mb-3">Edit Category</h1>
<?php // print_r($data); ?>
                <form action="<?php echo URLROOT . 'category/edit'?>" method="post" class="table-border p-5">

                    <div class="form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control english <?php echo !empty($data['name_err']) ? 'is_invalid' : ''; ?>" 
                        id="name" name="name" value="<?php echo $data['currentCat']->name ?>">
                        <span class="text-danger"> <?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?> </span>
                    </div>

                    <div class="row no-gutters py-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-outline-secondary english">Cancel</button>
                            <button class="btn btn-primary english">Update</button>
                        </div>
                    </div>

                </form>
        </div>
    </div>
</div>
    

<?php require_once APPROOT . "/views/inc/footer.php"; ?>