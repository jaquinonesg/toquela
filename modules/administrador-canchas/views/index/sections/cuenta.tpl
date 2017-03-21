{literal}
    <style>

        .Cont-Map {
            width:450px;
            height:200px;
            float:left;
            margin:10px;
        }

        .Muestra  {float:left; margin:5px; }


        #Listado-Calendario {
            width:1100px;
            float:left;	
        }

        ul#Listado-Dispo {
            width:100%;
            float:left;
            margin:10px 0 0 55px;
        }

        ul#Listado-Dispo li {
            width:105px;
            float:left;	
            background:#179b6a;
            padding:10px;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;	
        }	

        ul#Listado-Reser {
            width:100%;
            float:left;
            margin:10px 0 0 55px;
        }

        ul#Listado-Reser li {
            width:105px;
            float:left;	
            background:#dededc;
            padding:10px;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;	
        }	
        ul#Listado-Reser li a, ul#Listado-Dispo li a {	color:#fff;	text-decoration:none; }

        ul#Add-Data {
            width:890px;
            float:left;
            margin:10px 0 0 15px;
        }

        ul#Add-Data li {
            width:200px;
            float:left;
            margin:10px;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;	
        }

        #Data	{
            width:200px;
            float:left;
        }


        #Data .Orden {
            width:200px;
            float:left;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#000;		
        }



        #Data .Dia {
            width:200px;
            float:left;
            background:#084933;

            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;		
        }

        #Data .Hora {
            width:90px;
            float:left;
            margin:5px 0 0 10px;
            background:#084933;
            font-family:Arial, Helvetica, sans-serif;
            text-align:center;
            font-size:18px;
            color:#fff;
        }

        .complex_selected {
            background: #179b6a;
        }

    </style>
{/literal}


<div id="Cont-Mis-Canchas">
    <ul id="Menu-Abm">
        <li><a href="{$_params.site}/administrador-canchas/index/inicio/">INICIO</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/agenda/">AGENDA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/cancha/{$dtoadmin->codcomplex}" class="selectedAbm">INFORMACIÓN DE CANCHA</a></li>
        <li><a href="{$_params.site}/administrador-canchas/index/usuarios/">INFORMACIÓN DE USUARIO</a></li>                
        <li><a href="{$_params.site}/administrador-canchas/index/cuenta/">CUENTA</a></li>   
        <li><a href="{$_params.site}/administrador-canchas/login/logout/">SALIR</a></li>   
    </ul>
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Información de cancha </h2>

        <div id="cont-">
            <label class="label_">* Contraseña</label>
            <input type="password"  id="password1" class="input_"/>
        </div>
        <div id="cont-">
            <label class="label_">* Repita la contraseña</label>
            <input type="password"  id="password2" class="input_"/>
        </div>

        <input type="button" class="Send_" id="change_password" value="ACTUALIZAR" data-code="{$dtoadmin->codadministrator}"/>

    </div>


</div>
