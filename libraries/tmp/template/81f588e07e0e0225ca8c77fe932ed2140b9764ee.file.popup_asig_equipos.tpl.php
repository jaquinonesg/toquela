<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 19:05:14
         compiled from "/var/www/toquela/modules/torneos/views/participantes/sections/popup_asig_equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10002838195626d6ba350ed5-28613629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f588e07e0e0225ca8c77fe932ed2140b9764ee' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/participantes/sections/popup_asig_equipos.tpl',
      1 => 1445129466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10002838195626d6ba350ed5-28613629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626d6ba357c56_17992620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626d6ba357c56_17992620')) {function content_5626d6ba357c56_17992620($_smarty_tpl) {?><div class="modal fade modal-default modal-asign-equipos" id="modal-asignar-equipos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog-big">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel" style="margin-right: 86%;">Seleccionar equipos</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="_btn_agregar_equipos_toreno" data-code="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">Agregar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div><?php }} ?>