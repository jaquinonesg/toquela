<div>
    <div class="row">
        <div class="col-md-6">
            <h1>Modifica las opciones del torneo</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <form role="form">
                <div class="form-group">
                    <label for="nametournament">Nombre</label>
                    <input type="text" class="form-control" id="name_tournament" placeholder="Ingrese el nombre del torneo" maxlength="60" value="{$tournament->name}">
                    <span class="help-block">Maximo 60 caracteres.</span>
                </div>
                <!--<div class="form-group">
                    <label for="nametournament">Ciudad</label>
                    <input type="text" class="form-control" id="city" placeholder="Ingrese la ciudad" maxlength="60">
                </div>-->
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="field" id="description">{$tournament->description}</textarea>
                </div>
                <div class="form-group">
                    <div class="pull-left">
                        {if !is_null($tournament->poster)}
                            <img src="{$_params.site}/public/{$tournament->poster}" class="img-thumbnail"/>
                        {/if}
                    </div>
                    <label>Poster</label>
                    <input type="file" class="form-control" id="img_poster" data-code="{$tournament->codtournament}">
                </div>
                <div class="form-group">
                    <label>Inicio</label>
                    <input type="text" class="form-control" id="date_start" placeholder="Fecha de inicio" value="{$tournament->start->format('Y-m-d')}">
                </div>
                <div class="form-group">
                    <label>Fin</label>
                    <input type="text" class="form-control" id="date_end" placeholder="Fecha de finalización" value="{$tournament->end->format('Y-m-d')}">
                </div>
                <div class="form-group">
                    <label>Sedes</label>
                    <textarea class="field" id="places">{$tournament->places}</textarea>
                </div>
                <div class="form-group">
                    <label>Contactos</label>
                    <textarea class="field" id="contacts">{$tournament->contacts}</textarea>
                </div>
                <div class="form-group">
                    <label>Reglas</label>
                    <textarea class="field" id="rules">{$tournament->rules}</textarea>
                </div>
                <div class="form-group">
                    <label>Inscripciones</label>
                    <textarea class="field" id="inscriptions">{$tournament->inscriptions}</textarea>
                </div>
                <div class="form-group">
                    <button id="btn_update" class="btn btn-lg btn-primary" data-code="{$tournament->codtournament}">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" id="message_server"></div>
    </div>
</div>