<?php
require_once 'header.php';
$page_title = '首頁';

// die(var_dump($_SESSION));

$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op']) : '';
$sn = isset($_REQUEST['sn']) ? (int) $_REQUEST['sn'] : 0;
switch ($op) {

    default:
        if ($sn) {
            show_article($sn);
            $op = 'show_article';
        } else {
            list_article();
            $op = 'list_article';
        }
        break;
}

require_once 'footer.php';

/*************函數區**************/

//讀出所有文章
function list_article()
{
    global $db, $smarty;
    include_once "PageBar.php";

    $sql     = "SELECT * FROM `article` ORDER BY `update_time` DESC";
    $PageBar = getPageBar($sql, 6, 10);
    $bar     = $PageBar['bar'];
    $sql     = $PageBar['sql'];
    $total   = $PageBar['total'];
    $result  = $db->query($sql) or die($db->error);
    $all     = [];
    $i       = 0;
    while ($data = $result->fetch_assoc()) {
        $all[$i]            = $data;
        $all[$i]['summary'] = mb_substr(strip_tags($data['content']), 0, 60);
        $i++;
    }
    // die(var_export($all));
    $smarty->assign('all', $all);
    $smarty->assign('bar', $bar);
    $smarty->assign('total', $total);
}
