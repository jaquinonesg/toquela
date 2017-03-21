<?php /* Smarty version Smarty-3.1.8, created on 2015-11-03 12:33:31
         compiled from "/var/www/toquela/views/equipos/sections/popupmsgteam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2120328209562a8e4a2035b4-04094944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ba399e9e122323f032eee8041ec72e186b1317e' => 
    array (
      0 => '/var/www/toquela/views/equipos/sections/popupmsgteam.tpl',
      1 => 1446565485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2120328209562a8e4a2035b4-04094944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_562a8e4a20e274_19349922',
  'variables' => 
  array (
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562a8e4a20e274_19349922')) {function content_562a8e4a20e274_19349922($_smarty_tpl) {?><span class="display_none">

    <span id="popup_msg_team_body">
        <!--form id="send_msg_team" >
            <input type="hidden"  name="cod_team_msg"  value="<?php echo $_smarty_tpl->tpl_vars['team']->value->codteam;?>
">   
            <input type="text" class="form-control" name="asunto" placeholder="Asunto" required ><br>
            <textarea class="form-control" rows="3" name="mensaje" id="msg_usuario_team" placeholder="Mensaje" required></textarea>
        </form-->
    </span>
    <span id="popup_msg_tem_footer">
        <!--div id="msg_for_team" class="text-left"></div>
        <button type="button" class="btn btn-default" id="_btn_enviar_msg_team">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button-->
    </span>

</span><?php }} ?>