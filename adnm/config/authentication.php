
<?php
session_start();
include '../dbconfig.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add_user_submit'])) {




        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_number = $_POST['number'];
        $gender = $_POST['gender'];
        $password = $_POST['cnf_password'];
        $password = password_hash($password, CRYPT_BLOWFISH);
        $profile_picture = $_POST['profile'];


        if ($user_name != "" && $user_email != "" && $user_number != "" && $gender != "" && $password != "") {

            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_mobile,user_gender,user_pass,user_profile) VALUES (?, ?, ?,?,?,? )");
            $stmt->bind_param("ssisss", $user_name, $user_email, $user_number, $gender, $password, $profile_picture);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo "<script>alert('User Added Succesfully');
            window.location.href='../user_acces';
            </script>";
        } else {
            echo '
        <script>
        
        alert("field Missing Please MAke Sure Fill All Mandetory Fields");
        window.history.back(-1);
        </script>
        ';
        }
    }
}


// login //



if (isset($_POST['action'])) {


    $login_username = $_POST['username'];
    $login_password = $_POST['password'];


    if ($login_username != "") {

        if ($login_password != "") {
            $login = "SELECT * FROM `users`  WHERE `user_email`= '$login_username'";

            $loginrun = $conn->query($login);

            $userfind = mysqli_num_rows($loginrun);


            if ($userfind == 1) {

                $user_data = mysqli_fetch_assoc($loginrun);
                $hash_password = $user_data['user_pass'];



                if (password_verify($login_password, $hash_password)) {


                    $_SESSION['user_active'] = $user_data['user_id'];
                    $_SESSION['user_name'] = $user_data['user_name'];


                    // 0 for log in if password verfied 
                    echo "0";
                } else {

                    echo '
                  1
                    ';
                }
            } else {

                echo "3";
            }
        } else {


            echo "<script>
            alert('please Enter Password');
        window.history.back(-1);
        </script>";
        }
    } else {
        echo "<script>
        alert('please Enter Username');
    window.history.back(-1);
    </script>";
    }
}


?>