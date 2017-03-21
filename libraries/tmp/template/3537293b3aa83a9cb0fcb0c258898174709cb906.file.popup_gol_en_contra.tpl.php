<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 18:14:15
         compiled from "/var/www/toquela/modules/torneos/views/partido/sections/popup_gol_en_contra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3475375155628fb4f99f389-17562856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3537293b3aa83a9cb0fcb0c258898174709cb906' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/partido/sections/popup_gol_en_contra.tpl',
      1 => 1446180632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3475375155628fb4f99f389-17562856',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5628fb4f9a3424_25267964',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628fb4f9a3424_25267964')) {function content_5628fb4f9a3424_25267964($_smarty_tpl) {?><div class="modal fade modal-default modals-sumar" id="modal-gol-contra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-big">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sumar goles en contra</h4>
      </div>
      <div class="modal-body">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <p class="title"><span class="glyphicon glyphicon-record resalta" style="font-size: 20px;"></span>&nbsp; Ingresar el número de goles en contra:</p>
          <input id="cantidad" type="text" onkeypress="return justNumbers(event);" maxlength="2" placeholder="0">
          <p>
            <button class="btn btn-primary efect-hover" id="agregar"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp; Sumar</button>
          </p>
          <p class="title" style="margin-top: 10px"><span class="glyphicon glyphicon-record resalta" style="font-size: 20px;"></span>&nbsp; Restaurar goles en contra a cero:</p>
          <button class="btn btn-primary efect-hover" id="restaurar-contra"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp; Restaurar</button>
        </div>
        <input id="tipo" value="" type="text" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function justNumbers(e)
  {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
      return true;

    return /\d/.test(String.fromCharCode(keynum));
  }
</script><?php }} ?>