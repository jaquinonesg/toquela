<?php /* Smarty version Smarty-3.1.8, created on 2015-10-20 18:54:21
         compiled from "/var/www/toquela/views/noticias/sections/administrarNoticias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8692975585626d42dac40a4-23856977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21ff8d6bfd35e1a5dfcd4fb8678b0dfdcd4172e1' => 
    array (
      0 => '/var/www/toquela/views/noticias/sections/administrarNoticias.tpl',
      1 => 1445129468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8692975585626d42dac40a4-23856977',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'noticias' => 0,
    'noticia' => 0,
    'usuarios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5626d42db2ce17_19899742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5626d42db2ce17_19899742')) {function content_5626d42db2ce17_19899742($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>

<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
  <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo" style="margin-top: 5mm; margin-bottom: 5mm;">
        <!-- <span class="glyphicon glyphicon-default icon-trophy" style="position: absolute; margin-top: 10px; left: 0;"></span> -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <p class="title"><strong>ADMINISTRAR NOTICIAS</strong></p>
        </div>
    </div>
    <br>
    <div id="contend-ver-noticias">
      <table class="table table-striped">
        <tr>
          <th> </th>
          <th>Titulo</th>
          <th>Autor</th>
          <th class="ayuda">
            <div class="helpbox helpbox_1">Seleccione esta opción para publicar en el home principal</div>
            <span class="glyphicon glyphicon-question-sign" style="color: #1A2E3E;"></span> 
            Publicar
          </th>
          <th class="ayuda">
            <div class="helpbox helpbox_2">Seleccione esta opción para mostrar en el slide</div>
            <span class="glyphicon glyphicon-question-sign" style="color: #1A2E3E;"></span> 
            Slide
          </th>
          <th></th>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['noticia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticia']->key => $_smarty_tpl->tpl_vars['noticia']->value){
$_smarty_tpl->tpl_vars['noticia']->_loop = true;
?>
        <tr>
          <td><a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/noticias/ver/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" class="btn btn-link">Ver</a></td>
          <td><?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['noticia']->value->coduser];?>
</td>

          <td ><form>
            <input class="publico" value="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['noticia']->value->type=="public"){?>checked<?php }?>> 
          </form></td>
          <td >
            <input class="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['noticia']->value->prioridadhome){?>checked<?php }?>> 
          </td>

          <td>
            <button type="button" value=" <?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" class="btn btn-link btn-borrar" >
              Borrar
            </button>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</header><?php }} ?>