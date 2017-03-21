<?php /* Smarty version Smarty-3.1.8, created on 2015-10-21 10:40:20
         compiled from "/var/www/toquela/views/noticias/sections/verNoticia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17737270505624dfb1825881-65341315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2448d1145cb42b7b480c1644d05e820297a294b' => 
    array (
      0 => '/var/www/toquela/views/noticias/sections/verNoticia.tpl',
      1 => 1445393328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17737270505624dfb1825881-65341315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5624dfb1876698_83237726',
  'variables' => 
  array (
    'titulo' => 0,
    '_params' => 0,
    'loc_imagen' => 0,
    'resumen' => 0,
    'contenido' => 0,
    'autor' => 0,
    'date' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5624dfb1876698_83237726')) {function content_5624dfb1876698_83237726($_smarty_tpl) {?><header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
    <div class="container noticia">
    	<div class="row">
    		<div class="col-xs-12 col-sm-12">
    			<h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    		</div>
    	</div>
        <hr/>
    	<div class="row">
    		<div class="col-xs-8
    					col-sm-8">
    			<img src="<?php echo ($_smarty_tpl->tpl_vars['_params']->value['site']).($_smarty_tpl->tpl_vars['loc_imagen']->value);?>
" class="img-responsive" style="width: 100%">
    		</div>
    	</div>
        <div class="row">
            <div class="col-xs-8
                        col-sm-8">
                <p id="contenido">
                    <?php echo $_smarty_tpl->tpl_vars['resumen']->value;?>

                </p>

            </div>
        </div>
    	<div class="row">
    		<div class="col-xs-8
    					col-sm-8">
				<p id="contenido">
					<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>

				</p>

    		</div>
    	</div>
        <br><br>
    	<div class="row">
	    	<div class="col-xs-12
	    				col-sm-12">
	    		<blockquote >
	    			<?php echo $_smarty_tpl->tpl_vars['autor']->value;?>
 <cite><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</cite>
	    		</blockquote>
	    	</div>
    	</div>
        <br><br><br>
    </div>
    </div>
</header><?php }} ?>