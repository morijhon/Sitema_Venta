<?php
session_start();
session_unset();
session_destroy();
header("Location: e-comerce/login.html");
exit();
?>