<?php /* Smarty version Smarty-3.1.8, created on 2015-05-21 11:02:12
         compiled from "C:\xampp\htdocs\toquela\modules\torneos\views\clasificacion\sections\detalle_partido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:247115554b48ade2577-82908348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ec2c5d6bf316e575be34b403c02b22e77ce8a9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\modules\\torneos\\views\\clasificacion\\sections\\detalle_partido.tpl',
      1 => 1432161073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '247115554b48ade2577-82908348',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554b48b356931_35434912',
  'variables' => 
  array (
    'noprogramado' => 0,
    'team_local' => 0,
    'urlencode' => 0,
    '_params' => 0,
    'url_local' => 0,
    'match' => 0,
    'statistics_local' => 0,
    'publico' => 0,
    'team_visitant' => 0,
    'url_visitant' => 0,
    'statistics_visitant' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554b48b356931_35434912')) {function content_5554b48b356931_35434912($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['noprogramado']->value===true){?>
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

<div class="detalle-partido-popup">
    <div class="row detalle">
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
            <?php if (($_smarty_tpl->tpl_vars['team_local']->value->status=='CREATOR')||($_smarty_tpl->tpl_vars['team_local']->value->status=='CAPTAIN')){?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("perfil-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['url_local'] = new Smarty_variable(((("editar-equipo/").($_smarty_tpl->tpl_vars['team_local']->value->codteam)).("-")).($_smarty_tpl->tpl_vars['urlencode']->value->encodeStringToUrl($_smarty_tpl->tpl_vars['team_local']->value->name)), null, 0);?>
            <?php }?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="resalta text-center" style="font-size: 20px;margin-bottom: 10px;">Local</p>
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
                        <p><?php echo $_smarty_tpl->tpl_vars['match']->value->date;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->hour)){?>
                        <p><?php echo $_smarty_tpl->tpl_vars['match']->value->hour;?>
</p>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['match']->value->descriptionplace)){?>
                        <p><strong class="resalta">Lugar:</strong> <?php echo $_smarty_tpl->tpl_vars['match']->value->descriptionplace;?>
</p>
                        <?php }?>
                    </div>
                </div>
                <?php if (!isset($_smarty_tpl->tpl_vars['publico']->value)&&!$_smarty_tpl->tpl_vars['publico']->value){?>
                    <a class="btn efect-hover" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/torneos/partido/index/<?php echo $_smarty_tpl->tpl_vars['match']->value->codmatch;?>
" target="_blank" style="margin-top: 10px">Cargar resultados</a>
                <?php }?>
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
                <p class="resalta text-center" style="font-size: 20px;margin-bottom: 10px;">Visitante</p>
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