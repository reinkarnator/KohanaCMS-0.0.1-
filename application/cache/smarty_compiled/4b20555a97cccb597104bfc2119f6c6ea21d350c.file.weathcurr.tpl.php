<?php /* Smarty version Smarty-3.1.18, created on 2018-12-15 13:56:45
         compiled from "E:\xampp\htdocs\odontos\application\views\module\weathcurr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19998931925c14cfddbdb279-74396839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b20555a97cccb597104bfc2119f6c6ea21d350c' => 
    array (
      0 => 'E:\\xampp\\htdocs\\odontos\\application\\views\\module\\weathcurr.tpl',
      1 => 1525388340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19998931925c14cfddbdb279-74396839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'weathermodule' => 0,
    'currencymodule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5c14cfddbfa677_37967135',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c14cfddbfa677_37967135')) {function content_5c14cfddbfa677_37967135($_smarty_tpl) {?><div class="sidebar">
	  <div class="dates">
		  <span class="glyphicon glyphicon-time"></span>
		  <div id="currDate"></div>
	  </div>	
      <div class="forecast">
		  <span class="city"><b>Bakı</b></span>
		  <?php if (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='01d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='01n')) {?>
			<div class="icon sunny">
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			</div>
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='02d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='02n')) {?>
			<div class="icon sun-shower">
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			</div>		  		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='03d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='03n')) {?>
			<div class="icon cloudy">
			  <div class="cloud"></div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='04d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='04n')) {?>
			<div class="icon cloudy">
			  <div class="cloud"></div>
			  <div class="cloud"></div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='09d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='09n')) {?>
			<div class="icon rainy">
			  <div class="cloud"></div>
			  <div class="rain"></div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='10d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='10n')) {?>
			<div class="icon sun-shower">
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>
			  <div class="rain"></div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='11d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='11n')) {?>
			<div class="icon thunder-storm">
			  <div class="cloud"></div>
			  <div class="lightning">
				<div class="bolt"></div>
				<div class="bolt"></div>
			  </div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='13d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='13n')) {?>
			<div class="icon flurries">
			  <div class="cloud"></div>
			  <div class="snow">
				<div class="flake"></div>
				<div class="flake"></div>
			  </div>
			</div>		  
		  <?php } elseif (($_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='50d'||$_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon']=='50n')) {?>
			<div class="icon sun-shower"> 
			  <div class="cloud"></div>
			  <div class="cloud"></div>
			  <div class="sun">
				<div class="rays"></div>
			  </div>   
			</div>		  
		  <?php }?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
          <!--<img src="<?php echo URL::base(true);?>
html/img/<?php echo $_smarty_tpl->tpl_vars['weathermodule']->value[0]['icon'];?>
.png" width="45">-->
		  <span class="grade"><?php echo $_smarty_tpl->tpl_vars['weathermodule']->value[0]['temp'];?>
 °C</span>         
      </div>
      <div class="rates">
        <div><span class="<?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[0]['icon'];?>
"></span><b><span class="glyphicon glyphicon-usd curr"></span></b>USD: <?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[0]['today'];?>
</div>
        <div><span class="<?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[2]['icon'];?>
"></span><b><span class="glyphicon glyphicon-eur curr"></span></b>EUR: <?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[2]['today'];?>
</div>		
        <div><span class="<?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[1]['icon'];?>
"></span><b><span class="glyphicon glyphicon-rub curr"></span></b>RUR: <?php echo $_smarty_tpl->tpl_vars['currencymodule']->value[1]['today'];?>
</div>
      </div> 
</div><?php }} ?>
