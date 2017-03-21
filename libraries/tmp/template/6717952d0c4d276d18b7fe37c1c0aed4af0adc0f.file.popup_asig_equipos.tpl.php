<?php /* Smarty version Smarty-3.1.8, created on 2015-07-01 13:07:52
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\participantes\sections\popup_asig_equipos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323595554b71ff15bb3-81451443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6717952d0c4d276d18b7fe37c1c0aed4af0adc0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\participantes\\sections\\popup_asig_equipos.tpl',
      1 => 1433176270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323595554b71ff15bb3-81451443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b71ff2a897_19640664',
  'variables' => 
  array (
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b71ff2a897_19640664')) {function content_5554b71ff2a897_19640664($_smarty_tpl) {?><div class="modal fade modal-default modal-asign-equipos" id="modal-asignar-equipos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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