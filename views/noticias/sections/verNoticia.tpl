<header class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear header">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="padding: 0px;">
    <div class="container noticia">
    	<div class="row">
    		<div class="col-xs-12 col-sm-12">
    			<h1>{$titulo}</h1>
    		</div>
    	</div>
        <hr/>
    	<div class="row">
    		<div class="col-xs-8
    					col-sm-8">
    			<img src="{$_params.site|cat: $loc_imagen}" class="img-responsive" style="width: 100%">
    		</div>
    	</div>
        <div class="row">
            <div class="col-xs-8
                        col-sm-8">
                <p id="contenido">
                    {$resumen}
                </p>

            </div>
        </div>
    	<div class="row">
    		<div class="col-xs-8
    					col-sm-8">
				<p id="contenido">
					{$contenido}
				</p>

    		</div>
    	</div>
        <br><br>
    	<div class="row">
	    	<div class="col-xs-12
	    				col-sm-12">
	    		<blockquote >
	    			{$autor} <cite>{$date}</cite>
	    		</blockquote>
	    	</div>
    	</div>
        <br><br><br>
    </div>
    </div>
</header>