<?php
session_start();

if (!isset($_SESSION['user_active'])) { ?>

    <script>
        window.location.href = "../login.php";
    </script>
<?php }
