<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card h-100">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Food form</h4>
                    <p class="card-description">
                        Add food for verifications <br/><small>NB: Note that you cannot edit or delete after adding, Make sure that you have review you entries before submitting.</small>
                    </p>
                    <form class="form-drugs row" action="<?php echo URL ?>food/save">
                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputRegNo">NAFDAC Number</label>
                            <input type="text" class="form-control" required="" id="drugInputRegNo" name="regNo" placeholder="NAFDAC Number">
                        </div>
                        <div class="form-group col-12 col-sm-3 col-md-3 col-lg-3">
                            <label for="drugInputName">Prod. name</label>
                            <input type="text" class="form-control" required="" id="drugInputName" name="name" placeholder="Prod. name">
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
                            <label for="drugInputManufacture">Manufacturer</label>
                            <input type="text" class="form-control" required="" name="manufacturer" id="drugInputManufacture" placeholder="Food manufacturer">
                        </div>
                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="drugInputIngredient">Active Ingredients</label>
                            <input type="text" class="form-control" required="" name="ingredient" id="drugInputIngredient" placeholder="Active Ingredients">
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