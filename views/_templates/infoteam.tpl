<div class="_info_team">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="2">{$team->name}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <div style="overflow: hidden;position: relative;width: 100%;height: 200px;background-color: #E5E5E5;">
                        <a class="previa" href="{$_params.site}/public{$team->path|default: "/img/fotoequipo.jpg"}" target="_blank">
                            <img class="img-responsive" src="{$_params.site}/public{$team->path|default: "/img/fotoequipo.jpg"}" accesskey="" alt="{$team->name}" title="{$team->name}">
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-verde">Genero</td>
                <td>
                    {$team->tipo}
                </td>
            </tr>
            <tr>
                <td class="text-verde">Tipo futbol</td>
                <td>
                    {$team->futboltype|default: "Sin asignar"}
                </td>
            </tr>
            <tr>
                <td class="text-verde">Descripción</td>
                <td>{$team->description}</td>
            </tr>
            <tr>
                <td class="text-verde">Enlace</td>
                <td>
                    <a href="{$_params.site}/equipos/perfil-equipo/{$team->codteam}-{$urlencode->encodeStringToUrl($team->name)}" class="text-verde" target="_blank">
                        Ir a {$team->name}
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
