<?php include './header.php';

include './config/list_jobs.php';
?>
<!-- Default Modals -->



<div class="main-content">


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Posted Jobs</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Jobs</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Listed Jobs</h4>
                            <div class="flex-shrink-0">

                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                                    <label class="form-check-label" for="cardtableCheck"></label>
                                                </div>
                                            </th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Timing</th>
                                            <th scope="col">Profile</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 0;

                                        $query_data = "SELECT * FROM `ss_jobs`";

                                        $query_run = $conn->query($query_data);
                                        $query_rows = mysqli_num_rows($query_run);

                                        if ($query_rows > 0) {
                                            while ($data = mysqli_fetch_assoc($query_run)) {
                                                $i++;
                                        ?>





                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#" class="fw-semibold"><?php echo substr($data['ss_job_title'], 0, 50) . ".."; ?></a></td>
                                                    <td><?php echo $data['ss_job_location'] ?></td>
                                                    <td><?php echo $data['ss_job_timing'] ?></td>

                                                    <td><?php echo $data['ss_job_profile'] ?></td>

                                                    <?php
                                                    if ($data['ss_job_status'] == 0) { ?>

                                                        <td><span class="badge bg-success">Active</span></td>

                                                    <?php   } else { ?>

                                                        <td><span class="badge bg-warning">Draft</span></td>

                                                    <?php    }

                                                    ?>
                                                    <td>




                                                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $i; ?>">Details</button>




                                                    </td>

                                                </tr>

                                                <div id="myModal<?php echo $i; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel"><?php echo $data['ss_job_title']; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo $data['ss_job_descreption'] ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary ">Save Changes</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                        <?php   }
                                        }





                                        ?>


                                    </tbody>
                                </table>
                            </div>
                            <!--end row-->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include './footer.php'; ?>