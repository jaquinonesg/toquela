<div>
    <div class="row">
        <div class="col-md-4">
            <h1>Crear torneo</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <form role="form">
                <div class="form-group">
                    <label for="nametournament">Nombre del torneo</label>
                    <input type="text" class="form-control" id="name_tournament" placeholder="Ingrese el nombre del torneo" maxlength="60">
                    <span class="help-block">Maximo 60 caracteres.</span>
                </div>
                <div class="form-group">
                    <label for="type">Sistema</label>
                    <ul class="list-group checkbox">
                        <li class="list-group-item">
                            <label for="type_1">
                                <input type="radio" name="type" value="1" id="type_1"> Nocaut
                            </label>
                        </li>
                        <li class="list-group-item">
                            <label for="type_2">
                                <input type="radio" name="type" value="2" id="type_2"> Grupos y play-off
                            </label>
                        </li>
                        <li class="list-group-item">
                            <label for="type_3">
                                <input type="radio" name="type" value="3" id="type_3"> Todos contra todos
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <label>N. de participantes</label>
                    <div >
                        <select class="selectpicker" id="n_participants">
                            {for $i=2 to 16}
                                <option value="{$i}">{$i}</option>
                            {/for}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button id="btn_create" class="btn btn-lg btn-primary">Crear torneo</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" id="message_server"></div>
    </div>
</div>