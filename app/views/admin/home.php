<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>

<h1 class="english text-info text-center mb-3">Admin Page</h1>

<div class="container-fluid p-0">
    <div class="d-flex" >

    <?php require_once APPROOT . "/views/inc/sidebar.php"; ?>

        <div class="col col-md-8 ms-5">
            <!-- Post Card Start -->
            <?php foreach($data['posts'] as $post) : ?>
                        <div class="card rounded-0 mb-3">
                            <div class="card-header bg-dark text-white rounded-0">
                                <h6 class="english"><?php echo $post->title; ?></h6>
                            </div>
                            <div class="card-body p-2">
                                <p><?php echo $post->description; ?></p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="<?php echo URLROOT . 'post/show/' . $post->id; ?>" class="english btn btn-info text-white btn-sm">Detail</a>
                                <a href="<?php echo URLROOT . 'post/edit/' . $post->id; ?>" class="english btn btn-warning text-white btn-sm">Edit</a>
                                <a href="<?php echo URLROOT . 'post/delete/' . $post->id; ?>" class="english btn btn-danger text-white btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <!-- Post Card End -->
        </div>
    </div>
</div>
    

<?php require_once APPROOT . "/views/inc/footer.php"; ?>