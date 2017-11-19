<?php
require "loginheader.php";
require_once 'header.php';
$page_title = '管理頁面';

$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op']) : '';
$sn = isset($_REQUEST['sn']) ? (int) $_REQUEST['sn'] : 0;
switch ($op) {
    case 'insert':
        $sn = insert_article();
        header("location: index.php?sn={$sn}");
        exit;

    case "article_form":
        article_form($sn);
        break;

    case "delete_article":
        delete_article($sn);
        header("location: index.php");
        exit;

    case 'update':
        update_article($sn);
        header("location: index.php?sn={$sn}");
        exit;

    default:
        $op = "admin";
        break;
}

require_once 'footer.php';

/*************函數區**************/

//儲存文章
function insert_article()
{
    global $db;
    $title    = $db->real_escape_string($_POST['title']);
    $content  = $db->real_escape_string($_POST['content']);
    $username = $db->real_escape_string($_POST['username']);
    $sql      = "INSERT INTO `article` (`title`, `content`, `create_time`, `update_time`, `username`) VALUES ('{$title}', '{$content}', NOW(), NOW(), '{$username}')";
    $db->query($sql) or die($db->error);
    $sn = $db->insert_id;
    upload_pic($sn);
    return $sn;
}

//儲存文章
function delete_article($sn)
{
    global $db;
    $sql = "DELETE FROM `article` WHERE sn='{$sn}' AND username='{$_SESSION['username']}'";
    $db->query($sql) or die($db->error);
    if (file_exists("uploads/cover_{$sn}.jpg")) {
        unlink("uploads/cover_{$sn}.jpg");
        unlink("uploads/thumb_{$sn}.jpg");
    }
}

function article_form($sn)
{
    show_article($sn);
}

//儲存文章
function update_article($sn)
{
    global $db;
    $title    = $db->real_escape_string($_POST['title']);
    $content  = $db->real_escape_string($_POST['content']);
    $username = $db->real_escape_string($_POST['username']);
    $sql      = "UPDATE `article` SET `title`='{$title}', `content`='{$content}',`update_time`=NOW() WHERE sn='$sn' AND username='{$_SESSION['username']}'";
    $db->query($sql) or die($db->error);
    upload_pic($sn);
    return $sn;
}

function upload_pic($sn)
{
    if (isset($_FILES['pic']['name'])) {
        $ext = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
        if (!is_dir("uploads")) {
            mkdir("uploads");
        }
        require_once 'class.upload.php';
        $upload = new Upload($_FILES['pic']);
        if ($upload->uploaded) {
            // save uploaded image with a new name
            $upload->file_new_name_body = 'cover_' . $sn;
            $upload->image_resize       = true;
            $upload->image_convert      = 'jpg';
            $upload->image_x            = 1200;
            $upload->image_ratio_y      = true;
            $upload->Process('uploads/');
            if ($upload->processed) {
                $upload->file_new_name_body = 'thumb_' . $sn;
                $upload->image_resize       = true;
                $upload->image_convert      = 'jpg';
                $upload->image_x            = 400;
                $upload->image_ratio_y      = true;
                $upload->Process('uploads/');
            }
        }
    }
}
