<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                
                <h1 class="english text-info text-center mb-3">Login to Post</h1>

                <form action="<?php echo URLROOT . 'user/login'?>" method="post">

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control english <?php echo !empty($data['email_err']) ? 'is_invalid' : ''; ?>" id="email" name="email">
                        <span class="text-danger"> <?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?> </span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control english <?php echo !empty($data['password_err']) ? 'is_invalid' : ''; ?>" id="password" name="password">
                        <span class="text-danger"> <?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?> </span>
                    </div>

                    <div class="row no-gutters">
                        <a href="<?php echo URLROOT . 'user/register' ?>" class="english text-decoration-none">Do not have an account, Please Register!</a>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-outline-secondary english">Cancel</button>
                            <button class="btn btn-primary english">Login</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>