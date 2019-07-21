<?php
session_start();
session_destroy();
// Logout
header('Location: Login Form.php');
?>