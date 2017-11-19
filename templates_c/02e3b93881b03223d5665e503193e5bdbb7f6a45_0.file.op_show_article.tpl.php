<?php
/* Smarty version 3.1.30, created on 2017-11-16 16:13:29
  from "C:\Users\tad\Dropbox\www\reporter\templates\op_show_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0db9295d8371_31576823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02e3b93881b03223d5665e503193e5bdbb7f6a45' => 
    array (
      0 => 'C:\\Users\\tad\\Dropbox\\www\\reporter\\templates\\op_show_article.tpl',
      1 => 1510848589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0db9295d8371_31576823 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h1 class="my-4"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</p>
    <?php if ($_SESSION['username'] == $_smarty_tpl->tpl_vars['article']->value['username']) {?>
    <div class="alert alert-secondary">
        <a href="admin.php?op=delete_article&sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
" class="btn btn-danger">刪除</a>
        <a href="admin.php?op=article_form&sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
" class="btn btn-warning">修改</a>
    </div>
    <?php }?>
</div><?php }
}
