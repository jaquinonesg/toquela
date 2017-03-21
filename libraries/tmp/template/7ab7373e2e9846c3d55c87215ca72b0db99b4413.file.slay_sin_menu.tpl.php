<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 05:24:53
         compiled from "/var/www/toquela/modules/torneos/views/index/sections/slay_sin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11270514345622efa27554e9-21559865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ab7373e2e9846c3d55c87215ca72b0db99b4413' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/index/sections/slay_sin_menu.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11270514345622efa27554e9-21559865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5622efa2762174_51918666',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5622efa2762174_51918666')) {function content_5622efa2762174_51918666($_smarty_tpl) {?><header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 slay" style="padding: 0px;">
	    <div id="carousel-example-generic" class="carousel slide">
	        <ol class="carousel-indicators">
	            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
	            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
	            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
	        </ol>
	        <div class="carousel-inner">
	            <div class="item active">
	                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img1.jpg" alt="First slide">
	            </div>
	            <div class="item">
	                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img2.jpg" alt="Second slide">
	            </div>
	            <div class="item">
	                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img3.jpg" alt="Third slide">
	            </div>
	            <div class="item">
	                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/slay/img4.jpg" alt="Fourth slide">
	            </div>
	        </div>
	        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	            <span class="icon-prev"></span>
	        </a>
	        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	            <span class="icon-next"></span>
	        </a>
	    </div>
    </div>
</header><?php }} ?>