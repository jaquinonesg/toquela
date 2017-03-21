<?php /* Smarty version Smarty-3.1.8, created on 2015-07-02 10:58:37
         compiled from "C:\xampp\htdocs\toquela_jorge\modules\torneos\views\index\sections\slay_sin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:473455955fad9cc9a5-34760931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '697fef408278568e62525b869163cc045239a8ee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela_jorge\\modules\\torneos\\views\\index\\sections\\slay_sin_menu.tpl',
      1 => 1433176270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '473455955fad9cc9a5-34760931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55955fad9e1299_70074597',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55955fad9e1299_70074597')) {function content_55955fad9e1299_70074597($_smarty_tpl) {?><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 slay">
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