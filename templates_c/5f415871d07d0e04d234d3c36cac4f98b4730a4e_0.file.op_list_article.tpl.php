<?php
/* Smarty version 3.1.30, created on 2017-11-16 15:49:24
  from "C:\Users\tad\Dropbox\www\reporter\templates\op_list_article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0db3848a71a9_06273568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f415871d07d0e04d234d3c36cac4f98b4730a4e' => 
    array (
      0 => 'C:\\Users\\tad\\Dropbox\\www\\reporter\\templates\\op_list_article.tpl',
      1 => 1510845634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0db3848a71a9_06273568 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="img-container">
    <div class="container">

    </div>
</div>

<div class="text-center">
    <h1 class="my-5">最新文章</h1>
</div>
<div class="container">
    <div class="row ">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all']->value, 'article');
$_smarty_tpl->tpl_vars['article']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->index++;
$__foreach_article_0_saved = $_smarty_tpl->tpl_vars['article'];
?>
        <div class="col-sm-4 mt-5">
            <?php $_smarty_tpl->_assignInScope('cover', "uploads/thumb_".((string)$_smarty_tpl->tpl_vars['article']->value['sn']).".jpg");
?> 
            <?php if (file_exists($_smarty_tpl->tpl_vars['cover']->value)) {?>
                <a href="index.php?sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['cover']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
 " class="cover rounded"></a>
            <?php } else { ?>
                <a href="index.php?sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
"><img src="https://picsum.photos/400/300?image=<?php echo $_smarty_tpl->tpl_vars['article']->index;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
 " class="cover rounded"></a>
            <?php }?>

            <a href="index.php?sn=<?php echo $_smarty_tpl->tpl_vars['article']->value['sn'];?>
" class="h4 d-block my-2"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a>

            <p><?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
</p>


        </div>
        <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved;
}
} else {
?>

        <h1>尚無內容</h1>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</div><?php }
}
