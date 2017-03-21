{foreach from=$groups item=group key=number}
    <div class="panel-collapse">
        <table class="table table-striped" data-round="{$round->number}">
            <thead>
                <tr>
                    <th>Grupo {$number}</th>
                </tr>
            </thead>
            <tbody id="sortable_{$number}" class="connectedSortable" data-number="{$number}">
                {foreach from=$group->teams item=team}
                    <tr data-team="{$team->codteam}">
                        <td>
                            {$team->name}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
{/foreach}
<button class="btn btn-default" id="save_groups" data-code="{$tournament->codtournament}">Guardar grupos</button>