<div class="login">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 init">
        <div class="row">
            <br>
            <br>
            <br>
            <br>
            <div class="text-center wel caja_azul">
                <p style="font-size: 30px;">Usuario y/o contraseñas invalidas</p>
                <br>
                <button class="btn btn-default" id="_btn_ingresar_log" style="height: 60px;">&nbsp;&nbsp;INGRESAR&nbsp;&nbsp;</button>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var initComponentSession = function() {
            component.popupForm("Inicio de Sesión", "_init_session_user_template");
        };
        //component.messageSimple("Alerta...", 'Usuario y/o contraseñas incorrectas');
        component.messageAcept("Alerta...", 'Usuario y/o contraseñas incorrectas.', initComponentSession);
        //---------------------------------------------------
        $(document).on('click', '#_btn_ingresar_log', function() {
            component.popupForm("Inicio de Sesión", "_init_session_user_template");
        });
    });
</script>
