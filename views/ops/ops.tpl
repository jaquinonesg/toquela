<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
    <br>
    <br>
    <br>
    <p>
        {if isset($str_error)}
            {$str_error}
        {elseif $code==247}
            Esta sección no se encuentra o esta construcción
        {elseif $code==248}
            Module Not Found.
        {elseif $code==249}
            You don't have permission to access.
        {elseif $code==250}
            Error Not Found.
        {elseif $code==251}
            Párametros Invalidos.
        {elseif $code==252}
            El proyecto no pertenece al usuario.
        {elseif $code==253}
            Validación de datos erronea.
        {elseif $code==254}
            Acceso denegado a la sección.
        {elseif $code==255}
            Proyecto no encontrado.
        {elseif $code==328}
            Los encabezados no coinciden para poder utilizar el controlador.
        {elseif $code==327}
            Ha ocurrido un problema, por favor intente más tarde.
        {/if}
    </p>
    <br>
    <br>
    <br>
</div>