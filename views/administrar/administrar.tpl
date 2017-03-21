<div class="administrar">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 div-title-torneo">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;">
				<span class="glyphicon glyphicon-pencil" style="font-size: 25px;"></span>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="title text-center"><strong>ADMINISTRAR</strong></p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 form-datos">
			{foreach from=$privilegios item=privilegio key=index}
			{if $privilegio.nombre != 'Administrador'}
			<a href="{$_params.site}{$privilegio.link}" target="blank">
				<div class="seccion">
					<p>
						<span class="glyphicon glyphicon-chevron-right resalta"></span>&nbsp;&nbsp;&nbsp;{$privilegio.nombre}
					</p>
				</div>
			</a>
			{/if}
			{/foreach}
		</div>
	</div>
</div>