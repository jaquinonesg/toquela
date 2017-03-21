<span id="publicaciones-torneo">
    {foreach from=$news item=item}
        <div>
            <p>---------- {$item->date}</p></br>
            <p>
                {if $item->type == 'text'}
                    {$item->message}
                {elseif $item->type == 'image'}
                    <img class="img-thumbnail" src="{$item->message}"/>
                {else}

                {/if}
            </p>
        </div></br>
    {/foreach}
</span>