<?php /* Smarty version Smarty-3.1.8, created on 2015-10-30 16:49:53
         compiled from "/var/www/toquela/views/_templates/form_filters.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1177788015625080b1791c0-74959324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e3589e53a7a78f7cdaa1aa588d4ec39a295bea9' => 
    array (
      0 => '/var/www/toquela/views/_templates/form_filters.tpl',
      1 => 1446180634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1177788015625080b1791c0-74959324',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5625080b219d59_43290305',
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'filter_fases' => 0,
    'fase' => 0,
    'filter' => 0,
    'filter_grupos' => 0,
    'grupo' => 0,
    'filter_jornadas' => 0,
    'jornada' => 0,
    'tipos_filtros' => 0,
    'index' => 0,
    'tifiltro' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5625080b219d59_43290305')) {function content_5625080b219d59_43290305($_smarty_tpl) {?><div class="alert well fade in" style="color: #000000;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" title="Ocultar"><span class="glyphicon glyphicon-eye-close"></span></button>
    <h2 class="text-center">FILTRAR POR:</h2>
    <br>
    <form class="form-filter" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/" method="GET" role="form">
        <input name="torn" id="torn" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
"/>
        <div class="form-group" style="margin-bottom: 5px;">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="fase" class="form-control">
                    <option>Fase</option>
                    <?php  $_smarty_tpl->tpl_vars['fase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_fases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fase']->key => $_smarty_tpl->tpl_vars['fase']->value){
$_smarty_tpl->tpl_vars['fase']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['fase']->value->num;?>
" type="<?php echo $_smarty_tpl->tpl_vars['fase']->value->type;?>
" <?php if ($_smarty_tpl->tpl_vars['fase']->value->num==$_smarty_tpl->tpl_vars['filter']->value->fase){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['fase']->value->num;?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="grupo" class="form-control">
                    <option>Grupo</option>
                    <?php  $_smarty_tpl->tpl_vars['grupo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grupo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grupo']->key => $_smarty_tpl->tpl_vars['grupo']->value){
$_smarty_tpl->tpl_vars['grupo']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['grupo']->value->num;?>
" <?php if ($_smarty_tpl->tpl_vars['grupo']->value->num==$_smarty_tpl->tpl_vars['filter']->value->grupo){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['grupo']->value->num;?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="jornada" class="form-control">
                    <option>Jornada</option>
                    <?php  $_smarty_tpl->tpl_vars['jornada'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jornada']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_jornadas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jornada']->key => $_smarty_tpl->tpl_vars['jornada']->value){
$_smarty_tpl->tpl_vars['jornada']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['jornada']->value->num;?>
" <?php if ($_smarty_tpl->tpl_vars['jornada']->value->num==$_smarty_tpl->tpl_vars['filter']->value->jornada){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['jornada']->value->num;?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="margin-bottom: 7px;">
            <div class="input-group date fechas_filter col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 2px;" data-date="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaA)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaA;?>
<?php }?>" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd" data-link-field="filter_fechaA">
                <input class="form-control" size="16" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaA)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaA;?>
<?php }?>" placeholder="Fecha inical" readonly disabled="disabled"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                <input type="hidden" name="fechaA" id="filter_fechaA" value="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaA)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaA;?>
<?php }?>"/>
            </div>
            <div class="input-group date fechas_filter col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 2px;" data-date="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaB)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaB;?>
<?php }?>" data-date-format="dd MM yyyy" data-link-format="yyyy-mm-dd" data-link-field="filter_fechaB">
                <input class="form-control" size="16" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaB)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaB;?>
<?php }?>" placeholder="Fecha final" readonly disabled="disabled"/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                <input type="hidden" name="fechaB" id="filter_fechaB" value="<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value->fechaB)){?><?php echo $_smarty_tpl->tpl_vars['filter']->value->fechaB;?>
<?php }?>"/>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="margin-bottom: 5px;">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="padding: 2px;">
                <div class="input-group">
                    <span class="input-group-addon cursor" id="remove-autocomplete-filter"><span class="glyphicon glyphicon-remove"></span></span>
                    <input type="text" class="form-control" id="autocomplete-filter" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value->strfilter;?>
" placeholder="Ingresa algo"/>
                    <input type="hidden" id="hid-strfilter" name="strfilter" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value->strfilter;?>
"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 2px;">
                <select name="typefilter" id="typefilter" class="form-control">
                    <?php  $_smarty_tpl->tpl_vars['tifiltro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tifiltro']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipos_filtros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tifiltro']->key => $_smarty_tpl->tpl_vars['tifiltro']->value){
$_smarty_tpl->tpl_vars['tifiltro']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['tifiltro']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['index']->value==$_smarty_tpl->tpl_vars['filter']->value->typefilter){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['tifiltro']->value;?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="form-group" style="padding: 2px;margin: 0;">
            <button type="submit" class="btn btn_blue_light">Filtrar</button>
            <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/calendario/index/?torn=<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                <button type="button" class="btn btn-default">Quitar filtros</button>
            </a>
        </div>
    </form>
</div><?php }} ?>