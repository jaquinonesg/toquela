<?php /* Smarty version Smarty-3.1.8, created on 2015-12-01 17:09:26
         compiled from "/var/www/toquela/views/_templates/listar_equipos_acordion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2093448945565e1a96356854-99602845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f931c594b14ffdfc451c105cd5c61be9ba5b4802' => 
    array (
      0 => '/var/www/toquela/views/_templates/listar_equipos_acordion.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2093448945565e1a96356854-99602845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'teams' => 0,
    'codtournament' => 0,
    'inter' => 0,
    'class_inter' => 0,
    'team' => 0,
    'count' => 0,
    'class_collapse' => 0,
    '_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_565e1a963cba52_10902510',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e1a963cba52_10902510')) {function content_565e1a963cba52_10902510($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['teams']->value)){?>
    <div class="panel-group" id="torneo_<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
">
        <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
        <?php $_smarty_tpl->tpl_vars['class_collapse'] = new Smarty_variable("collapse", null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
 $_smarty_tpl->tpl_vars['count']->value = $_smarty_tpl->tpl_vars['team']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['inter']->value){?>
                <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("verde", null, 0);?>
                <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(false, null, 0);?>
            <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars['class_inter'] = new Smarty_variable("azul", null, 0);?>
                <?php $_smarty_tpl->tpl_vars['inter'] = new Smarty_variable(true, null, 0);?>
            <?php }?>
            <div class="panel panel-default <?php echo $_smarty_tpl->tpl_vars['class_inter']->value;?>
">
                <a class="accordion-toggle rango-equipo" data-toggle="collapse" equipo="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
" torneo="<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" data-parent="#torneo_<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
" href="#collapse_<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                    <div class="panel-heading">
                        <h4 class="panel-title" title="<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
"><span class="glyphicon glyphicon-circle-arrow-right" id="glyphicon_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"></span> &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['team']->value->name;?>
</h4>
                    </div>
                </a>
                <div id="collapse_<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
" class="panel-collapse <?php echo $_smarty_tpl->tpl_vars['class_collapse']->value;?>
" style="height: auto;">
                    <div class="panel-body" id="equipo_body_<?php echo $_smarty_tpl->tpl_vars['codtournament']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
_<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                        <br>
                        <br>
                        <div class="text-center">
                            <img class="loader-medium img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php }else{ ?>
    <p class="text-center">No se han encontrado equipos para este torneo.</p>
<?php }?><?php }} ?>