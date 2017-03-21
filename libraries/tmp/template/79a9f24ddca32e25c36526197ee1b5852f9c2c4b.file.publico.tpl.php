<?php /* Smarty version Smarty-3.1.8, created on 2015-05-13 15:52:54
         compiled from "C:\xampp\htdocs\toquela\views\complejos\sections\publico.tpl" */ ?>
<?php /*%%SmartyHeaderCode:219775553b9a6e19325-77903181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79a9f24ddca32e25c36526197ee1b5852f9c2c4b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\complejos\\sections\\publico.tpl',
      1 => 1416600492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219775553b9a6e19325-77903181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'dtoComplex' => 0,
    'all_complex' => 0,
    'troque' => 0,
    'index' => 0,
    'complex' => 0,
    'photos' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5553b9a6f1cd24_22295824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5553b9a6f1cd24_22295824')) {function content_5553b9a6f1cd24_22295824($_smarty_tpl) {?><div class="vercomplejo">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/gmaps.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var public_complex = new PublicoCompejo();
            public_complex.initMap('<?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->lat;?>
', '<?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->lng;?>
');
            public_complex.addMarkerMap();
            public_complex.events();
        });
    </script>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <br>
        <h1 class="text-center text-gray-dark"><span style="font-size: 35px;" class="icon-cancha"></span>&nbsp;&nbsp;&nbsp; COMPLEJO: <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['dtoComplex']->value->name, 'UTF-8');?>
</h1>
        <br>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h2 class="text-gray-dark">Contacto del complejo</h2>
            <br>
            <p id="email"><span class="text-gray-dark">Email del complejo:&nbsp;&nbsp; </span><?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->email;?>
</p>
            <p id="phone"><span class="text-gray-dark">Télefono:&nbsp;&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->phone;?>
</p>
            <p id="address"><span class="text-gray-dark">Dirección:&nbsp;&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->address;?>
</p>
            <div class="form-group">
                <br>
                <label for="map" class="text-gray-dark">Ubicación:</label>
                <div id="map" style="width: 100%; height: 250px;"></div>
            </div>
            <div class="form-group">
                <label for="description" class="text-gray-dark">Descripción:</label>
                <p id="description"><?php echo $_smarty_tpl->tpl_vars['dtoComplex']->value->description;?>
</p>
            </div>
            <br>
            <div class="clear"><br></div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-gray-dark">CANCHAS DEL COMPLEJO</h3>
            <br>
            <br>
            <?php if (isset($_smarty_tpl->tpl_vars['all_complex']->value)){?>
                <div style="display: none;" class="modal fade" id="pop-ver-cancha" tabindex="-1" role="dialog" aria-labelledby="lbl-ver-cancha" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title" id="lbl-ver-cancha">Cancha</h4>
                            </div>
                            <div class="modal-body" id="contend-ver-cancha">
                                <br>
                                <br>
                                <div class="text-center">
                                    <img class="loader-medium img-thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/loader.gif"/>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre cancha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_smarty_tpl->tpl_vars['troque'] = new Smarty_variable(true, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['complex'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['complex']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['all_complex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['complex']->key => $_smarty_tpl->tpl_vars['complex']->value){
$_smarty_tpl->tpl_vars['complex']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['complex']->key;
?>
                            <tr <?php if ($_smarty_tpl->tpl_vars['troque']->value){?>class="active"<?php $_smarty_tpl->tpl_vars['troque'] = new Smarty_variable(false, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['troque'] = new Smarty_variable(true, null, 0);?><?php }?>>
                                <td><?php echo ($_smarty_tpl->tpl_vars['index']->value+1);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['complex']->value->name;?>
</td>
                                <td>
                                    <button class="btn btn-success ver_cancha" data-code="<?php echo $_smarty_tpl->tpl_vars['complex']->value->codsubcomplex;?>
">Ver</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }else{ ?>
                <br>
                <p>No se han agregado canchas a este complejo...</p>
            <?php }?>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['photos']->value)){?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear">
                <div class="clear"></div>
                <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['photo']->key;
?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="divcortar img-thumbnail" style="overflow: hidden;position: relative;width: 230px;height: 150px; background-color: #CCCCCC;">
                            <a class="previa" rel="gallery<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
">
                                <img style="width: 100%;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value->path;?>
"/>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }?>
        <div class="clear"><br></div>
    </div>
</div>
<?php }} ?>