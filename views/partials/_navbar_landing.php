<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:./partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <div class="navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="<?php echo URL ?>"><img src="<?php echo ASSET_DIR ?>images/logo.png" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="<?php echo URL ?>"><img src="<?php echo ASSET_DIR ?>images/logo-mini.png" alt="logo"/></a>
            </div>
            <?php if (Session::get("loggedIn")): ?>
                <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, <?php echo Session::get('name'); ?></h4>
            <?php endif; ?>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <h4 class="mb-0 font-weight-bold d-none d-xl-block">
                         <canvas id="canvas" width="65" height="65" style="background:transparent"> 
                    </h4>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">

                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <?php if (Session::get("loggedIn")): ?>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?php echo ASSET_DIR ?>images/faces/face5.jpg" alt="profile"/>
                            <span class="nav-profile-name"><?php echo Session::get('name'); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?php echo URL ?>dashboard">
                                <i class="mdi mdi-account text-primary"></i>
                                My account
                            </a>
                            <a class="dropdown-item" href="<?php echo URL ?>logout">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo URL ?>account/login" role="button" class="icon-link btn btn-inverse-primary">
                            <i class="mdi mdi-login"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URL ?>account/register" class="nav-link icon-link">
                            <i class="mdi mdi-account-plus"></i> Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- partial -->
    <div class="main-panel">