<?php /* Smarty version Smarty-3.1.8, created on 2015-05-12 13:21:36
         compiled from "/var/www/html/toquela/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1970003337555244b0deb6b4-47244071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1cbecdeee3b35ab8194517601d2b206937f8ae0' => 
    array (
      0 => '/var/www/html/toquela/views/index/index.tpl',
      1 => 1421777007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1970003337555244b0deb6b4-47244071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'error' => 0,
    '_params' => 0,
    'num_miembros' => 0,
    'utilnovedades' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_555244b0e3d1d5_39533486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555244b0e3d1d5_39533486')) {function content_555244b0e3d1d5_39533486($_smarty_tpl) {?><div class="row index">
    <!-- scripts maps -->
    <script type="text/javascript">
        var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='surgio_error'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "Surgió un error al ingresar el usuario, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_permisos'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Permisos.", "No tiene permisos para ingresar a la sección.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_captcha'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de CAPTCHA.", "Surgió un error al comprobar el CAPTCHA, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='existe_usuario'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "El email con el que intentó registrarse ya existe, por favor ingrese otro o inicie sesión.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_datos'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "No se enviaron los datos correctamente, todos los datos son obligatorios para el registro, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='error_email'){?>
        $(document).ready(function() {
            var fun = function() {
                //loadPopupRegister();
            };
            component.messageAcept("Error de registro.", "El email ingresado no es válido, por favor inténtelo de nuevo.", fun, "danger");
            component.replaceStrURL(base_url);
        });
        <?php }?>
    </script>
    <!-- scripts maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=false&language=es"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/index/jsmaps/maps.js"></script>
    <!-- scripts maps -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/js/vendor/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/views/index/jsmaps/controlmaps.js"></script>
    <!-- scripts maps -->

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header-index">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 header-index-container">
            <div class="bienvenida-index"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <img class="img-responsive" style="margin: 0px auto;" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/Pelota_doble.png"/>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contenido">
                <div class="text-verde-fluo" id="contend-miembros">
                    <span id="num-miembros"><?php echo $_smarty_tpl->tpl_vars['num_miembros']->value;?>
</span><br> miembros
                </div>
                <p class="text-gray-dark" id="titu">Tóquela <span style="font-size: 17px;color: #01D0EF;">BETA</span></p>
                <p style="font-size: 14px;margin-bottom: 7px;margin-top: 7px;">¡Regístrese ahora y empiece a disfrutar de los beneficios que ofrece la comunidad de Fútbol Aficionado!</p>
                
                <form class="form-inline text-center" id="_form_registro_index" enctype="multipart/form-data" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/modal/saveregister" role="form">
                    <div id="_alert_registro" style="font-size: 15px; text-align: left;"></div>
                    <label class="sr-only" for="regis_name">Nombres</label>
                    <input type="text" class="form-control" name="name" id="regis_name" maxlength="35" placeholder="Nombres" autofocus required="">
                    <label class="sr-only" for="regis_lastname">Apellidos</label>
                    <input type="text" class="form-control" name="lastname" id="regis_lastname" maxlength="40" placeholder="Apellidos" autofocus required="">
                    <label class="sr-only" for="regis_email">Correo Electr&oacute;nico</label>
                    <input type="email" class="form-control" name="email" id="regis_email" placeholder="Correo Electr&oacute;nico" autofocus required="">
                    <label class="sr-only" for="regis_password">Contraseña</label>
                    <input type="password" class="form-control" name="password" maxlength="15" id="regis_password" placeholder="Contraseña" autofocus required="">
                    <div id="div-captcha">
                        <!-- local -->
                       <!-- <div class="g-recaptcha" data-sitekey="6LeYuQATAAAAAKaGBVWUIy8or3pjhzsbKcdH3I1G"></div> -->
                       <!-- remote -->
                       <div class="g-recaptcha" data-sitekey="6Lepgv0SAAAAAGNRqdXT4z_WAd_nCKMeJ7jRdEou"></div>
                    </div>
                    <div class="text-left">
                        <button type="button" id="btn_registrar_usuario" class="btn btn_blue_light">&nbsp;&nbsp;&nbsp;Registrarme&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </form>
                <script type="text/javascript">
        $(document).ready(function() {
            var ru1 = new RegistroUser("_form_registro_index");
        });
                </script>
                <span id="_popup_terminos">
                    <!--div id="container-terminos">
                        <p style="height: 400px;overflow-y: scroll;font-size: 15px;">
                            TÉRMINOS Y CONDICIONES
<br>
<br>www.toquela.com es una plataforma de propiedad de TÓQUELA S.A.S., sociedad comercial organizada y existente de conformidad con la ley colombiana, identificada con N.I.T. 900419856-2, domiciliada en la ciudad de Bogotá D.C., Colombia, en adelante TÓQUELA, la cual funciona como una red social que permite conectar a practicantes de futbol aficionado con el fin de realizar distintas actividades en línea, en relación con el fútbol. A partir del momento en que el USUARIO se registra a través de la creación de un PERFIL en el sitio web de TÓQUELA, se entiende haber leído y aceptado los términos y condiciones de acceso y uso al sitio web de conformidad con las siguientes:
<br>
<br>CLÁUSULAS
<br>
<br>PRIMERO - 	OBJETO: Establecer los términos y condiciones bajo los cuales el USUARIO puede tener acceso y hacer uso de los servicios ofrecidos por TÓQUELA a través del sitio web www.toquela.com.
<br>
<br>PARÁGRAFO.- Se aclara que las obligaciones contraídas por TÓQUELA por medio del presente contrato constituyen obligaciones de medio y no de resultado.
<br>
<br>SEGUNDO - 	USUARIOS: El USUARIO, actuando a nombre propio o por medio de su representante legal cuando se trate de un menor de edad, reconoce ser una persona natural, con capacidad para contratar y contraer obligaciones. Declara además el carecer de impedimentos legales o contractuales que le prohíban vincularse al presente contrato.
<br>
<br>TERCERO - 	PERFIL: El registro del USUARIO ante el sitio web se hace a través de la creación de un perfil para el cual el USUARIO deberá suministrar sus datos personales, los cuales pueden incluir nombre, condición física, estatura, teléfono, ciudad de residencia, fotos, archivos audio visuales e información sobre sus habilidades futbolísticas tales como su posición de juego, nivel, tipo de juego y experiencia, entre otros. Para acceder a dicho perfil el USUARIO deberá identificarse a través de su correo electrónico, o nombre de USUARIO, y su contraseña, los cuales deberá emplear en la página de acceso.
<br>
<br>CUARTO - 	CONTENIDO: El término CONTENIDO comprende todo tipo de texto, software o programa de ordenador, música, sonido, fotografía, video, obra audiovisual, mensaje y demás obras amparadas o no por el derecho de autor.
<br>
<br>QUINTO - 	OBLIGACIONES DE TÓQUELA: En virtud del presente contrato, TÓQUELA se obliga a lo siguiente:
<br>1.	Proveer la plataforma que permite conectar en línea a distintos segmentos de usuarios del futbol aficionado.
<br>2.	Informar al USUARIO respecto de las limitaciones al acceso y uso de la plataforma que se puedan presentar mientras se encuentre registrado.
<br>3.	Cumplir las políticas de privacidad de la información establecidas en el MANUAL DE POLÍTICAS Y PROCEDIMIENTOS PARA LA PROTECCIÓN Y TRATAMIENTO DE DATOS PERSONALES Y ATENCIÓN DE SOLICITUDES.
<br>4.	Comunicar al USUARIO cualquier modificación que haga del presente contrato.
<br>
<br>SEXTO - 	DERECHOS DE TÓQUELA: TÓQUELA se reserva los siguientes derechos frente a los USUARIOS:
<br>1.	Modificar o dejar de prestar los servicios.
<br>2.	Disponer de la información y CONTENIDO, cargado a la plataforma por parte de los usuarios, de conformidad con el MANUAL DE POLÍTICAS Y PROCEDIMIENTOS PARA LA PROTECCIÓN Y TRATAMIENTO DE DATOS PERSONALES Y ATENCIÓN DE SOLICITUDES.
<br>3.	Restringir o modificar las condiciones de acceso al sitio web.
<br>4.	Interrumpir el servicio prestado a través de su plataforma, total o parcialmente.
<br>5.	Definir y/o modificar los precios de los servicios ofrecidos por parte de TÓQUELA a sus usuarios, previo aviso o publicación en el sitio web.
<br>6.	Retirar o eliminar a su discreción cualquier CONTENIDO encontrado en el PERFIL de los USUARIOS, con o sin previo aviso, si considera que éste infringe el presente contrato o la Ley.
<br>7.	Suspender o eliminar el perfil de cualquier USUARIO que viole el presente contrato o la Ley colombiana, o que abuse o utilice incorrectamente los servicios de TÓQUELA.
<br>8.	TÓQUELA se reserva todos los derechos que no haya explícitamente otorgado al USUARIO, por medio de este contrato.
<br>
<br>SÉPTIMO - 	OBLIGACIONES DEL USUARIO: Para continuar teniendo acceso y seguir haciendo uso de la plataforma, el USUARIO se obliga a lo siguiente:
<br>1.	Suministrar información verdadera, correcta y actual.
<br>2.	Actualizar periódicamente la información que aparezca en su PERFIL.
<br>3.	Mantener la confidencialidad de su contraseña de acceso al sitio web.
<br>4.	Notificar a TÓQUELA de cualquier uso no autorizado de su cuenta o contraseña.
<br>5.	Salir de la plataforma una vez finalice cada sesión.
<br>6.	Abstenerse de realizar las siguiente actividades:
<br>a.	Ceder su PERFIL de USUARIO a un tercero, ya sea a título oneroso o gratuito.
<br>b.	Realizar actividades comerciales, a través de la plataforma, sin contar con la previa autorización de TÓQUELA para dicho fin.
<br>c.	Realizar actividades consideradas ilícitas bajo la legislación colombiana.
<br>d.	Cargar, publicar, transmitir o poner a disposición de los demás USUARIOS, CONTENIDO del cual no esté legal o contractualmente autorizado para poner a disposición;
<br>e.	Cargar, publicar, transmitir o poner a disposición de los demás USUARIOS, CONTENIDO ilegal, hostigador, injurioso, calumnioso, pornográfico o invasivo de la privacidad de terceros;
<br>f.	Cargar, publicar, transmitir o poner a disposición de los demás USUARIOS, CONTENIDO que viole derechos de propiedad intelectual de terceros, ya sea de derechos de autor, marcas, patentes o secretos industriales;
<br>g.	Cargar, publicar, transmitir o poner a disposición de los demás USUARIOS, cualquier anuncio de materiales promocionales, correo no solicitado (“junk mail”, “spam”), cartas en cadena (“chain letter”), o cualquier otra forma de solicitud, sin la autorización previa y expresa por parte de TÓQUELA.
<br>h.	Cargar, publicar, transmitir o poner a disposición algún material que contenga virus de programas de ordenador o cualquier otro código fuente u objeto, archivos o programas, diseñados para interrumpir, destruir o limitar el funcionamiento de algún programa de ordenador, hardware o equipo de telecomunicaciones;
<br>i.	Interferir o interrumpir el normal acceso y uso de la plataforma;
<br>j.	Recolectar o guardar datos personales de otros usuarios.
<br>k.	Valerse de la plataforma para hacerse pasar por otra persona, representante de una organización o administrador de un foro o equipo, a quienes no represente;
<br>
<br>OCTAVO - 	DERECHOS DEL USUARIO: El USUARIO tiene un derecho limitado, revocable, no exclusivo, no sujeto a cesión o sublicencia, para acceder al sitio web www.toquela.com y a la información y/o CONTENIDO que en él se encuentre. Adicionalmente, el USUARIO queda facultado para hacer lo siguiente dentro de la plataforma:
<br>1.	Acceder a los servicios que le sean ofrecidos por parte de TÓQUELA o a través de la plataforma, cuando dicha oferta fuera autorizada por TÓQUELA.
<br>2.	Crear un PERFIL.
<br>3.	Agregar CONTENIDO, a su PERFIL y al de otros USUARIOS.
<br>4.	Crear EQUIPOS y/o FOROS, quedando como ADMINISTRADOR de los mismos.
<br>5.	Autorizar el acceso de otros USUARIOS a los EQUIPOS y/o FOROS que haya creados y de los cuales sea administrador.
<br>6.	Vincularse a EQUIPOS y/o FOROS creados por otros USUARIOS, siempre que cuente con la autorización del administrador o usuario creador de dicho equipo para vincularse.
<br>7.	Organizar partidos.
<br>8.	Enviar mensajes a los demás USUARIOS.
<br>9.	Calificar el nivel, puntualidad y juego limpio de los diferentes equipos y USUARIOS registrados en la plataforma.
<br>10.	Postular a TORNEOS a los EQUIPOS que administre y renunciar a los mismos.
<br>11.	Retar a otros EQUIPOS a partidos.
<br>12.	Acceder a estadísticas obtenidas de la participación en torneos realizados a través de la plataforma de TÓQUELA.
<br>13.	Crear torneos.
<br>14.	Admitir o rechazar EQUIPOS que se postulen a los torneo de los cuales sea administrador.
<br>15.	Publicar mensajes en el PERFIL del EQUIPO o en el del TORNEO.
<br>16.	Eliminar el CONTENIDO cargado, por él u otros USUARIOS, a su propio PERFIL de USUARIO o al del EQUIPO o TORNEO que administre.
<br>17.	Eliminar definitivamente los EQUIPOS y/o FOROS de los cuales sea el único administrador.
<br>18.	Eliminar definitivamente los TORNEOS de los cuales sea el único administrador, siempre que no se encuentren EQUIPOS inscritos.
<br>19.	Eliminar definitivamente su cuenta del sitio web.
<br>
<br>NOVENO - 	PROPIEDAD INTELECTUAL DE TÓQUELA: TÓQUELA se reserva todos sus derechos de propiedad intelectual.
<br>
<br>DÉCIMO - 	LICENCIA Y GARANTÍA DE TITULARIDAD DE LOS CONTENIDOS SUMINISTRADOS POR EL USUARIO: El USUARIO garantiza que todos los CONTENIDOS que carga al sitio web son de su propiedad o se encuentra autorizado por el titular de los mismos para cargarlos a la plataforma. Adicionalmente, otorga a TÓQUELA una licencia no exclusiva, irrevocable, a nivel mundial, perpetua, sujeta a cesión o sublicencia y gratuita para copiar, transformar, modificar, hacer obras derivadas, distribuir, publicar, comunicar públicamente, poner a disposición, eliminar, utilizar y comercializar, mediante todas las modalidades de explotación conocidas o por conocer, sobre dichos CONTENIDOS, sin requerir consentimiento adicional, notificación o compensación para el USUARIO o un tercero. En este sentido, el USUARIO asume cualquier responsabilidad sobre ese CONTENIDO.
<br>
<br>UNDÉCIMO - 	JURISDICCIÓN: Las cláusulas de este contrato se regirán e interpretaran conforme a la legislación colombiana.
<br>
<br>DUODÉCIMO - 	DURACIÓN: La relación jurídica existente entre TÓQUELA y el USUARIO inicia a partir del momento en que el USUARIO se registra a través de la creación de un PERFIL y se tendrá por terminada una vez el PERFIL del USUARIO sea suprimido.
<br>
<br>DECIMOTERCERO - 	TERMINACIÓN: El presente contrato podrá darse por terminado de manera unilateral por cualquiera de las partes mediante la eliminación del PERFIL del USUARIO.
<br>
<br>DECIMOCUARTO - 	MODIFICACIÓN: TÓQUELA se reserva el derecho unilateral de modificar el presente contrato.
<br>
<br>DECIMOQUINTO - 	CLÁUSULA COMPROMISORIA: Toda diferencia o controversia relativa a este contrato y a su ejecución se someterá a la decisión en Derecho de un solo árbitro que se sujetará al reglamento del Centro de Arbitraje y Conciliación de la Cámara de Comercio de Bogotá. El árbitro podrá ser designado por las partes de común acuerdo y si ello no fuera posible será designado por el Centro de Arbitraje y Conciliación de la Cámara de Comercio de Bogotá, a solicitud de cualquiera de las partes.
<br>
<br>DECIMOSEXTO - 	AVISO DE PRIVACIDAD: De conformidad con la Ley 1581 de 2012 “por la cual se dictan disposiciones generales para la protección de datos personales” y su Decreto Reglamentario 1377 de 2013, TÓQUELA mantiene estrictos procedimientos y políticas para la salvaguarda de los datos personales que hayan sido o sean recolectados en desarrollo de sus actividades.
<br>
<br>El USUARIO puede encontrar en todo momento la Política de Protección y Tratamiento de Datos Personales que se encuentra disponible para ser consultada en el sitio web www.toquela.com/habeasdata o en las oficinas de TÓQUELA ubicadas en la Calle 128B # 72 – 35 en la ciudad de Bogotá D.C.. 
<br>
<br>Los datos personales de los USUARIOS podrán ser incluidos en una base de datos y ser recolectados, almacenados, utilizados, compartidos y tratados de forma segura para las siguientes finalidades: 1) promover el derecho al deporte y la recreación; 2) mantener comunicación constante y efectiva con los USUARIOS, empleados, y cualquier otra persona, respecto de la cual TÓQUELA se encuentre estemos autorizada para efectuar el tratamiento de datos personales; 3) dar a conocer a los demás USUARIOS y proveedores de servicios las habilidades futbolísticas del titular de la información, tales como su posición, nivel, tipo de juego, experiencia, condición física y estatura; el calendario de eventos organizados dentro del sitio web www.toquela.com y en los cuales participe el USUARIO; y los datos de contacto para facilitar la organización de equipos y partidos; 4) calificar y/o permitir que los demás USUARIOS califiquen el nivel, puntualidad y juego limpio de cada USUARIO; 5) permitir la comunicación entre los USUARIOS; 6) gestionar eventos, equipos, partidos y torneos de fútbol; 7) promocionar y entregar productos y servicios por parte de TÓQUELA; 8) mantener un registro de los USUARIOS; 9) realizar eventos; 10) cumplir con las obligaciones que TÓQUELA tenga a su cargo en virtud del contrato de Términos Condiciones de Uso del sitio web www.toquela.com; y 11) cualquier otra finalidad que corresponda según el vínculo que se genere entre los titulares de los datos personales y la entidad.
<br>
<br>Con este aviso se da a conocer que los datos personales han sido y serán compartidos con terceros ubicados en Colombia y en el exterior con quienes se celebra un Contrato para la Transferencia y/o Trasmisión de Datos Personales, según corresponda, con el propósito de mantener la seguridad y protección de los datos de conformidad con las reglas y estándares aplicables.
<br>
<br>De conformidad con las normas citadas, los USUARIOS, en su calidad de titulares de datos personales, podrán ejercer los siguientes derechos: (i) Conocer, acceder, actualizar y rectificar sus datos personales; (ii) Solicitar prueba de la autorización otorgada; (iii) Ser informado respecto del uso que se ha dado a sus datos personales; (iv) Presentar ante las autoridades competentes quejas por infracciones a la Ley; (v) Revocar la autorización y/o solicitar la supresión del dato cuando en el Tratamiento no se respeten los principios, derechos y garantías constitucionales y legales.
<br>
<br>De acuerdo con el artículo 9º del Decreto 1377 de 2013, la solicitud de supresión de la información y la revocatoria de la autorización no procederán cuando el USUARIO tenga un deber legal o contractual de permanecer en la base de datos.
<br>
<br>Para los casos en que el USUARIO sea un menor de edad, su representante legal autoriza a TÓQUELA para que recolecte y almacene los datos personales de este último, atendiendo lo señalado por el artículo 12 del Decreto 1377 de 2013.
<br>
<br>En caso de querer presentar una solicitud o queja respecto del tratamiento de datos personales, EL usuario deberá hacer llegar una comunicación a nuestras oficinas ubicadas en la Calle 128B # 72 – 35 en la ciudad de Bogotá o a la dirección electrónica contactenos@toquela.com.
<br>
<br>DECIMOSÉPTIMO - 	AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES: El USUARIO manifiesta haber leído el aviso de privacidad obrante en la cláusula anterior y que ha tenido acceso a las políticas de protección de datos contenidas en el MANUAL DE POLÍTICAS PARA LA PROTECCIÓN Y TRATAMIENTO DE DATOS PERSONALES. En consecuencia otorga su autorización expresa para el tratamiento de sus datos personales o el de su representado, cuando el USUARIO sea menor de edad, dentro de las finalidades comunicadas en el aviso y en el manual de políticas mencionado.
<br>
<br>DECIMOCTAVO - 	COMUNICACIÓN Y NOTIFICACIÓN: Cualquier información que deba ser dada a conocer al USUARIO podrá llevarse a cabo a través de la publicación del comunicado en el sitio web www.toquela.com, por medio de un mensaje enviado al USUARIO a su PERFIL a través de la plataforma o por medio de correo electrónico a la dirección registrada por el USUARIO, a elección de TÓQUELA.
<br>
                        </p>
                        <br>
                    <div class="text-center">
                        <button type="button" class="btn btn_blue_light btn_aceptar">Aceptar</button>
                        <button type="button" class="btn btn_blue_light btn_cancelar">Cancelar</button>
                    </div>
                    </div-->
                </span>
                <div class="clear"><br></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clear section-novedades" style="display: none;">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 novedades-contend">
            
            <div class="clear separator_vertical" style="height: 30px;"><br></div>
            <div class="text-center text-gray-dark" id="title-novedades"><p>NOVEDADES</p></div>
            <br>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Liga de Fútbol de Bogotá.</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela1.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 1" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela1.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Torneo Relámpago de Fútbol 5, Inscripciones abiertas!</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela2.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 2" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela2.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="novedad-presentacion">
                    <div class="titunovedad"><p>Torneo Relámpago Fútbol 5.</p></div>
                    <div class="contend-imgnovedad">
                        <a class="previa" href="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela3.jpg" target="_blank">
                            <img class="img-responsive" alt="Novedad 3" src="<?php echo $_smarty_tpl->tpl_vars['_params']->value['site'];?>
/public/img/img_ejemplo/toquela3.jpg"/>
                        </a>
                    </div>
                </div>
                <br>
                <p><?php echo $_smarty_tpl->tpl_vars['utilnovedades']->value->getResumen('');?>
</p>
                <br>
                <div class="text-right">
                    <button type="button" class="btn btn_blue_light" style="width: 100px;">Ver mas</button>
                </div>
                <br>
            </div>
            <div class="clear"><br></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php }} ?>