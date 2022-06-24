<div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <div class="brand-logo">
                        <img src="<?php echo ASSET_DIR ?>images/logo.png" alt="logo">
                    </div>
                    <h4>Welcome back!</h4>
                    <h6 class="font-weight-light">Happy to see you again!</h6>
                    <form class="pt-3" action="<?php echo URL ?>account/authentication" method="post">
                        <?php
                        if (isset($_GET["hasError"]) && (int)$_GET["hasError"] == 404):
                            ?>
                            <div class="alert alert-danger">Invalid username or password</div>
                            <?php
                        endif;
                        ?>
                             <?php
                        if (isset($_GET["hasError"]) && (int)$_GET["hasError"] == 403):
                            ?>
                            <div class="alert alert-danger">Sorry your account is not approved please contact system administrator</div>
                            <?php
                        endif;
                        ?>
                        <div class="form-group">
                            <label for="accountInputEmail">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg border-left-0" required="" id="accountInputEmail" name="email" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountInputPassword">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control form-control-lg border-left-0" required="" id="accountInputPassword" name="password" placeholder="Password">                        
                            </div>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Keep me signed in
                                </label>
                            </div>
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >LOGIN</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="<?php echo URL ?>account/register" class="text-primary">Create</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
                <p class="text-dark font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021  All rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->