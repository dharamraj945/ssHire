<?php
function add_new_job($array_post)

{
    include './dbconfig.php';

    print_r($array_post);

    $job_title = $array_post['job_title'];
    $job_jd = $array_post['job_jd'];
    $job_location = $array_post['job_location'];
    $job_timing = $array_post['job_timing'];
    $job_profile = $array_post['job_profile'];
    $job_salary = $array_post['job_salary'];
    $job_exp = $array_post['job_exp'];
    $job_status = $array_post['job_status'];
    $job_profie_img = $_FILES['job_image']['name'];





    $sql = "INSERT INTO `ss_jobs`( `ss_job_title`, `ss_job_image`, `ss_job_descreption`, `ss_job_location`, `ss_job_timing`, `ss_job_profile`, `ss_job_salary`, `ss_job_exp`,`ss_job_status`) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $job_title, $job_profie_img, $job_jd, $job_location, $job_timing, $job_profile, $job_salary, $job_exp, $job_status);
    $result = $stmt->execute();

    if ($result) {

        echo "<script>
        alert('New job Added ');
        window.location.href='newjob_post';
        
        </script>";
    }
}
