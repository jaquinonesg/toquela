<?php /* Smarty version Smarty-3.1.8, created on 2016-03-14 18:18:03
         compiled from "/var/www/toquela/views/_templates/infoteam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22233382456e746abad4fe1-70597823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '854c76172766d7e76c21b004a26a31e07bfb12e0' => 
    array (
      0 => '/var/www/toquela/views/_templates/infoteam.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22233382456e746abad4fe1-70597823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'team' => 0,
    '_params' => 0,
    'urlencode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56e746abc23531_98847542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e746abc23531_98847542')) {function content_56e746abc23531_98847542($_smarty_tpl) {?><div class="_info_team">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="2"><?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div style="overflow: hidden;position: relative;width: 100%;height: 200px;background-color: #E5E5E5;">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo (($tmp = @$_smarty_tpl->tpl_vars['team']->value->path)===null||$tmp==='' ? "/img/fotoequipo.jpg" : $tmp);?>
" target="_blank">
                            <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo (($tmp = @$_smarty_tpl->tpl_vars['team']->value->path)===null||$tmp==='' ? "/img/fotoequipo.jpg" : $tmp);?>
" accesskey="" alt="<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
" title="<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
">
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-verde">Genero</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['team']->value->tipo;?>

                </td>
            </tr>
            <tr>
                <td class="text-verde">Tipo futbol</td>
                <td>
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['team']->value->futboltype)===null||$tmp==='' ? "Sin asignar" : $tmp);?>

                </td>
            </tr>
            <tr>
                <td class="text-verde">Descripción</td>
                <td><?php echo $_smarty_tpl->tpl_vars['team']->value->description;?>
</td>
            </tr>
            <tr>
                <td class="text-verde">Enlace</td>
                <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
-<?php echo $_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team']->value->name);?>
" class="text-verde" target="_blank">
                        Ir a <?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>

                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php }} ?>