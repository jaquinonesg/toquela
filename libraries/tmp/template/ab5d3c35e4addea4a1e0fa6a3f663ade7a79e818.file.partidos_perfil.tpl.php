<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 13:10:26
         compiled from "C:\xampp\htdocs\toquela\views\perfil\sections\partidos_perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118795554e5126826b5-65765746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab5d3c35e4addea4a1e0fa6a3f663ade7a79e818' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\perfil\\sections\\partidos_perfil.tpl',
      1 => 1416600521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118795554e5126826b5-65765746',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iscreator' => 0,
    '_params' => 0,
    'games' => 0,
    'gamesPublic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554e512733fb2_39754143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554e512733fb2_39754143')) {function content_5554e512733fb2_39754143($_smarty_tpl) {?><div class="mis_partidos">
    <?php $_smarty_tpl->tpl_vars['verpaginator'] = new Smarty_variable(true, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['is_buscador_partido'] = new Smarty_variable(true, null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['iscreator']->value){?>

        <div class="partidos_privados">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
                <div class="row">
                    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(8, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/menu-perfil.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
                <br>
                <span class="menu-estadistica">
                    <ul class="nav nav-tabs mis-nav-tabs">
                        <li class="text-center active" id="pes_privados" style="width: 50%; cursor: pointer;"><a><strong>PRIVADOS</strong></a></li>
                        <li class="text-center" id="pes_publicos" style="width: 50%; cursor: pointer;"><a><strong>PÚBLICOS</strong></a></li>
                    </ul>
                </span>
            </div>
        </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['games']->value)&&!isset($_smarty_tpl->tpl_vars['gamesPublic']->value)){?>
        <div id="partidos_privados">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_partidos_privados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['gamesPublic']->value)&&!isset($_smarty_tpl->tpl_vars['games']->value)){?>
        <div id="partidos_publicos">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_partidos_publicos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['games']->value)&&isset($_smarty_tpl->tpl_vars['gamesPublic']->value)){?>
        <div id="partidos_privados">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_partidos_privados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <div id="partidos_publicos">
            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/listar_partidos_publicos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>
</div><?php }} ?>