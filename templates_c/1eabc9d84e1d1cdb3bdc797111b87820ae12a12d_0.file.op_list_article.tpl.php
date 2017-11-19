<?php
/* Smarty version 3.1.30, created on 2017-11-04 07:47:57
  from "D:\tad1062\UniServerZ\www\reporter\templates\op_list_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fd70ad6d2ca4_31524665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eabc9d84e1d1cdb3bdc797111b87820ae12a12d' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\op_list_article.tpl',
      1 => 1509779004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fd70ad6d2ca4_31524665 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
        <h3><a href="index.php?sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
    <?php
}
} else {
?>

        <h1>尚無內容</h1>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div><?php }
}
