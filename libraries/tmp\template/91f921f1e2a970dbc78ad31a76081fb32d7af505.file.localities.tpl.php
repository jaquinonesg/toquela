<?php /* Smarty version Smarty-3.1.8, created on 2015-11-26 10:20:48
         compiled from "/var/www/toquela/views/dialog/sections/localities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319877011562a8e4ba668f7-90688352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91f921f1e2a970dbc78ad31a76081fb32d7af505' => 
    array (
      0 => '/var/www/toquela/views/dialog/sections/localities.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319877011562a8e4ba668f7-90688352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562a8e4ba88dc2_02927295',
  'variables' => 
  array (
    'localities' => 0,
    'locality' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562a8e4ba88dc2_02927295')) {function content_562a8e4ba88dc2_02927295($_smarty_tpl) {?><div class="form-group">
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