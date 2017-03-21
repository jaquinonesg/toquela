<div class="info_partido">
    <table class="table">
        <tbody>
            <tr>
                <td>Jornada: </td>
                <td>{$match->numjornada}</td>
            </tr>
            <tr>
                <td>Fecha Programada: </td>
                <td>{$match->date}</td>
            </tr>
            <tr>
                <td>Hora: </td>
                <td>{$match->hour}</td>
            </tr>
            <tr>
                <td>Lugar: </td>
                <td>
                {if isset($match->location)}<p><strong>Complejo toquela:</strong> {$match->location}</p>{/if}
            {if isset($match->descriptionplace)}<p><strong>Descripción del lugar:</strong> {$match->descriptionplace}</p>{/if}
        </td>
    </tr>
</tbody>
</table>
</div>