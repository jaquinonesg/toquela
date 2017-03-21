<p>
    <label class="text-gray-dark">Reservado por: </label>
    <span>{$person->name} {$person->lastname}</span><div class="clear"><br></div>
</p>
<p>
    <label class="text-gray-dark">Teléfono: </label>
    <span>{$person->phone}</span><br>
</p>
<p>
    <label class="text-gray-dark">Dirección: </label>
    <span>{$person->address}</span><br>
</p>
<p>
    <label class="text-gray-dark">Fecha entrada: </label>
    <span>{$reserve->start}</span><br>
</p>
<p>
    <label class="text-gray-dark">Fecha salida: </label>
    <span>{$reserve->end}</span><br>
</p>
<p>
    <label class="text-gray-dark">Valor: </label>
    <span>$ {$reserve->amount|number_format:2}</span><br>
</p>
<p>
    <label class="text-gray-dark">Abona: </label>
    <span>$ {$reserve->deposit|number_format:2}</span><br>
</p>
