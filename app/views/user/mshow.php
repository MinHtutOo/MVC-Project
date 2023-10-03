<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>


<div class="container-fluid">
    <div class="container my-2">

        <?php flash("pes"); ?>
        
        <div class="d-grid gap-2 d-md-block">
            <a href="<?php echo URLROOT . 'user/member/' . $data['post']->cat_id; ?>" class="btn btn-primary">Back</a>
        </div>
            <div class="col-md-12">
                <div class="card p-5">
                    <div class="card-header">
                        <h4 class="english">
                            <?php echo "<b>" . $data['post']->title . "</b>"; ?>
                        </h4>
                    </div>

                    <div class="card-body">
                        <img src="<?php echo URLROOT . 'assets/uploads/' . $data['post']->image; ?>" alt="" class="w-100">
                        <p>
                            <?php echo $data['post']->content; ?>
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>