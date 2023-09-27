<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white english" href="#">
                <img src="<?php echo URLROOT . "/assets/imgs/logo.png" ?>" alt="" width="30" height="30" class="rounded">
                <span class="english ms-3">PKT</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link text-white english" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white english" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white english" href="<?php echo URLROOT . 'user/login' ?>">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white english" href="<?php echo URLROOT . 'user/register' ?>">Register</a>
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