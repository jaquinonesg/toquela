<?php /* Smarty version Smarty-3.1.8, created on 2015-05-13 15:52:39
         compiled from "C:\xampp\htdocs\toquela\views\_templates\listar_canchas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81915553b997eefcf4-41423993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e33348554bcbbb3533b10dcdfa3916882ebb3284' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\listar_canchas.tpl',
      1 => 1416600476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81915553b997eefcf4-41423993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_buscador_canchas' => 0,
    'complex' => 0,
    '_params' => 0,
    'canchas' => 0,
    'is_paginator' => 0,
    'htmlpaginator' => 0,
    'init_js_paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5553b998055f08_07834320',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5553b998055f08_07834320')) {function content_5553b998055f08_07834320($_smarty_tpl) {?>
    <style>
        .listar_canchas .img_canchas{
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 170px;
            background-color: #E5E5E5;
        }

        .listar_canchas .img_canchas img{
            width: 100%;
        }

        .listar_canchas input, select{
            max-width: 300px;
            margin: 0px auto;
        }

        .listar_canchas .recuadro{
            overflow: hidden;
            position: relative;
            width: 300px;
            height: 250px;
            font-size:13px;
        }

        .listar_canchas .recuadro:hover{
            background-color: #1A2E3E;
            color: #FFFFFF;
        }
    </style>

<div class="listar_canchas">
    <div class="clear"><br></div>
        <?php if ($_smarty_tpl->tpl_vars['is_buscador_canchas']->value){?>
        <form id="_buscador_canchas" class="text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                    <label for="txt_bus_canchas" class="control-label">BUSCAR CANCHA</label>
                <input type="text" class="form-control" id="txt_bus_canchas"/>
            </div>
            <div class="clear"><br></div>
        </form>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['complex']->value)){?>
        <div id="_canchas_pagination" class="text-center">
            <?php  $_smarty_tpl->tpl_vars['canchas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['canchas']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['complex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['canchas']->key => $_smarty_tpl->tpl_vars['canchas']->value){
$_smarty_tpl->tpl_vars['canchas']->_loop = true;
?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-canchas"> 
                    <a class="link link-cancha" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/complejos/publico/<?php echo $_smarty_tpl->tpl_vars['canchas']->value->codcomplex;?>
" style="text-decoration: none;">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong><?php echo $_smarty_tpl->tpl_vars['canchas']->value->name;?>
</strong></p>
                            <div class="img_canchas">
                                <?php if (isset($_smarty_tpl->tpl_vars['canchas']->value->poster)){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['canchas']->value->poster;?>
" accesskey="" alt="Imagen del canchas <?php echo $_smarty_tpl->tpl_vars['canchas']->value->name;?>
" title="Imagen del canchas <?php echo $_smarty_tpl->tpl_vars['canchas']->value->name;?>
"/>
                                <?php }else{ ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_canchas.jpg" accesskey="" alt="Imagen del canchas <?php echo $_smarty_tpl->tpl_vars['canchas']->value->name;?>
" title="Imagen del canchas <?php echo $_smarty_tpl->tpl_vars['canchas']->value->name;?>
"/>
                                <?php }?>
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-cog" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['canchas']->value->type;?>
</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-camiseta" style="font-size: 20px;"></span>&nbsp;&nbsp;Participantes: <?php echo $_smarty_tpl->tpl_vars['canchas']->value->numberparticipants;?>
</p>
                        </div>
                    </a>
                    <br><br>
                </div>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['is_paginator']->value){?>
                <div class="clear"></div>
                <?php echo $_smarty_tpl->tpl_vars['htmlpaginator']->value;?>

            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['init_js_paginator']->value){?>
            <script type="text/javascript">
                $(document).ready(function() {
                    var paginacanchasiframe = new PaginarCanchasIframe("pagina_canchas", "_canchas_pagination", "_buscador_canchas", "<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/complejos/search_canchas");
                });
            </script>

        <?php }?>
    <?php }else{ ?>
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay canchas.</p>
            <br>
            <br>
            <br>
        </div>
    <?php }?>
    <br>
</div><?php }} ?>