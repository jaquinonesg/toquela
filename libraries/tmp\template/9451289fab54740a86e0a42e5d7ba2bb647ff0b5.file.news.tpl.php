<?php /* Smarty version Smarty-3.1.8, created on 2015-11-08 09:42:23
         compiled from "/var/www/toquela/views/_templates/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9386366085626d6bc58d842-10252884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9451289fab54740a86e0a42e5d7ba2bb647ff0b5' => 
    array (
      0 => '/var/www/toquela/views/_templates/news.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9386366085626d6bc58d842-10252884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626d6bc5a6bf7_90872699',
  'variables' => 
  array (
    'news' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626d6bc5a6bf7_90872699')) {function content_5626d6bc5a6bf7_90872699($_smarty_tpl) {?><span id="publicaciones-torneo">
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