<?php /* Smarty version Smarty-3.1.8, created on 2015-05-15 11:33:20
         compiled from "C:\xampp\htdocs\toquela\views\_templates\listar_equipos_check.tpl" */ ?>
<?php /*%%SmartyHeaderCode:227755561fd096a529-45487667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e210425800795209af7f631df07cc443b52440a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\_templates\\listar_equipos_check.tpl',
      1 => 1416600477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227755561fd096a529-45487667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'equipos' => 0,
    'index' => 0,
    'e' => 0,
    'urlencode' => 0,
    '_params' => 0,
    'urlimg' => 0,
    'url' => 0,
    'htmlpaginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55561fd09fdd06_43659475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55561fd09fdd06_43659475')) {function content_55561fd09fdd06_43659475($_smarty_tpl) {?>    <?php if (isset($_smarty_tpl->tpl_vars['equipos']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['equipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
$_smarty_tpl->tpl_vars['e']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
    <style type="text/css">
        .checkbox-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
 {
            display: inline-block;
            vertical-align: middle; 
            width: 20px;
            height: 20px;
            background: #ededed;
            margin-left: 10px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 50%;
            position: relative;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.4);
        }
        .checkbox-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
 label {
            background: #909090;
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            top: 5px;
            left: 4px;
            z-index: 1;
            box-shadow: 0 0 5px rgba(0,0,0,0.7) inset;   
            -webkit-transition: all .2s ease;
            -moz-transition: all .2s ease;
            -o-transition: all .2s ease;
            -ms-transition: all .2s ease;
            transition: all .2s ease;
        }
        .checkbox-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
 input[type=checkbox]:checked + label {
            background: #22C4DA;
            width: 15px;
            height: 15px;
            top: 2px;
            left: 2px;
        }
    </style>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 team-check-<?php echo $_smarty_tpl->tpl_vars['e']->value->codteam;?>
">
        <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable((($_smarty_tpl->tpl_vars['e']->value->codteam).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['e']->value->name)), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable('', null, 0);?>
        <?php if (is_null($_smarty_tpl->tpl_vars['e']->value->image)==true){?>
        <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable(($_smarty_tpl->tpl_vars['_params']->value['site']).("/public/img/fotoequipo.jpg"), null, 0);?>
        <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['urlimg'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_params']->value['site']).("/public")).($_smarty_tpl->tpl_vars['e']->value->image), null, 0);?> 
        <?php }?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 team-check">
                <!--             <input type="checkbox" name="add_equi_torneo" value="<?php echo $_smarty_tpl->tpl_vars['e']->value->name;?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['e']->value->codteam;?>
" style="position: absolute; right: 5px;"/> -->
                <img src="<?php echo $_smarty_tpl->tpl_vars['urlimg']->value;?>
" width="50" height="50"/>
                <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/perfil-equipo/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;" target="_blank">
                    <span class="asuntomsg text-gray-dark"><?php echo $_smarty_tpl->tpl_vars['e']->value->name;?>
</span>
                </a>
                <div class="checkbox-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="position: absolute; right: 5px;">
                    <input class="check-team" type="checkbox" id="ejemplo-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" name="add_equi_torneo" value="<?php echo $_smarty_tpl->tpl_vars['e']->value->name;?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['e']->value->codteam;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['urlimg']->value;?>
"/>
                    <label for="ejemplo-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"></label>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="clear text-center">
        <?php echo $_smarty_tpl->tpl_vars['htmlpaginator']->value;?>

    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            var buscadorEquiposCheck = new BuscadorEquiposCheck("pagina_equipos_check", "_container-lits-check", "_buscador_equipo", "paginaEquipos");
        });
    </script>
    
    <?php }else{ ?>
    <p>En este no hay equipos</p>
    <?php }?>
<?php }} ?>