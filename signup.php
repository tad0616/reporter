<?php
require_once 'header.php';
$page_title = '註冊';
$op         = '';

if (isset($_SESSION['username'])) {
    session_start();
    session_destroy();
}

require_once 'footer.php';
