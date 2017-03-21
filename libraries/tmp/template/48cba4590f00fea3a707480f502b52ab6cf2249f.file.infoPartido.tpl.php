<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 17:20:40
         compiled from "C:\xampp\htdocs\toquela\views\partidos\sections\infoPartido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24415555509357967d2-11303545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48cba4590f00fea3a707480f502b52ab6cf2249f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\partidos\\sections\\infoPartido.tpl',
      1 => 1431642022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24415555509357967d2-11303545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_555509358b26f4_18917460',
  'variables' => 
  array (
    'noprogramado' => 0,
    'team_local' => 0,
    'urlencode' => 0,
    '_params' => 0,
    'url_local' => 0,
    'match' => 0,
    'statistics_local' => 0,
    'team_visitant' => 0,
    'url_visitant' => 0,
    'statistics_visitant' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555509358b26f4_18917460')) {function content_555509358b26f4_18917460($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['noprogramado']->value===true){?>
<style type="text/css">
    .resalta{
    color: #848484;
    }
</style>
<?php }?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.formato_statistic').popover({"html": true, "trigger": "hover"});
        $('.formato_statistic').on('click', function() {
            $(this).popover('show');
        });
    });
</script>

<div class="row detalle-partido-notificacion">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 detalle">
    <div class="row div-title-torneo">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
                <span class="glyphicon icon-cancha" style="font-size: 36px;color: rgb(132, 132, 132);"></span>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p class="title text-center"><strong>PARTIDO</strong></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            <?php if (($_smarty_tpl->tpl_vars['team_local']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team_local']->value->status=='CAPTAIN')){?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("perfil-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("editar-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 40px;margin-bottom: 10px;">Local</p>
            </div>
            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/<?php echo $_smarty_tpl->tpl_vars['url_local']->value;?>
" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    <?php if ($_smarty_tpl->tpl_vars['team_local']->value->image!=''){?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo $_smarty_tpl->tpl_vars['team_local']->value->image;?>
" alt="">
                    <?php }else{ ?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="">
                    <?php }?>
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    <?php if (($_smarty_tpl->tpl_vars['match']->value->scorelocal<0)){?>
                    W
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['match']->value->scorelocal)){?>
                    <?php echo $_smarty_tpl->tpl_vars['match']->value->scorelocal;?>

                    <?php }else{ ?>
                    0
                    <?php }?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta"><?php echo $_smarty_tpl->tpl_vars['team_local']->value->name;?>
</p>
            </div>
            
            <div class="panel-group" id="accordion-local" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-local" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            RESUMEN LOCAL
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <?php if (isset($_smarty_tpl->tpl_vars['statistics_local']->value)){?>
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/template_resumen_local.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                            <?php }else{ ?>
                            <p>No tiene estadisticas por el momento</p>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <div class="informacion">
                <?php if ($_smarty_tpl->tpl_vars['noprogramado']->value!=true){?>
                <div class="info-torneo">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->date)){?>
                        <p><strong class="resalta">Fecha:</strong><br><?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                        <p><strong class="resalta">Hora:</strong><br><?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->location)){?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->location)){?>
                        <p><strong class="resalta">Lugar:</strong> <?php echo $_smarty_tpl->tpl_vars['match']->value->location;?>
</p>
                        <?php }?>
                        <?php }?>
                    </div>
                </div>
                <?php }else{ ?>
                <p>Aún no ha sido programado</p>
                <?php }?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            <?php if (($_smarty_tpl->tpl_vars['team_visitant']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team_visitant']->value->status=='CAPTAIN')){?>
            <?php $_smarty_tpl->tpl_vars['url_visitant'] = new Smarty_variable(((("perfil-equipo/").($_smarty_tpl->tpl_vars['team_visitant']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_visitant']->value->name)), null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['url_visitant'] = new Smarty_variable(((("editar-equipo/").($_smarty_tpl->tpl_vars['team_visitant']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_visitant']->value->name)), null, 0);?>
            <?php }?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 40px;margin-bottom: 10px;">Visitante</p>
            </div>
            <a class="link" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/equipos/<?php echo $_smarty_tpl->tpl_vars['url_visitant']->value;?>
" style="text-decoration: none;" target="blank">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 img">
                    <?php if ($_smarty_tpl->tpl_vars['team_visitant']->value->image!=''){?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/<?php echo $_smarty_tpl->tpl_vars['team_visitant']->value->image;?>
" alt="">
                    <?php }else{ ?>
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/fotoequipo.jpg" alt="">
                    <?php }?>
                </div>
            </a>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="text-center" style="font-size: 30px;margin-top: 12px;">
                    <?php if (($_smarty_tpl->tpl_vars['match']->value->scorevisitant<0)){?>
                    W
                    <?php }elseif(isset($_smarty_tpl->tpl_vars['match']->value->scorevisitant)){?>
                    <?php echo $_smarty_tpl->tpl_vars['match']->value->scorevisitant;?>

                    <?php }else{ ?>
                    0
                    <?php }?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name">
                <p class="text-center title resalta"><?php echo $_smarty_tpl->tpl_vars['team_visitant']->value->name;?>
</p>
            </div>
            
            <div class="panel-group" id="accordion-visitant" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title text-center">
                            <a data-toggle="collapse" data-parent="#accordion-visitant" href="#visitant" aria-expanded="true" aria-controls="visitant">
                            RESUMEN VISITANTE
                            </a>
                        </h4>
                    </div>
                    <div id="visitant" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <?php if (isset($_smarty_tpl->tpl_vars['statistics_visitant']->value)){?>
                            <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['_params']->value['root']).("views/_templates/template_resumen_visitant.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                            <?php }else{ ?>
                            <p>No tiene estadisticas por el momento</p>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><?php }} ?>