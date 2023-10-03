<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>


<div class="container-fluid">
    <div class="container my-2">

        <?php  flash('del_fail'); ?>
        
        <div class="row">
        
            <div class="col col-md-4">
            <h4 class="english text-primary mb-3">Click to see Posts</h4>
            
                <ul class="list-group">
                <?php foreach ($data["cats"] as $category): ?>
                        <li class="list-group-item rounded-0">
                                <a href="<?php echo URLROOT . "home/index/" . $category->id; ?>" class="english text-decoration-none"><?php echo $category->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
            <div class="col col-md-8">
                <!-- Post Card Start -->
                <h1 class="english text-primary text-center mb-2">Learn to Code.</h1>
                <h2 class="english text-primary text-center mb-2 big-heading">Build Project.</h2>
                <h2 class="english text-primary text-center mb-2">Earn Certifications.</h2>
                <img src="<?php echo URLROOT . "/assets/imgs/code.png" ?>" alt="coding" class="rounded mx-auto d-block">
                <a href="<?php echo URLROOT . 'user/register' ?>" class="english btn btn-primary btn-sm">Register to Create Post</a>

                <!-- Post Card End -->
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>