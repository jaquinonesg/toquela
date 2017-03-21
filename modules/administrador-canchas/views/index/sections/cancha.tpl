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



<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<div id="Cont-Mis-Canchas">
    {include file = $_params.root|cat:"views/_templates/menu-canchas.tpl"}
    <div id="Cont-Infor">
        <h2 class="Titulo-Cont">Información de cancha </h2>

        <div id="cont-">
            <label class="label_">* Nombre del cancha</label>
            <input name="" type="text"  id="name" class="input_" value="{$dtoComplex->name}"/>
        </div>
        <div id="cont-">
            <label class="label_">* Dirección</label>
            <input name="" type="text"  id="address" class="input_" value="{$dtoComplex->address}"  />
        </div>
        <div id="cont-">
            <label class="label_">* Teléfono</label>
            <input name="" type="text"  id="phone" class="input_" value="{$dtoComplex->phone}"  />
        </div>
        <div id="cont-">
            <label class="label_">* E-Mail</label>
            <input name="" type="text"  id="email" class="input_" value="{$dtoComplex->email}"  />
        </div>
        <div id="cont-">
            <div 	class="Cont-Map">
                <label class="label_">Ubicación</label>
                <div id="map" data-lng="{$dtoComplex->lng}" data-lat="{$dtoComplex->lat}" style="width:100%;height: 100%;"></div>
            </div>
        </div>
        <div id="cont-">
            <label class="label_">* Descripción</label>
            <textarea name="" type="text"  id="description" class="input_" />{$dtoComplex->description}</textarea>
        </div>

        <div id="cont-" style="margin:0 0 0 55px;">
            <label class="label_">* Ingresa Imagen</label>
            <input name="" type="file"  id="img_complex" class="input_" value="" data-code="{$dtoComplex->codcomplex}" />

            {if isset($attachments)}
                {foreach from=$attachments item=attachment}
                    <div>

    <!--<img src="{$_params.site}/public{$attachment->path}" width="120" height="90" class="Muestra" />         -->       


                        <a class="previa" rel="gallery1" href="{$_params.site}/public{$attachment->path}">
                            <img alt="previa" src="{$_params.site}/public{$attachment->path}" width="135" height="100"  />
                        </a>




                        <div>
                            <button class="delete_img" data-complex="{$dtoComplex->codcomplex}" data-code="{$attachment->codattachment}">X</button>
                        </div>
                    </div>
                {/foreach}
            {/if}

        </div>

        <input name="" type="button" class="Send_" id="update" value="Actualizar" data-code="{$dtoComplex->codcomplex}"/>
        <a  href="{$_params.site}/administrador-canchas/index/subs/{$dtoComplex->codcomplex}">
            <input name="" type="button" class="Send_" value="Actualizar canchas"/>
        </a>

        <div style="float: left;margin-top: 130px;">
            {if isset($subs)}
                {foreach from=$subs item=sub}
                    <button class="sub_complex" data-complex="{$dtoComplex->codcomplex}" data-code="{$sub->codsubcomplex}">{$sub->name}</button>
                {/foreach}
            {/if}
        </div>

        {if isset($subs)}
            <ul id="Add-Data" style="margin: 70px 30px;">
                <li>
                    <label id="Data">
                        <div class="Orden">Disponibilidad</div>
                        <select type="text" class="Dia" id="disponibility" value="" data-code="{$first->codsubcomplex}">                  
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>                                
                            <option value="Miercoles">Miércoles</option>                                
                            <option value="Jueves">Jueves</option>                                
                            <option value="Viernes">Viernes</option>                                
                            <option value="Sabado">Sábado</option>                                
                            <option value="Domingo">Domingo</option>                           
                            <option value="Festivos">Festivos</option>                           
                        </select>
                    </label>             
                </li>
                <li>
                    <div id="Data">
                        <div class="Orden">Agregar horario</div>
                        <select name="" type="text" class="Hora" id="start">
                            {for $i=0 to 23}
                                <option value="{$i}:00">{$i}:00</option>
                            {/for}
                        </select>
                        <select class="Hora" id="end">
                            {for $i=0 to 23}
                                <option value="{$i}:00">{$i}:00</option>
                            {/for}
                        </select>
                    </div>
                </li>
                <li>
                    <label id="Data">
                        <div class="Orden">Precio</div>
                        <input type="text" id="precio"/>
                    </label>
                </li>
                <li>
                    <label id="Data">
                        <div class="Orden">Agregar</div>
                        <button id="add_schedule" data-sub="{$first->codsubcomplex}" data-complex="{$dtoComplex->codcomplex}">+</button>
                    </label>
                </li>
            </ul>

            <div id="Listado-Calendario">

                {include file=$_params.root|cat:"views/_templates/schedule.tpl"}

            </div>
        {else}
            <div>Para ingresar un horario es necesario crear una cancha para el complejo.</div>
        {/if}


    </div>


</div>