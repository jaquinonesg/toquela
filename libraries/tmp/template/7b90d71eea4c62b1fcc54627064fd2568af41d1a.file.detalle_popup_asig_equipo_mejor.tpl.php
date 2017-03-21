<?php /* Smarty version Smarty-3.1.8, created on 2015-05-15 11:33:20
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\participantes\sections\detalle_popup_asig_equipo_mejor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2454055561fd0871dc0-39578417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b90d71eea4c62b1fcc54627064fd2568af41d1a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\participantes\\sections\\detalle_popup_asig_equipo_mejor.tpl',
      1 => 1416847435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2454055561fd0871dc0-39578417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'types_futbol' => 0,
    'type' => 0,
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55561fd08ea857_87127008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55561fd08ea857_87127008')) {function content_55561fd08ea857_87127008($_smarty_tpl) {?><div class="row">
    <div id="equipos_escogidos" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;">
        <div class="panel-group" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEquipos">
                            Ver equipos escogidos
                        </a>
                    </h4>
                </div>
                <div id="collapseEquipos" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="content col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: initial;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <form id="_buscador_equipo" class="text-center">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 34px;"><span class="glyphicon glyphicon-search"></span></div>
            <label for="txt_bus_equipo" class="control-label">BUSCAR EQUIPO</label>
            <input type="text" class="form-control" id="txt_bus_equipo"/>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 40px;"><span class="icon-users"></span></div>
            <label for="sel_equipo_genero" class="control-label">GÉNERO</label>
            <select class="form-control" id="sel_equipo_genero">
                <option value="" selected="">Todos</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Mixto</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-left: 30px; padding-right: 30px;">
            <div class="text-center" style="font-size: 40px;"><span class="icon-guayo"></span></div>
            <label for="sel_tipo_futbol" class="control-label">TIPO FÚTBOL</label>
            <select class="form-control" id="sel_tipo_futbol">
                <option value="" selected="">Todos</option>
                <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types_futbol']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->codvirtues;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</option>
                <?php } ?>
            </select>
        </div>
    </form>
</div>
<div class="row btns-arregla-vidas" style="padding-left: 14px;padding-right: 14px;">
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
        <button class="btn_info" id="_seleccionar_todos" style="width: 100%">Seleccionar todos</button>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
        <button class="btn_info" id="_desseleccionar_todos" style="width: 100%">Desseleccionar todos</button>
    </div>
</div>
<div id="_container-lits-check" class="row">
    <?php $_smarty_tpl->tpl_vars['is_buscador_equipo'] = new Smarty_variable(true, null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_equipos_check.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>