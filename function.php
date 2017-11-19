<?php
//連線到資料庫
function link_db()
{
    $db = new mysqli('localhost', 'root', 'happy', 'reporter');
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");
    return $db;
}

//讀出單一文章
function show_article($sn)
{
    global $db, $smarty;

    require_once 'HTMLPurifier/HTMLPurifier.auto.php';
    $config   = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);

    $sql             = "SELECT * FROM `article` WHERE `sn`='$sn'";
    $result          = $db->query($sql) or die($db->error);
    $data            = $result->fetch_assoc();
    $data['content'] = $purifier->purify($data['content']);
    $smarty->assign('article', $data);
}
