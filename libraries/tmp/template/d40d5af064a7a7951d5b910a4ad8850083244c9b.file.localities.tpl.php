<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 10:11:10
         compiled from "C:\xampp\htdocs\toquela\views\dialog\sections\localities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87605554bb0e8368c6-85408351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd40d5af064a7a7951d5b910a4ad8850083244c9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\dialog\\sections\\localities.tpl',
      1 => 1416600494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87605554bb0e8368c6-85408351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'localities' => 0,
    'locality' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bb0e8cbac9_27106514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bb0e8cbac9_27106514')) {function content_5554bb0e8cbac9_27106514($_smarty_tpl) {?><div class="form-group">
    <div class="clear"><br></div>
    <label for="codlocality" style="margin-top: 9px;" class="col-sm-3 text-right">LOCALIDAD&nbsp;</label>
    <div class="col-sm-9">
        <select id="sel_codlocality" class="form-control select-default" style="height: 45px;">
            <?php  $_smarty_tpl->tpl_vars['locality'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['locality']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['localities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['locality']->key => $_smarty_tpl->tpl_vars['locality']->value){
$_smarty_tpl->tpl_vars['locality']->_loop = true;
?>
                <option value='<?php echo $_smarty_tpl->tpl_vars['locality']->value->codlocality;?>
'><?php echo $_smarty_tpl->tpl_vars['locality']->value->name;?>
</option>
            <?php }
if (!$_smarty_tpl->tpl_vars['locality']->_loop) {
?>
                <option value=''>Esta Ciudad no tiene localidades</option>
            <?php } ?>               
        </select>
    </div>
</div><?php }} ?>