<?php /* Smarty version Smarty-3.1.8, created on 2016-01-22 09:45:51
         compiled from "/var/www/toquela/modules/carnets/views/index/sections/export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201975997456a2409f899625-62914708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39c7431cfbaeb0774f1cc344547efb3aa31f6fce' => 
    array (
      0 => '/var/www/toquela/modules/carnets/views/index/sections/export.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201975997456a2409f899625-62914708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'htmlexport' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a2409f8e5ce9_38350994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a2409f8e5ce9_38350994')) {function content_56a2409f8e5ce9_38350994($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<div class="nuevo_carnet">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(8, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript">
        $(document).ready(function() {
            var expo = new Export();
            expo.init(<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
);
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center"><strong>Exportar carnet</strong></h1>
        <br>
        <div class="export">
            <div class="actions">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/nuevo_carnet/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    <button class="btn btn-default" id="btn_config_carnet">Configurar carnet</button>
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/exportall/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/print" target="_blank">
                    <button class="btn btn-default" id="btn_imprimir_todo">Imprimir todo</button>                    
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/exportall/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/jpg" target="_blank">
                    <button class="btn btn-default" id="btn_export_jpg">Exportar todo a JPG</button>                    
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/exportall/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/png" target="_blank">
                    <button class="btn btn-default" id="btn_export_png">Exportar todo a PNG</button>                    
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/exportall/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
/pdf" target="_blank">
                    <button class="btn btn-default" id="btn_export_pdf">Exportar todo a PDF</button>                    
                </a>
            </div>
            <div class="clear"><br></div>
            <div class="buscadores">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h2>Buscar equipo</h2>
                    <input type="text" class="form-control" id="txt_buscar_equipo" placeholder="Equipo"/>
                    <div id="result_equipo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h2>Buscar jugador</h2>
                    <input type="text" class="form-control" id="txt_buscar_jugador" placeholder="Jugador"/>
                    <div id="result_jugador">
                    </div>
                </div>
            </div>
            <div class="clear"><br></div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 panel-group acor clear" style="float: right;" id="accordion1">
                <?php echo $_smarty_tpl->tpl_vars['htmlexport']->value;?>

            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div><?php }} ?>