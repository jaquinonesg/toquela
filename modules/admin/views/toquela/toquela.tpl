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
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Complejos </h2>

        <div id="cont-">
            <label class="label_">* Nombre del complejo</label>
            <input type="text"  id="name_complex" class="input_"/>
        </div>

        <div id="cont-">
            <label class="label_">* Descripción del complejo</label>
            <textarea id="description"></textarea>
        </div>

        <div id="cont-">
            <label class="label_">* Nombre del Administrador</label>
            <input type="text"  id="name_admin" class="input_"/>
        </div>

        <div id="cont-">
            <label class="label_">* Email del complejo</label>
            <input type="text"  id="email" class="input_"/>
        </div>

        <div id="cont-">
            <label class="label_">* Contraseña</label>
            <input type="password"  id="password" class="input_"/>
        </div>

        <div id="cont-">
            <label class="label_">* Télefono</label>
            <input type="text"  id="phone" class="input_"/>
        </div>

        <div id="cont-">
            <label class="label_">* Dirección</label>
            <input type="text"  id="address" class="input_"/>
        </div>

        <input type="button" class="Send_" id="create_complex" value="Crear Complejo"/>

    </div>

    <hr />

    {if isset($all_complex)}
        <table>
            <tr>
                <td>Nombre</td>
            </tr>
            {foreach from=$all_complex item=complex}
                <tr>
                    <td>{$complex->name}</td>
                    <td>
                        <button class="delete_complex" data-code="{$complex->codcomplex}">Eliminar</button>
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}


</div>
