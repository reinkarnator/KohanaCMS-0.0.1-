<?php /* Smarty version Smarty-3.1.18, created on 2018-12-15 15:32:47
         compiled from "E:\xampp\htdocs\odontos\application\views\header\langsel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19366161135c14cfddb6dc56-02898241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '637b38ecab9c91b8419bdfcd2812e197a36ff59c' => 
    array (
      0 => 'E:\\xampp\\htdocs\\odontos\\application\\views\\header\\langsel.tpl',
      1 => 1544873491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19366161135c14cfddb6dc56-02898241',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5c14cfddbcb875_72420330',
  'variables' => 
  array (
    'socialsmodule' => 0,
    'language' => 0,
    'difflang' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c14cfddbcb875_72420330')) {function content_5c14cfddbcb875_72420330($_smarty_tpl) {?><div class="top-socials">
    <?php echo $_smarty_tpl->tpl_vars['socialsmodule']->value;?>

</div>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <span class="bold-text"><?php echo __("Language",null);?>
:</span>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="display:inline-block;">
                <img src="<?php echo URL::base(true);?>
html/img/flag/<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
.png">
                <span><?php echo strtoupper($_smarty_tpl->tpl_vars['language']->value);?>
</span>
                <span class="caret"></span>
            </a> 
            <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['difflang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>   
                <ul class="dropdown-menu">
                    <li><a href="<?php echo URL::base(true);?>
<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
"><img src="<?php echo URL::base(true);?>
html/img/flag/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
.png" class="flag"> <?php echo strtoupper($_smarty_tpl->tpl_vars['lang']->value);?>
</a></li>
                </ul>
            <?php } ?>                      
    </li>
</ul><?php }} ?>
