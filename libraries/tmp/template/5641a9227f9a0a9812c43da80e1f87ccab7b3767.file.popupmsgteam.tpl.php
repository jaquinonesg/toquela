<?php /* Smarty version Smarty-3.1.8, created on 2015-05-14 10:11:09
         compiled from "C:\xampp\htdocs\toquela\views\equipos\sections\popupmsgteam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129705554bb0d994b62-90289568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5641a9227f9a0a9812c43da80e1f87ccab7b3767' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela\\views\\equipos\\sections\\popupmsgteam.tpl',
      1 => 1416600500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129705554bb0d994b62-90289568',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'team' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5554bb0d9a9a98_21073101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5554bb0d9a9a98_21073101')) {function content_5554bb0d9a9a98_21073101($_smarty_tpl) {?><span class="display_none">

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