<?php
    require_once APPROOT . "/views/inc/header.php";
    require_once APPROOT . "/views/inc/nav.php"; 
?>

<div class="container-fluid">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <div class="card bg-light p-5">
                
                <h1 class="english text-info text-center mb-3">Register to Post</h1>

                <form action="<?php echo URLROOT . 'user/register' ?>" method="post">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control english <?php echo !empty($data['name_err']) ? 'is_invalid' : ''; ?>" id="username" name="name">
                        <span class="text-danger"> <?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?> </span>
                    </div>

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

                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control english <?php echo !empty($data['confirm_password_err']) ? 'is_invalid' : ''; ?>" id="confirm_password" name="confirm_password">
                        <span class="text-danger"> <?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : ''; ?> </span>
                    </div>

                    <div class="row no-gutters">
                        <a href="<?php echo URLROOT . 'user/login' ?>" class="english text-decoration-none">Already Register, Please Login!</a>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-outline-secondary english">Cancel</button>
                            <button class="btn btn-primary english">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>