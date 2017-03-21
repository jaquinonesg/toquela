<?php /* Smarty version Smarty-3.1.8, created on 2016-03-17 22:42:32
         compiled from "/var/www/toquela/modules/torneos/views/noticias/noticias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322228810562b87d539cb93-24435835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25626230978fb0a2555a759407b71855eb824e65' => 
    array (
      0 => '/var/www/toquela/modules/torneos/views/noticias/noticias.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322228810562b87d539cb93-24435835',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562b87d53feb60_31211687',
  'variables' => 
  array (
    '_params' => 0,
    'noticias' => 0,
    'noticia' => 0,
    'usuarios' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562b87d53feb60_31211687')) {function content_562b87d53feb60_31211687($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui_1.10.3.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/participantes.css">
<link rel="stylesheet" type="text/css" href="css/croppic.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/noticias/js/croppic.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modules/torneos/views/noticias/js/noticias.js"></script>

<div class="participantes">
   <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(9, null, 0);?> 
   <!--Slay menu-->
   <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <!--End Slay menu-->
   <!--Barra de titulo-->
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
         <span class="glyphicon glyphicon-comment" style="font-size: 26px;"></span>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
         <p class="title text-center"><strong>Noticias</strong></p>
      </div>
   </div>
   <!-- Fin Barra de titulo-->
   <!--Contenido-->
   <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos">
      
      <div class="row">
         <span class="menu-estadistica">
            <ul class="nav nav-tabs">
                <li class="text-center active pesta" id="pes_nueva_noticia" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Nueva Noticia&nbsp;&nbsp;</strong></a></li>
                <li class="text-center pesta" id="pes_ver_noticias" style="cursor: pointer;"><a><strong>&nbsp;&nbsp;Ver noticias&nbsp;&nbsp;</strong></a></li>
            </ul>
        </span>
      <div>

      <br/><br/>
      <!--Nueva Noticia-->
      <div id="contend-nueva-noticia">
        <form  method="post" id="noticia_formulario" class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12
                  col-sm-10 col-sm-offset-1
                   ">
              <!--label for="titulo" class="control-label ">Titulo</label-->
              <input type="text" name="titulo" id="titulo" class="form-control has-error" placeholder="Título">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1" id="imagen">
              <div class="thumbnail">
                <label for="subir_imagen" class="btn btn-default" >Subir Imagen</label>
                <input type="file" name="imagen" id="subir_imagen" accept="image/*" style="visibility: hidden">
              </div>
            </div>
          </div>
          <div class="form-group">
            <!--label for="resumen" class="control-label ">Resumen</label-->
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
              <input type="text" name="resumen" id="resumen" class="form-control" maxlength="500" placeholder="Introduzca una breve reseña">
            </div>
          </div>

          <div class="form-group">
            <label for="noticia" class="control-label sr-only">Contenido</label>
            <div class="col-xs-12
                  col-sm-10 col-sm-offset-1
                  ">
              <textarea name="contenido" id="noticia" class="form-control" rows="6" placeholder="Introduzca la noticia" style="resize: none"></textarea>
            </div>
          </div>
          <!--div class="form-group">
            <div class="col-xs-12
                    col-sm-10 col-sm-offset-1
                    ">
              <select class="form-control" name="type" disabled>
                <option value="private">privada - solo para el torneo</option>
                <option value="public" >publica - torneo y home</option>
              </select>
            </div>
          </div-->
          <div class="form-group">
            <div class="col-xs-12 
                  col-sm-12 col-sm-offset-1">
              <button class="btn btn-primary" id="btn-nueva-noticia">
                Publicar
              </button>
            </div>
          </div>
        </form>
      </div>
      <!--Ver Noticias-->
      <div id="contend-ver-noticias">
        <table class="table">
          <tr>
            <th> </th>
            <th>Titulo</th>
            <th>Autor</th>
            <th id="ayuda">
              <div class="helpbox">Si selecciona esta noticia aparecera en el slide principal</div>
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
" class="btn btn-link">ver</a></td>
            <td><?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['noticia']->value->coduser];?>
</td>
            <td><form>
              <input class="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" type="checkbox" style="visibility: visible;"<?php if ($_smarty_tpl->tpl_vars['noticia']->value->prioridadtorneo){?>checked<?php }?>/> 
            </form></td>
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

      <div class="clear"></br></div>
   </div>
   <!--Fin del Contenido-->
</div>
<div class="displaye_nones" style="display: none;">
   <input id="codigo_torneo" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
</div><?php }} ?>