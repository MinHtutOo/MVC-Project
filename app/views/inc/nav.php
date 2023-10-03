<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white english" href="<?php echo URLROOT . 'home/mainHome' ?>">
                <img src="<?php echo URLROOT . "/assets/imgs/mylogo.jpg" ?>" alt="" width="30" height="30"  class="rounded">
                <span class="english ms-3">CODE.EDU</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav"> 
                
                <li class="nav-item">
                <a class="nav-link text-white english" href="#">Features</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link text-white english dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if(getUserSession() != false) : ?>
                            <?php echo getUserSession()->name; ?>
                        <?php else : ?>
                            Member
                        <?php endif; ?> 
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(getUserSession() != false) : ?>
                            <li><a class="dropdown-item" href="<?php echo URLROOT . 'user/logout' ?>">Logout</a></li>
                                <?php if(getUserSession()->is_admin == 1):?>
                                    <li><a class="dropdown-item" href="<?php echo URLROOT . 'admin/home' ?>">Admin Panel</a></li>
                                <?php elseif(getUserSession()->is_admin == 0) : ?>
                                    <li><a class="dropdown-item" href="<?php echo URLROOT . 'user/member/1' ?>">Member Panel</a></li>
                                <?php endif; ?>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="<?php echo URLROOT . 'user/login' ?>">Login</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT . 'user/register' ?>">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                <a class="nav-link text-white english dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Languages
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Java Script</a></li>
                    <li><a class="dropdown-item" href="#">Boostrap</a></li>
                    <li><a class="dropdown-item" href="#">PHP</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div>