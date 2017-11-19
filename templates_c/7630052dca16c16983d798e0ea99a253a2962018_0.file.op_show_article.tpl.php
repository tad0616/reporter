<?php
/* Smarty version 3.1.30, created on 2017-11-04 07:35:56
  from "D:\tad1062\UniServerZ\www\reporter\templates\op_show_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fd6ddc8b7257_16319502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7630052dca16c16983d798e0ea99a253a2962018' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\op_show_article.tpl',
      1 => 1509778999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fd6ddc8b7257_16319502 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</p>
</div><?php }
}
