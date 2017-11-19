<?php
/* Smarty version 3.1.30, created on 2017-11-04 05:46:37
  from "D:\tad1062\UniServerZ\www\reporter\templates\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fd543df33139_31629000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c4cfe1d1ef111d65b516144e83cbb1bd0a0529d' => 
    array (
      0 => 'D:\\tad1062\\UniServerZ\\www\\reporter\\templates\\footer.tpl',
      1 => 1509767456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59fd543df33139_31629000 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        var images = ['pic1.jpg', 'pic2.jpg'];
        $('.img-container').css({ 'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')' });

        // var txt = ['大家好', '歡迎光臨'];
        // $('title').text(  txt[Math.floor(Math.random() * txt.length)] );


        $('.img-container').css('width', $(window).width());
        $('.img-container').css('height', $(window).height());
    });

    $(window).resize(function () {
        $('.img-container').css('width', $(window).width());
        $('.img-container').css('height', $(window).height());
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://more.handlino.com/javascripts/moretext-1.2.js" type="text/javascript"><?php echo '</script'; ?>
><?php }
}
