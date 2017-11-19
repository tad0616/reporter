<?php
/* Smarty version 3.1.30, created on 2017-11-04 07:00:00
  from "D:\tad1062\UniServerZ\www\reporter\templates\list_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fd6570314896_94820203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13fd36e1272de4040ce8351572b61d21d34dbeae' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\list_article.tpl',
      1 => 1509778751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fd6570314896_94820203 (Smarty_Internal_Template $_smarty_tpl) {
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
}
}
