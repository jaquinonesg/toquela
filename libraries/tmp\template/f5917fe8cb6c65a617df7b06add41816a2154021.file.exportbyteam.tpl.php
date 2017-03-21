<?php /* Smarty version Smarty-3.1.8, created on 2016-01-24 10:28:13
         compiled from "/var/www/toquela/modules/carnets/views/index/sections/exportbyteam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78620992456a4ed8d443234-44846332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5917fe8cb6c65a617df7b06add41816a2154021' => 
    array (
      0 => '/var/www/toquela/modules/carnets/views/index/sections/exportbyteam.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78620992456a4ed8d443234-44846332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'hayplantilla' => 0,
    'htmlcarnet' => 0,
    'print' => 0,
    'ispdf' => 0,
    'isjpg' => 0,
    'datacarnets' => 0,
    'plantilla' => 0,
    'datacarnet' => 0,
    'index' => 0,
    'rendercarnet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a4ed8d470ab0_02901424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a4ed8d470ab0_02901424')) {function content_56a4ed8d470ab0_02901424($_smarty_tpl) {?><div class="exportloader">
    <span class="glyphicon glyphicon-remove-circle cerrar" style="display: none"></span>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="text-center">
        <p>Cargando, espere un momento...</p><br>
        <img class="img-thumbnail loader-medium" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
    </div>
    <br>
    <br>
    <br>
</div>
<?php if (!$_smarty_tpl->tpl_vars['hayplantilla']->value){?>
    <div class="text-center">
        <br>
        <h1><?php echo $_smarty_tpl->tpl_vars['htmlcarnet']->value;?>
</h1>
    </div>
<?php }?>
<div class="preview">
    <?php if ($_smarty_tpl->tpl_vars['print']->value){?>
        <input type="hidden" id="isprint" value="true"/>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['ispdf']->value){?>
        <input type="hidden" id="ispdf" value="true"/>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['isjpg']->value){?>
        <input type="hidden" id="isjpg" value="true"/>
    <?php }?>
    <div class="actions">
        <br>
        <?php if ($_smarty_tpl->tpl_vars['print']->value){?>
            <button class="btn btn-default" id="btn_imprimir" onclick="window.print();">Imprimir vista</button>
        <?php }else{ ?>
            <?php if (!$_smarty_tpl->tpl_vars['ispdf']->value){?>
                <button class="btn btn-default" id="btn_generate_zip" disabled="">Guardar Zip de imagene(s)</button>
            <?php }?>
        <?php }?>
    </div>
    <div class="carnet">
        <div class="contend_carnet">
            <div class="plantilla_carnet">
                <?php  $_smarty_tpl->tpl_vars['datacarnet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datacarnet']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datacarnets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datacarnet']->key => $_smarty_tpl->tpl_vars['datacarnet']->value){
$_smarty_tpl->tpl_vars['datacarnet']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['datacarnet']->key;
?>
                    <?php echo $_smarty_tpl->tpl_vars['rendercarnet']->value->getHtmlDataCarnet($_smarty_tpl->tpl_vars['plantilla']->value,$_smarty_tpl->tpl_vars['datacarnet']->value,$_smarty_tpl->tpl_vars['index']->value);?>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="_contend_print"></div>
<div id="_contend_img"></div>
<script type="text/javascript">
                $(document).ready(function() {
                    var eju = new ExportJpgUser();
                    eju.init();
                });
</script><?php }} ?>