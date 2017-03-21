<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 11:47:21
         compiled from "/var/www/toquela/modules/torneos/views/partido/sections/popup_gol_a_favor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7569435155628fb4f9a5a67-86843886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae3a16acf017681184e77b36d279924486e9264d' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/partido/sections/popup_gol_a_favor.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7569435155628fb4f9a5a67-86843886',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5628fb4f9a8aa1_19643048',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628fb4f9a8aa1_19643048')) {function content_5628fb4f9a8aa1_19643048($_smarty_tpl) {?><div class="modal fade modal-default modals-sumar" id="modal-gol-favor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-favor" aria-hidden="true">
  <div class="modal-dialog-big">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel-favor">Sumar goles a favor</h4>
      </div>
      <div class="modal-body">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <p class="title"><span class="glyphicon glyphicon-record resalta" style="font-size: 20px;"></span>&nbsp; Ingresar el número de goles a favor:</p>
          <input id="cantidad" type="text" onkeypress="return justNumbers(event);" maxlength="2" placeholder="0">
          <p>
            <button class="btn btn-primary efect-hover" id="agregar"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp; Sumar</button>
          </p>
          <p class="title" style="margin-top: 10px"><span class="glyphicon glyphicon-record resalta" style="font-size: 20px;"></span>&nbsp; Restaurar goles a favor a cero:</p>
          <button class="btn btn-primary efect-hover" id="restaurar-favor"><span class="glyphicon glyphicon-arrow-right"></span>&nbsp; Restaurar</button>

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