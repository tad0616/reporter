<?php
/* Smarty version 3.1.30, created on 2017-11-11 06:20:16
  from "D:\tad1062\UniServerZ\www\reporter\templates\op_article_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0696a000a835_40285245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8a5d5e94c009d67ae02cac141cd0de679f7ca78' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\op_article_form.tpl',
      1 => 1510381196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0696a000a835_40285245 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="ckeditor/ckeditor.js"><?php echo '</script'; ?>
>

<form action="admin.php" method="post">
    <div class="form-group">
        <label for="title" class="col-form-label sr-only">文章標題</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="請輸入文章標題">
    </div>
    <div class="form-group">
        <label for="content" class="col-form-label sr-only">文章內容</label>
        <textarea name="content" id="content" rows="20" class="form-control" placeholder="請輸入文章內容"></textarea>
    </div>
    <div class="text-center">
        <input type="hidden" name="op" value="insert">
        <button type="submit" class="btn btn-primary">儲存</button>
    </div>
</form>

<?php echo '<script'; ?>
>
    CKEDITOR.replace('content');
<?php echo '</script'; ?>
><?php }
}
