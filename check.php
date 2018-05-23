<?php
require_once 'connect.php'; 
if (!isLoggedIn())
{
    header('Location: form-login.php');
}
?>