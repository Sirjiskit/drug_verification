<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card h-100">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 d-flex justify-content-between">
                        <h4 class="card-title">Drugs</h4>
                        <div id="table_wrapper"></div>
                    </div>

                    <p class="card-description">
                        List of registered drugs
                    </p>
                    <div class="w-100" style="width: 100%;">
                        <style>
                            table.dtr-details tr:first-child{
                                display: none;
                            }
                            table.dtr-details tr:last-child{
                                display: none;
                            }
                        </style>
                        <table class="table table-striped table-bordered table-hover dt-responsive nowrap" id="tb-drugs">
                            <thead>
                                <tr style="white-space: nowrap">
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Barcode</th>
                                    <th>Drug Type</th>
                                    <th>Drug Name</th>
                                    <th>Drug class</th>
                                    <th>Man. Date</th>
                                    <th>Exp. Date</th>
                                    <th>Man. address</th>
                                    <th>Status/Cond.</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($this->drugs as $row):
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo htmlentities($row["company"]); ?></td>
                                        <td><?php echo htmlentities($row["barcode"]); ?></td>
                                        <td><?php echo htmlentities($row["type"]); ?></td>
                                        <td><?php echo htmlentities($row["name"]); ?></td>
                                        <td><?php echo htmlentities($row["drugs_class"]); ?></td>
                                        <td><?php echo htmlentities($row["dom"]); ?></td>
                                        <td><?php echo htmlentities($row["doe"]); ?></td>
                                        <td><?php echo htmlentities($row["address"]); ?></td>
                                        <th>
                                            <?php if ((int) $row["status"] == 0): ?>
                                                <span class="badge badge-warning badge-status">Pending</span>
                                            <?php endif; ?>
                                            <?php if ((int) $row["status"] == 1): ?>
                                                <span class="badge badge-success badge-status">Approved</span>
                                            <?php endif; ?>
                                            <?php if ((int) $row["status"] == 2): ?>
                                                <span class="badge badge-danger badge-status">Rejected</span>
                                            <?php endif; ?>
                                            /
                                            <?php if ((int) $row["days"] > 25 && strtotime($row["doe"]) > time()): ?>
                                                <span class="text-success">Active</span>
                                            <?php endif; ?>
                                            <?php if (((int) $row["days"] == 0 || (int) $row["days"] <= 25) && strtotime($row["doe"]) >= time()): ?>
                                                <span class="text-warning"><?php echo htmlentities($row["days"]) ?> day(s) remaind</span>
                                            <?php endif; ?>
                                            <?php if (strtotime($row["doe"]) < time()): ?>
                                                <span class="text-danger">Expired</span>
                                            <?php endif; ?>

                                        </th>
                                        <td class="p-0 pl-2">
                                            <?php
                                            if (Session::get("role") == 1):
                                                ?>
                                                <div class="dropdown">
                                                    <button class="btn btn-transparent btn-xs p-0 m-0" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                                        <button class="dropdown-item btn-action" data-action="1" data-id="<?php echo htmlentities($row["id"]); ?>" data-old="<?php echo htmlentities($row["status"]); ?>">Approve</button>
                                                        <button class="dropdown-item btn-action" data-action="2" data-id="<?php echo htmlentities($row["id"]); ?>" data-old="<?php echo htmlentities($row["status"]); ?>">Reject</button>
                                                    </div>
                                                </div>
                                                <?php
                                            endif;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>