<?php
include "comm.php";
session_destroy();
unset($_SESSION);
echo "<script>location.href='login.php';</script>";
?>
