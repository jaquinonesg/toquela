<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 13:07:50
         compiled from "C:\xampp\htdocs\toquela\views\_templates\news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72915553d66e8689a4-65702407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16d46882129c9fe7193e3308a3f20af0612153e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\news.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72915553d66e8689a4-65702407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5553d66e899e64_07845754',
  'variables' => 
  array (
    'news' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5553d66e899e64_07845754')) {function content_5553d66e899e64_07845754($_smarty_tpl) {?><span id="publicaciones-torneo">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div>
            <p>---------- <?php echo $_smarty_tpl->tpl_vars['item']->value->date;?>
</p></br>
            <p>
                <?php if ($_smarty_tpl->tpl_vars['item']->value->type=='text'){?>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value->message;?>

                <?php }elseif($_smarty_tpl->tpl_vars['item']->value->type=='image'){?>
                    <img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['item']->value->message;?>
"/>
                <?php }else{ ?>

                <?php }?>
            </p>
        </div></br>
    <?php } ?>
</span><?php }} ?>