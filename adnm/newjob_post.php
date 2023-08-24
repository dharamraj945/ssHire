<?php
include './header.php';
include './config/add_job_config.php'
?>

<style>
    .form-group {

        padding-top: 20px;
    }
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Post New Job</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Post New Job</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Post New Job</h4>
                            <div class="flex-shrink-0">

                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Job Title</label>
                                                <input name="job_title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Job descreption</label>
                                                <textarea class="form-control" id="editor" name="job_jd"></textarea>
                                            </div>
                                            <!-- Default File Input Example -->
                                            <div>
                                                <label for="formFile" class="form-label">Job Ptofile Image</label>
                                                <input class="form-control" type="file" id="formFile" name="job_image">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Location</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="job_location" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Job Timing</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="job_timing">
                                                    <option value="-1">Select Timing</option>
                                                    <option value="1">Half Time</option>
                                                    <option value="2">Full Time</option>
                                                    <option value="3">Part Tine</option>

                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Job Profile</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="job_profile" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Salary</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="job_salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Experience
                                                </label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="job_exp" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="job_status">
                                                    <option value="0">Active</option>
                                                    <option value="1">Draft</option>


                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <button type="submit" name="add_job_post" class="btn btn-primary">Post Job</button>
                                    </div>


                                </form>

                            </div>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                if (isset($_POST['add_job_post'])) {
                                    if ($_POST['job_timing'] != -1) {
                                        add_new_job($_POST);
                                    } else { ?>

                                        <script>
                                            alert("Please Select Job Timing");
                                            window.history.back(-1);
                                        </script>

                            <?php  }
                                }
                            }

                            ?>
                            <!--end row-->
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->


</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php
include './footer.php';
?>{


}