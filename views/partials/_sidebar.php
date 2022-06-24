<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>dashboard">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>My Task</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-drugs" aria-expanded="false" aria-controls="ui-drugs">
                <i class="mdi mdi-medical-bag menu-icon"></i>
                <span class="menu-title">Drugs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-drugs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo URL ?>drugs/add">Add drugs</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo URL ?>drugs/view">View drugs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-food" aria-expanded="false" aria-controls="ui-food">
                <i class="mdi mdi-food menu-icon"></i>
                <span class="menu-title">Food</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-food">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo URL ?>food/foodForm">Add food</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo URL ?>food/foodlist">View food</a></li>
                </ul>
            </div>
        </li>
        <?php if (Session::get("role") == 1):?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>users">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <?php endif;?>
    </ul>
</nav>