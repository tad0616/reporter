<?php
/* Smarty version 3.1.30, created on 2017-11-11 06:03:44
  from "D:\tad1062\UniServerZ\www\reporter\templates\nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0692c09f3c20_11473358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd72947235bdfca421eae01c5e97aff972580e06f' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\nav.tpl',
      1 => 1510380145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0692c09f3c20_11473358 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="nav">
    <a href="index.php" class="nav-link text-white">首頁</a>
    <a href="index.php" class="nav-link text-white">編輯精選</a>
    <a href="index.php" class="nav-link text-white">街巷故事</a>
    <a href="index.php" class="nav-link text-white">市井觀點</a>
    <a href="index.php" class="nav-link text-white">私房知識塾</a>
    <?php if (isset($_SESSION['username'])) {?>
        <a href="admin.php?op=article_form" class="nav-link text-white">發布</a>
        <a href="logout.php" class="nav-link text-white">登出</a>
    <?php } else { ?> 
        <a href="signup.php" class="nav-link text-white">註冊</a>
        <a href="main_login.php" class="nav-link text-white">登入</a>
    <?php }?>
</nav><?php }
}
