<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>


<div class="container-fluid">
    <div class="container my-2">

        <?php  flash('del_fail'); ?>
        
        <div class="row">
            <div class="col col-md-4">
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
                    <?php foreach($data['posts'] as $post) : ?>
                        <div class="card rounded-0 mb-3">
                            <div class="card-header bg-dark text-white rounded-0">
                                <h6 class="english"><?php echo $post->title; ?></h6>
                            </div>
                            <div class="card-body p-2">
                                <p><?php echo $post->description; ?></p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="<?php echo URLROOT . 'home/show/' . $post->id; ?>" class="english btn btn-success text-white btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <!-- Post Card End -->
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>