<?php
require_once 'header.php';
require 'includes/functions.php';
include 'config.php';
$page_title = '啟用帳戶';
$op         = "";

//Pulls variables from url. Can pass 1 (verified) or 0 (unverified/blocked) into url
$uid    = $_GET['uid'];
$verify = $_GET['v'];

$e       = new SelectEmail;
$eresult = $e->emailPull($uid);

$email    = $eresult['email'];
$username = $eresult['username'];

$v = new Verify;

if (isset($uid) && !empty(str_replace(' ', '', $uid)) && isset($verify) && !empty(str_replace(' ', '', $verify))) {

    //Updates the verify column on user
    $vresponse = $v->verifyUser($uid, $verify);

    //Success
    if ($vresponse == 'true') {
        $smarty->assign('msg', $activemsg);

        //Send verification email
        $m = new MailSender;
        $m->sendMail($email, $username, $uid, 'Active');
    } else {
        //Echoes error from MySQL
        $smarty->assign('msg', $vresponse);
    }
} else {
    //Validation error from empty form variables

    $smarty->assign('msg', 'An error occurred... click <a href="index.php">here</a> to go back.');
}

require_once 'footer.php';
