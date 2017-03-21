<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:30:45
         compiled from "C:\xampp\htdocs\html\toquela\views\_templates\listar_torneos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:660156304f75ad26e3-35525133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2823c74d9cff4debf52385e749c32deb063e5b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\_templates\\listar_torneos.tpl',
      1 => 1445039380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '660156304f75ad26e3-35525133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_buscador_torneos' => 0,
    'tournaments' => 0,
    '_params' => 0,
    'torneo' => 0,
    'is_paginator' => 0,
    'htmlpaginator' => 0,
    'init_js_paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f75b43b73_88461219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f75b43b73_88461219')) {function content_56304f75b43b73_88461219($_smarty_tpl) {?><div class="listar_torneos">
    <div class="clear"><br></div>
        <?php if ($_smarty_tpl->tpl_vars['is_buscador_torneos']->value){?>
        <form id="_buscador_torneos" class="text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 30px; padding-right: 30px;">
                <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
                <label for="txt_bus_torneo" class="control-label">BUSCAR TORNEO</label>
                <input type="text" class="form-control" id="txt_bus_torneo"/>
            </div>
            <div class="clear"><br></div>
                
            
        </form>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['tournaments']->value)){?>
        <div id="_torneos_pagination" class="text-center">
            <?php  $_smarty_tpl->tpl_vars['torneo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['torneo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tournaments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['torneo']->key => $_smarty_tpl->tpl_vars['torneo']->value){
$_smarty_tpl->tpl_vars['torneo']->_loop = true;
?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 container-torneo">
                    <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/tablero/publico_temp/<?php echo $_smarty_tpl->tpl_vars['torneo']->value->codtournament;?>
" style="text-decoration: none;">
                        <div class="recuadro img-thumbnail">
                            <p class="text-center nombre"><strong><?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
</strong></p>
                            <div class="img_torneo">
                                <?php if (isset($_smarty_tpl->tpl_vars['torneo']->value->poster)){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public<?php echo $_smarty_tpl->tpl_vars['torneo']->value->poster;?>
" accesskey="" alt="Imagen del torneo <?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
" title="Imagen del torneo <?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
"/>
                                <?php }else{ ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/no_torneos.jpg" accesskey="" alt="Imagen del torneo <?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
" title="Imagen del torneo <?php echo $_smarty_tpl->tpl_vars['torneo']->value->name;?>
"/>
                                <?php }?>
                            </div>
                            <p class="text-left" style="margin-left: 5px; margin-top: 5px;"><span class="icon-cog" style="font-size: 20px;"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['torneo']->value->type;?>
</p>
                            <p class="text-left" style="margin-left: 5px;"><span class="icon-camiseta" style="font-size: 20px;"></span>&nbsp;&nbsp;Participantes: <?php echo $_smarty_tpl->tpl_vars['torneo']->value->numberparticipants;?>
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
                    var paginatorneos = new PaginarTorneos("pagina_torneos", "_torneos_pagination", "_buscador_torneos", "<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneo/search_torneos");
                });
            </script>
        <?php }?>
    <?php }else{ ?>
        <div class="text-center">
            <br>
            <br>
            <br>
            <p>En este momento no hay torneos.</p>
            <br>
            <br>
            <br>
        </div>
    <?php }?>
    <br>
</div><?php }} ?>