<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['logout'])) {

        function session_logout()
        {

            unset($_SESSION['user_active']);
            echo "
            <script>

window.location.href='../login';

            </script>
            ";
        }
    }
}
