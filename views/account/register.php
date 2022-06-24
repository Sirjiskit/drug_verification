<style>
    #tc-error{
        font-size: 12px !important;
    }
    input.error{
        border-color: red !important;
        color: red !important;
    }
    .form-control-icon-right{
        position: absolute;
        right: 10px;
        top: 15%;
    }
    .form-control-icon-right i{
        font-size: 35px;
    }
</style>
<div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <div class="brand-logo">
                        <img src="<?php echo ASSET_DIR ?>images/logo.png" alt="logo">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                    <form class="pt-3" action="<?php echo URL ?>account/create" id="accountRegisterForm">
                        <div class="form-group">
                            <label for="accountInputname">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" required="" class="form-control form-control-lg border-left-0" style="min-width: 80%" name="name" id="accountInputname" placeholder="Your name">                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountInputCompany">Company Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-layers text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" required="" class="form-control form-control-lg border-left-0" style="min-width: 80%" name="company" id="accountInputCompany" placeholder="Company name">                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountInputEmail">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-email-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg border-left-0" name="email" style="min-width: 80%" id="accountInputEmail" placeholder="Email">
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
                                <input type="password" class="form-control form-control-lg border-left-0" required="" style="min-width: 80%" name="password" id="accountInputPassword" placeholder="Password">   
                                <div class="form-control-icon-right">
                                    <a href="javascript:void(0)" class="text-primary" id="showPassword">
                                        <i class="mdi mdi-eye-off"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted" id="checkError">
                                    <input type="checkbox" class="form-check-input" id="accountInputTC" name="tc">
                                    I agree to all Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? <a href="<?php echo URL ?>/account/login" class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021  All rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->