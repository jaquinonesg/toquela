<?php /* Smarty version Smarty-3.1.8, created on 2016-01-22 09:45:29
         compiled from "/var/www/toquela/modules/carnets/views/index/sections/nuevo_carnet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86831867256a24089e7ab92-81749211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57a6eeb1098a5c1555e79d84710bfafed2852f0' => 
    array (
      0 => '/var/www/toquela/modules/carnets/views/index/sections/nuevo_carnet.tpl',
      1 => 1446565483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86831867256a24089e7ab92-81749211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_params' => 0,
    'tournament' => 0,
    'carnet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56a24089f0f6f2_56036223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a24089f0f6f2_56036223')) {function content_56a24089f0f6f2_56036223($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/css/torneos.css" rel="stylesheet" type="text/css"/>
<div class="nuevo_carnet">
    <?php $_smarty_tpl->tpl_vars['menu_perfil'] = new Smarty_variable(8, null, 0);?> 
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("modules/torneos/views/index/sections/slay_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
            <span class="glyphicon glyphicon-credit-card" style="font-size: 28px;"></span>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <p class="title text-center"><strong>NUEVO CARNET</strong></p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 init div-acordion-grupos" style="margin-top:10px;">
        <div class="alert alert-info fade in" style="color: #000000;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <p>1) Se recomienda llenar los datos adicionales <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/perfil/index/2" target="_blank">AQUÍ</a>, para poder realizar una vista previa del carnet con sus propios datos por medio del botón "Vista Previa".</p>
            <br>
            <p>2) En la sección herramientas con el botón "Agregar Logotipo" suba una imagen alusiva o logotipo que quiera integrar en el carnet. Se recomienda subir una imagen alargada para no perder la proporción del carnet. </p>
            <br>
            <p>3) Se recomienda siempre guardar los cambios realizados del carnet.</p>
            <br>
            <p>4) En la sección herramientas encontrará un elemento separador que puede arrastrar y soltar sobre la plantilla del carnet para agregar separadores de información sobre la misma.</p>
            <br>
            <p>5) En la sección herramientas encontrará varios elementos con un nombre y un número que indica su tamaño, usted puede tomarlos arrastrarlos y soltarlos sobre la plantilla del carnet en alguna de las casillas siempre que no supere el tamaño de la misma, así mismo, si sobra espacio en la casilla, puede agregar elementos uno seguido de otro dependiendo de su tamaño.</p>
             <br>
            <p>6) En las franjas laterales de la plantilla del carnet también se pueden agregar elementos.</p>
            <br>
            <p>7) Arrastrando los elementos sobre la papelera podrá removerlos de la plantilla del carnet.</p>
            <br>
            <p>8) No olvide guardar su plantilla de carnet por medio del botón "Guardar".</p>
            <br>
            <p>9) Con el botón "Limpiar Separadores" remueve todos los separadores agregados a la plantilla del carnet.</p>
            <br>
            <p>10) Con el botón "Limpiar Todo" quitará todos los elementos que le haya agregado a la plantilla del carnet.</p>
            <br>
            <p>11) El botón "Reporte" le devolverá un archivo en Excel donde tendrá la lista de usuarios del torneo mostrando si tiene la información completa o incompleta para la impresión apropiada del carnet.</p>
            <br>
            <p>12) Con el botón "Exportar" podrá ver las opciones de exportación del carnet en distintos formatos.</p>
        </div>
        <br>
        <div class="carnet">
            <div class="actions">
                <button class="btn btn-default" id="btn_save_format">Guardar</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/preview/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" target="_blank">
                    <button class="btn btn-default" id="btn_vista_previa">Vista previa</button>
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/printreport/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" target="_blank">
                    <button class="btn btn-default" id="btn_reporte">Reporte</button>
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/export/<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
">
                    <button class="btn btn-default" id="btn_export">Exportar</button>
                </a>
            </div>
            <div class="clear"><br></div>
            <div class="items_carnet col-xs-12 col-sm-3 col-md-3 col-lg-3 well">
                <div id="herramientas">
                    <div class="space"></div>
                    <h2 class="text-center"><strong>Herramientas</strong></h2>
                    <br>
                    <button class="btn btn-default" id="btn_agregar_logo">Agregar Logotipo</button>
                    <br>
                    <br>
                    <button class="btn btn-default" id="btn_clear_all">Limpiar Todo</button>
                    <button class="btn btn-default" id="btn_clear_separators">Limpiar separdores</button>
                    <div class="space"></div>
                    <div class="item" index="" cod="" id="separator" sizegrid="2" title="Separador" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>_____Separador_____</p>
                    </div>
                    <div class="space"></div>
                </div>

                <span id="contend_items">
                    <div class="item" index="0" cod="numdoc" id="drag_0" sizegrid="2" title="Documento identidad" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Documento identidad <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="1" cod="typeblood" id="drag_1" sizegrid="1" title="Grupo sanguíneo (RH)" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Grupo sanguíneo (RH)<span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="2" cod="eps" id="drag_2" sizegrid="2" title="EPS" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>EPS <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="3" cod="guardian" id="drag_3" sizegrid="3" title="Acudiente" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Acudiente <span class="text_size">3</span></p>
                    </div>
                    <div class="item" index="4" cod="university" id="drag_4" sizegrid="2" title="Universidad" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Universidad <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="5" cod="profession" id="drag_5" sizegrid="2" title="Profesión" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Profesión <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="6" cod="category" id="drag_6" sizegrid="2" title="Categoría" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Categoría <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="7" cod="nationality" id="drag_7" sizegrid="2" title="Nacionalidad" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Nacionalidad <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="8" cod="sex" id="drag_8" sizegrid="1" title="Genero" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Genero <span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="9" cod="datebirth" id="drag_9" sizegrid="1" title="Fecha de nacimiento" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Fecha de nacimiento <span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="10" cod="age" id="drag_10" sizegrid="1" title="Edad" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Edad <span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="11" cod="phone" id="drag_11" sizegrid="1" title="Telefono" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Telefono <span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="12" cod="cellular" id="drag_12" sizegrid="1" title="Celular" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Celular <span class="text_size">1</span></p>
                    </div>
                    <div class="item" index="13" cod="pt" id="drag_13" sizegrid="2" title="Página toquela" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Página toquela <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="14" cod="email" id="drag_14" sizegrid="2" title="Correo Electrónico" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Correo Electrónico <span class="text_size">2</span></p>
                    </div>
                    <div class="item" index="15" cod="teamcarnet" id="drag_15" sizegrid="2" title="Equipo carnet" auxcontend="" draggable="true" ondragstart="carnet.dragstart(event)" ondragend="carnet.dragend(event)">
                        <p>Equipo carnet <span class="text_size">2</span></p>
                    </div>
                </span>
                <div class="clear"><br></div>
            </div>
            <div class="contend_carnet col-xs-12 col-sm-9 col-md-9 col-lg-9 well">
                <?php if (isset($_smarty_tpl->tpl_vars['carnet']->value->data)){?>
                    <div class="plantilla_carnet" id="plantilla_0" torneo="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->codtournament;?>
" nombre="<?php if (isset($_smarty_tpl->tpl_vars['carnet']->value->nombre)){?> <?php echo $_smarty_tpl->tpl_vars['carnet']->value->nombre;?>
 <?php }else{ ?> Plantilla <?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
 <?php }?>" index="0" cod="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->codtournament;?>
" ancho="8.5" alto="5.4" caras="2" orientacion="h" padding="0.1" fontsize="12" islogo="true" logofilename="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->logofilename;?>
" logoname="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->logoname;?>
" cods='<?php echo $_smarty_tpl->tpl_vars['carnet']->value->cods;?>
' data='<?php echo $_smarty_tpl->tpl_vars['carnet']->value->data;?>
'>
                    </div>
                <?php }else{ ?>
                    <div class="plantilla_carnet" id="plantilla_0" torneo="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
" nombre="Plantilla <?php echo $_smarty_tpl->tpl_vars['tournament']->value->name;?>
" index="0" cod="" ancho="8.5" alto="5.4" caras="2" orientacion="h" padding="0.1" fontsize="12" islogo="true" logofilename="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->logofilename;?>
" logoname="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->logoname;?>
" cods='' data=''>
                    </div>
                <?php }?>
            </div>
            <div class="clear"><br></div>
        </div>
    </div>
</div>

<span class="display_none">
    <span id="popup_agregar_logo_body">
        <!--div class="contend_agregar_logo">
            <p>Por favor seleccione una imagen con las siguientes dimensiones: </p><br>
            <img src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Logo-Toquela4.png"/>
            <br>
            <br>
            <form id="form_agregar_logo" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/carnets/index/loadlogocarnet/" enctype="multipart/form-data" method="post" role="form">
                <input type="hidden" name="torneo" value="<?php echo $_smarty_tpl->tpl_vars['tournament']->value->codtournament;?>
"/>
                <input type="text" name="namelogo" id="txt_name_logo" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['carnet']->value->logoname;?>
" maxlength="40" autofocus placeholder="Nombre logo"/>
                <br>
                <input type="file" name="logo" id="file_logo" accept="image/jpeg, image/png, image/jpg"/>
            </form>
        </div-->
    </span>
    <span id="popup_agregar_logo_footer">
        <!--div id="msg_logo" class="text-left"></div>
        <button type="button" class="btn btn-default" id="btn_subir_logo">Subir logo</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button-->
    </span>
</span>
<?php }} ?>