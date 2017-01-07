<?php
/* Smarty version 3.1.30, created on 2017-01-07 15:12:42
  from "C:\software\Buddha.com\resources\views\templates\front\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587094ea5d7505_74855532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b7289dfdc1af6d29829c7870e55725029690f53' => 
    array (
      0 => 'C:\\software\\Buddha.com\\resources\\views\\templates\\front\\index.html',
      1 => 1483773160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587094ea5d7505_74855532 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_i18n')) require_once 'C:\\software\\Buddha.com\\vendor\\smarty\\plugins\\modifier.i18n.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Goes Well</title>
</head>

<body ><center>

    <h2><?php echo smarty_modifier_i18n($_smarty_tpl->tpl_vars['subject']->value);?>
</h2>
    <h2><?php echo smarty_modifier_i18n($_smarty_tpl->tpl_vars['subject']->value,'zh_CN');?>
</h2>
    <h2><?php echo smarty_modifier_i18n($_smarty_tpl->tpl_vars['subject']->value,'zh_TW');?>
</h2>
    <h2><?php echo smarty_modifier_i18n($_smarty_tpl->tpl_vars['subject']->value,'en_US');?>
</h2>
    <h2><?php echo $_smarty_tpl->tpl_vars['welcome']->value;?>
</h2>
</center>
</body>
</html>
<?php }
}
