<?php

function  list_post($tablenme)
{
    include './dbconfig.php';
    $database = $tablenme;
    $query_data = "SELECT * FROM `$database`";

    $query_run = $conn->query($query_data);
    $query_data = mysqli_num_rows($query_run);
    $data_list = mysqli_fetch_assoc($query_run);
    print_r($data_list);

    if ($query_data > 0) {

        $data_list = mysqli_fetch_assoc($query_run);
        print_r($data_list);

        return array($data_list, $query_data);
    } else {
        return "No Data Found";
    }
}
