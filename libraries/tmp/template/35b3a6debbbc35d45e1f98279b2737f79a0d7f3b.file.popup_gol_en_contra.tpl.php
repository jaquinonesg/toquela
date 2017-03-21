<?php /* Smarty version Smarty-3.1.8, created on 2015-05-22 17:48:45
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\partido\sections\popup_gol_en_contra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38725554b49adfed58-34234426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35b3a6debbbc35d45e1f98279b2737f79a0d7f3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\partido\\sections\\popup_gol_en_contra.tpl',
      1 => 1432334915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38725554b49adfed58-34234426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b49ae8ee68_01747987',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b49ae8ee68_01747987')) {function content_5554b49ae8ee68_01747987($_smarty_tpl) {?><div class="modal fade modal-default modals-sumar" id="modal-gol-contra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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