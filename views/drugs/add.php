<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card h-100">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Drugs form</h4>
                    <p class="card-description">
                        Add drugs for verifications <br/><small>NB: Note that you cannot edit or delete after adding, Make sure that you have review you entries before submitting.</small>
                    </p>
                    <form class="form-drugs row" action="<?php echo URL ?>drugs/save">
                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputBarcode">Drug Barcode</label>
                            <input type="text" class="form-control" required="" id="drugInputBarcode" name="barcode" placeholder="Drug Barcode">
                        </div>
                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputType">Drug Type</label>
                            <input type="text" class="form-control" required="" id="drugInputType" name="type" placeholder="Drug Type">
                        </div>
                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="drugInputName">Drug name</label>
                            <input type="text" class="form-control" required="" id="drugInputName" name="name" placeholder="Drug name">
                        </div>
                        <div class="form-group col-12">
                            <label for="drugInputProductClass">Drugs Class(es) (Please check the relevant box(es) </label>
                            <div class="w-100 d-flex flex-row">
                                <div class="form-check mr-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" required="" name="drugs_class[]" value="Human Drugs" class="form-check-input">
                                        Human Drugs
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" required="" name="drugs_class[]" value="Human Biologics" class="form-check-input">
                                        Human Biologics
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" required="" name="drugs_class[]" value="Cosmetics" class="form-check-input">
                                        Cosmetics
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" required="" name="drugs_class[]" value="Medical Devices" class="form-check-input">
                                        Medical Devices
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" required="" name="drugs_class[]" value="Herbal Products" class="form-check-input">
                                        Herbal Products
                                    </label>
                                </div>
                            </div>
                            <div id="checkError"></div>
                        </div>

                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputdom">Manufacture Date</label>
                            <input type="date" class="form-control" required="" id="drugInputdom" name="dom" placeholder="Manufacture Date">
                        </div>
                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputdoe">Expiring Date</label>
                            <input type="date" class="form-control" required="" id="drugInputdoe" name="doe" placeholder="Expiring Date">
                        </div>
                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="drugInputManufacture">Address of Site of Manufacture</label>
                            <input type="text" class="form-control" required="" name="address" id="drugInputManufacture" placeholder="Address of Site of Manufacture">
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input type="checkbox" required="" name="confirm" class="form-check-input">
                                    I am sure that my entries are accurate and I understand that it cannot be changed after submittion
                                </label>
                            </div>
                            <div id="confirmError"></div>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>