<?php /* Smarty version Smarty-3.1.8, created on 2015-06-06 21:16:46
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\index\sections\slay_sin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25755554b9d655b4c7-04633952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb5baf35bc4765e279f03b841718b118cb9afeee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\index\\sections\\slay_sin_menu.tpl',
      1 => 1433176271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25755554b9d655b4c7-04633952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b9d657be14_81033381',
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b9d657be14_81033381')) {function content_5554b9d657be14_81033381($_smarty_tpl) {?><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 slay">
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
</div><?php }} ?>