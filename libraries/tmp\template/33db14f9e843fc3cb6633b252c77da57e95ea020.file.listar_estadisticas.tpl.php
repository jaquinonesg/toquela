<?php /* Smarty version Smarty-3.1.8, created on 2015-12-01 18:12:28
         compiled from "/var/www/toquela/views/_templates/listar_estadisticas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:520542282565e295c3fb1b7-43310261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33db14f9e843fc3cb6633b252c77da57e95ea020' => 
    array (
      0 => '/var/www/toquela/views/_templates/listar_estadisticas.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520542282565e295c3fb1b7-43310261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'statistics' => 0,
    '_params' => 0,
    'statistic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_565e295c422ec1_70380825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e295c422ec1_70380825')) {function content_565e295c422ec1_70380825($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['statistics']->value)){?>
    <table class="table">
        <?php  $_smarty_tpl->tpl_vars['statistic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statistic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['statistics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statistic']->key => $_smarty_tpl->tpl_vars['statistic']->value){
$_smarty_tpl->tpl_vars['statistic']->_loop = true;
?>
            <tr>
                <td>
                    <img class="img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/files/icons_type_statistic/<?php echo $_smarty_tpl->tpl_vars['statistic']->value->icon;?>
"/>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['statistic']->value->name;?>
: &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['statistic']->value->count;?>

                </td>
            </tr>
        <?php } ?>
    </table>
<?php }else{ ?>
    <p class="text-center">No se han ingresado estadísticas para este partido.</p>
<?php }?><?php }} ?>