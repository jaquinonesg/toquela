<?php /* Smarty version Smarty-3.1.8, created on 2015-10-27 23:30:22
         compiled from "C:\xampp\htdocs\html\toquela\views\_templates\maqueta_calendar_fases.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3178656304f5e0036a1-52816228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '661e687f5487a8c6df3a22327949b72fe230f577' => 
    array (
      0 => 'C:\\xampp\\htdocs\\html\\toquela\\views\\_templates\\maqueta_calendar_fases.tpl',
      1 => 1445039382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3178656304f5e0036a1-52816228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'fases' => 0,
    'fase' => 0,
    'ver_total_fase' => 0,
    'indexfase' => 0,
    'tournament' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56304f5e0e2159_64940612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56304f5e0e2159_64940612')) {function content_56304f5e0e2159_64940612($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/popup_detalla_partido.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php  $_smarty_tpl->tpl_vars['fase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fase']->_loop = false;
 $_smarty_tpl->tpl_vars['indexfase'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fase']->key => $_smarty_tpl->tpl_vars['fase']->value){
$_smarty_tpl->tpl_vars['fase']->_loop = true;
 $_smarty_tpl->tpl_vars['indexfase']->value = $_smarty_tpl->tpl_vars['fase']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['fase']->value->type==1){?>
        <?php if (isset($_smarty_tpl->tpl_vars['fase']->value->matches)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-fase-resultados">
            <div class="clear"></br></div>
            <h3 class="text-verde text-center" style="font-size: 18px;"><strong><?php echo $_smarty_tpl->tpl_vars['fase']->value->name;?>
</strong></h3></br>
            <?php if ($_smarty_tpl->tpl_vars['ver_total_fase']->value){?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                <div style="float: left; margin-bottom: 1.5%;">
                <?php if ($_smarty_tpl->tpl_vars['fase']->value->type!=2){?>
                    <button <?php if ($_smarty_tpl->tpl_vars['indexfase']->value+1==count($_smarty_tpl->tpl_vars['fases']->value)){?>id="btn-posiciones-primera"<?php }?> class="btn btn-primary btn_total_grupos" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-total-posiciones">Totales fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
                    <button class="btn btn-primary btn_tabla_reclasificacion" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Tabla de Reclasificación General <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
                <?php }?>
                </div>
                
            </div>
            <?php }?>
                    <?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable($_smarty_tpl->tpl_vars['indexfase']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['matches_jornadas'] = new Smarty_variable($_smarty_tpl->tpl_vars['fase']->value->matches, null, 0);?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion<?php echo $_smarty_tpl->tpl_vars['indexfase']->value;?>
">
                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        </div>
        <?php }?>
    <?php }elseif($_smarty_tpl->tpl_vars['fase']->value->type==2){?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-fase-resultados">
        <?php if (isset($_smarty_tpl->tpl_vars['fase']->value->matches)){?>
        <div class="clear"></br></div>
        <h3 class="text-verde text-center" style="font-size: 18px;"><strong><?php echo $_smarty_tpl->tpl_vars['fase']->value->name;?>
</strong></h3></br>
        <?php if ($_smarty_tpl->tpl_vars['ver_total_fase']->value){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
            <div style="float: left; margin-bottom: 1.5%;">
            <?php if ($_smarty_tpl->tpl_vars['fase']->value->type!=2){?>
                <button <?php if ($_smarty_tpl->tpl_vars['indexfase']->value+1==count($_smarty_tpl->tpl_vars['fases']->value)){?>id="btn-posiciones-primera"<?php }?> class="btn btn-primary btn_total_grupos" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-total-posiciones">Totales fase <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
                <button class="btn btn-primary btn_tabla_reclasificacion" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" fase="<?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
" tipo="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" data-target="#modal-more-results"><span class="glyphicon glyphicon-plus"></span> Tabla de Reclasificación General <?php echo $_smarty_tpl->tpl_vars['fase']->value->number;?>
</button>
            <?php }?>
            </div>
        </div>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['acordion_parent'] = new Smarty_variable($_smarty_tpl->tpl_vars['indexfase']->value, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['matches_ronda'] = new Smarty_variable($_smarty_tpl->tpl_vars['fase']->value->matches, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['arr_enun'] = new Smarty_variable($_smarty_tpl->tpl_vars['fase']->value->arr_enun, null, 0);?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-group clear acor" id="accordion<?php echo $_smarty_tpl->tpl_vars['indexfase']->value;?>
">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/calendar_eliminatoria_aux.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <?php }?>
    </div>
    <?php }?>
<?php } ?><?php }} ?>