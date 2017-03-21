{if isset($template)}
    {$template = $_params.root|cat:"views/_templates/"|cat:$template|cat:".tpl"}
    {include file=$template}
{else}
    {include file=$_contenido}
{/if}