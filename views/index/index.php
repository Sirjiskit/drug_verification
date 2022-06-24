<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Drug verification</h4>
                    <p class="card-description">
                        Authenticate that the drugs or food you are about to consume is/are not harmful and approved by NAFDAC
                    </p>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control fieldInputSearch" placeholder="Enter drug/food name or Manufacturer name" aria-label="Enter drug/food name or Manufacturer name">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary btn-authenticate" type="button">Authenticate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .hide{
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Drug verification Result</h4>
                    <div class="text-danger" id="div_label">Enter verification criteria and click authenticate</div>
                    <div class="hide w-100" id="div_loader">
                        <div class="d-flex justify-content-center" >
                            <div><i class="mdi mdi-spin mdi-36px mdi-settings"></i> Authenticating please wait....</div>
                        </div>
                    </div>
                    <div id="div_result" class="mt-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row end -->
</div>