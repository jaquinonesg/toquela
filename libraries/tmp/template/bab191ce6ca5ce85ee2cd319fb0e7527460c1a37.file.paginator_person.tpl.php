<?php /* Smarty version Smarty-3.1.8, created on 2015-07-02 10:58:37
         compiled from "C:\xampp\htdocs\toquela_jorge\views\_templates\paginator_person.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3076455955faddf14e9-33323215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bab191ce6ca5ce85ee2cd319fb0e7527460c1a37' => 
    array (
      0 => 'C:\\xampp\\htdocs\\toquela_jorge\\views\\_templates\\paginator_person.tpl',
      1 => 1433176272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3076455955faddf14e9-33323215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'num_paginas' => 0,
    'clase_css_pag' => 0,
    'index' => 0,
    'pagina_select' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55955fade42e42_71240212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55955fade42e42_71240212')) {function content_55955fade42e42_71240212($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['num_paginas']->value>0){?>
    <ul class="pagination <?php echo $_smarty_tpl->tpl_vars['clase_css_pag']->value;?>
" numpags="<?php echo $_smarty_tpl->tpl_vars['num_paginas']->value;?>
">
        <li class="pag_option" style="cursor: pointer;" id="_pag_back" index="back"><a>«</a></li>
            <?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int)ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? $_smarty_tpl->tpl_vars['num_paginas']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['num_paginas']->value)+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0){
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++){
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration == 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration == $_smarty_tpl->tpl_vars['index']->total;?>
                <?php if ($_smarty_tpl->tpl_vars['index']->value==$_smarty_tpl->tpl_vars['pagina_select']->value){?>
                <li class="pag_active active" style="cursor: pointer;" id="_pag_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><a <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?> href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                <?php }else{ ?>
                <li class="pag_option" style="cursor: pointer;" id="_pag_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" index="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><a <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?> href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                <?php }?>
            <?php }} ?>
        <li class="pag_option" style="cursor: pointer;" id="_pag_next" index="next"><a>»</a></li>
    </ul>
<?php }?><?php }} ?>