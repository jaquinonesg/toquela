<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:31:19
         compiled from "C:\xampp\htdocs\html\toquela\views\noticias\sections\principalNoticias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2176756304f97da1015-04648249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04671caccef12b95376f4f08fc1d9fd7327b5155' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\noticias\\sections\\principalNoticias.tpl',
      1 => 1445040299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2176756304f97da1015-04648249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'noticias' => 0,
    'noticia_principal' => 0,
    'key' => 0,
    'noticia' => 0,
    'aux_slide' => 0,
    'mas_noticias' => 0,
    'num' => 0,
    'btn' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f97e5c846_64835445',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f97e5c846_64835445')) {function content_56304f97e5c846_64835445($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/noticias/css/principalNoticias.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/noticias/js/principalNoticias.js"></script>
<?php if ($_smarty_tpl->tpl_vars['noticias']->value){?><!--No modificar este archivo afecta torneos y index->
<!--NOTICIA PRINCIPAL-->
<div id="carousel_noticias" class="carousel slide" data-ride="corousel">
    <ol class="carousel-indicators">
    <?php  $_smarty_tpl->tpl_vars['noticia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticia']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['noticia_principal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticia']->key => $_smarty_tpl->tpl_vars['noticia']->value){
$_smarty_tpl->tpl_vars['noticia']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['noticia']->key;
?>
        <li data-target="#carousel_noticias" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="active"></li>
    <?php } ?>
    </ol>
    

    <div class="carousel-inner" role="listbox">
    <?php $_smarty_tpl->tpl_vars['aux_slide'] = new Smarty_variable('none', null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['noticia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticia']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['noticia_principal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticia']->key => $_smarty_tpl->tpl_vars['noticia']->value){
$_smarty_tpl->tpl_vars['noticia']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['noticia']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['key']->value>0){?> <?php $_smarty_tpl->tpl_vars['aux_slide'] = new Smarty_variable('inherit', null, 0);?> <?php }?>
        
        <div class="item <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>active<?php }?>">
            <div class="contenedor-principal-slide">
                <div class="col-xs-12 col-sm-8">
                    <a class="thumbnail img-slide" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/noticias/ver/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" title="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
">
                        <img src="<?php echo ($_smarty_tpl->tpl_vars['_params']->value['site']).($_smarty_tpl->tpl_vars['noticia']->value->locimg);?>
" title="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/noticias/ver/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
"><h1><?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
</h3></a>
                    <p><?php echo $_smarty_tpl->tpl_vars['noticia']->value->date;?>
</p>
                    <br>
                    <p><?php echo $_smarty_tpl->tpl_vars['noticia']->value->resumen;?>
</p>
                </div>
            </div>  
        </div>
    <?php } ?>
    </div>

    <!--Controles carousel-->
    <a class="left carousel-control " href="#carousel_noticias" role="button" data-slide="prev" style="display: <?php echo $_smarty_tpl->tpl_vars['aux_slide']->value;?>
">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control " href="#carousel_noticias" role="button" data-slide="next" style="display: <?php echo $_smarty_tpl->tpl_vars['aux_slide']->value;?>
">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<!-- GRIND NOTICIAS -->
<div class="row">
<?php $_smarty_tpl->tpl_vars['btn'] = new Smarty_variable('oculto', null, 0);?>
<?php  $_smarty_tpl->tpl_vars['noticia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['noticia']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mas_noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['noticia']->key => $_smarty_tpl->tpl_vars['noticia']->value){
$_smarty_tpl->tpl_vars['noticia']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['noticia']->key;
?>
    <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-4 article
                <?php if ($_smarty_tpl->tpl_vars['num']->value>=3){?> oculto <?php }?> ">
        <div class="thumbnail articulo" >
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/noticias/ver/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
" ><img src="<?php echo ($_smarty_tpl->tpl_vars['_params']->value['site']).($_smarty_tpl->tpl_vars['noticia']->value->locimg);?>
" class="img-responsive img-grid" title="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
"></a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/noticias/ver/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->codnews;?>
"><h3><?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
</h3></a>
            <p><?php echo $_smarty_tpl->tpl_vars['noticia']->value->date;?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['noticia']->value->resumen;?>
</p>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['num']->value%3==0&&$_smarty_tpl->tpl_vars['num']->value>1){?>
        <?php $_smarty_tpl->tpl_vars['btn'] = new Smarty_variable(' ', null, 0);?>
    <?php }?>
<?php } ?>
</div>
<br><br>
<div class="row">
    <div class="col-xs-12
                col-sm-2 col-sm-offset-5 <?php echo $_smarty_tpl->tpl_vars['btn']->value;?>
">
        <button class="btn large-button btn-block" id="btn-ver-mas">Ver mas</button>
    </div>
</div>
<?php }else{ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="alert alert-info" style="margin-bottom: 10%; margin-top: 10%;">
                En el momento no tenemos noticias para mostrar!!!
            </div>
        </div>
    </div>  
</div>
<?php }?><?php }} ?>