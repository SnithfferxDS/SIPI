function objetoAjax(){
    var xmlhttp = false;
    try{
        xmlhttp =  new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){
            xmlhttp = false;
        }
    }
    if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
        xmlhttp =  new XMLHttpRequest();
    }
    return xmlhttp;
}

$(document).ready(function()
    {
        $('a.Casilleros').click(function()
        {
            $.ajax({ 
                url: 'sipimini/fido.php',
                data: {controlador: 'casilleros', metodo: 'index', datos:''},
                type: 'post',
                /* dataType: "html", */
                success: function(list) {
                                        /*
                                            var html='';
                                                html += "<h1>" + list['mensaje'] + "</h1>";
                                                html += "<h3>" + list['errores'] + "</h3>";
                                                html += "<hr>";
                                                html += "<table class='table'>";
                                                html +=     "<thead>";
                                                html +=         "<tr>";
                                                html +=             "<th>ID</th>"
                                                html +=             "<th>Nombre</th>";
                                                html +=             "<th>Direcci&oacuten;</th>";
                                                html +=             "<th>Descripci&oacuten;</th>";
                                                html +=             "<th>Contacto</th>";
                                                html +=             "<th>Estado</th>";
                                                html +=             "<th>Tel&eacute;fono</th>";
                                                html +=             "<th colspan='2';></th>";
                                                html +=         "</tr>";
                                                html +=     "</thead>";
                                                html +=     "<tbody>";
                                            if(list['registros'].length > 0)
                                            {
                                                html += "<tr> <td colspan='7'>"+ list['registros'][0] + "</td></tr>";
                                                se recorre el JSON con un for 
                                                Se recorren los registros
                                                
                                                arrayregistro = list['registros'].length;
                                                for( var i=0; i < arrayregistro; i++ )
                                                {
                                                    registro = list['registros'][i].length;
                                                
                                                html +=         "<tr>";
                                                for(var i in list['registros'])
                                                {
                                                    
                                                    console.log(list['registros'][i])
                                                    for(var j in list['registros'][i])
                                                    {
                                                        console.log(list['registros'][i][j])
                                                        html += "<td>" + list['registros'][i] + "</td>";
                                                
                                                
                                                 recorriendo cada registro 
                                                    for(var a=0; a < registro; a++)
                                                    {
                                                html +=             "<td>" + list['registros'][i][a] + "</td>";
                                                html +=             "<td>" + list['registros'][i]['nombre'] + "</td>";
                                                html +=             "<td>" + list['registros'][i]['direccion'] + "</td>";
                                                html +=             "<td>" + list['registros'][i]['descripcion'] + "</td>";
                                                html +=             "<td>" + list['registros'][i]['contacto'] + "</td>";
                                                html +=             "<td>" + list['registros'][i]['estado'] + "</td>";
                                                    }
                                                html +=             "<td class='bg-primary' style='text-align:center'><a href='#' class='editPoBox' style='color:#fff;'><i class='fa fa-eye'></i></a></td>";
                                                html +=             "<td class='bg-alert' style='text-align:center'><a href='#' class='coti_buy' style='#fff'><i class='fa fa-shopping-cart'></i></a></td>";                                                
                                                html +=         "</tr>";
                                            }
                                            if(list['registros'].length == 0){
                                                html += '<tr><td colspan="7" style="text-align:center;"> No hay datos para mostrar </td></tr>';
                                            }
                                                html +=     "</tbody>";
                                                html += "</table>";
                                            console.log(html);
                                        */
                                            $('#wrap-slider').html(list);
                                        }
                });
        });

        $('.seguimiento').click(function(){
            $.ajax({
                url: 'sipimini/fido.php',
                data: {controlador: 'tracker', metodo: 'index', datos:''},
                type: 'post',
                success: function(lista){
                    console.log(lista);
                }
            });
        });

        $('.orders').click(function(){
            $.ajax({
                url: 'sipimini/fido.php',
                data: {controlador: 'orders', metodo: 'index', datos:''},
                type: 'post',
                success: function(lista){
                    console.log(lista);
                }
            });
        });

        $('.comprar').click(function(){
            $.post("sipimini/controles/pigmak.Controller.php",function(compra){
                $("#wrap-slider").html(compra);
            });
        });
		
		$('a.Tiendas').click(function(){
			$.ajax({ 
				url: 'sipimini/fido.php',
				data: {controller: 'tiendas', method: 'index', data: ''},
				type: 'post',
				success: function(respuesta)
				{
					$("#wrap-slider").html(respuesta);
				}
			});
			//get_Response('tiendas');
		});
    });
/*
function MostrarConsulta(datos){
    divResultado = document.getElementById('resultado');
    ajax = objetoAjax();
    ajax.open("GET", datos);
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4){
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}

$(document).ready(function(){
    $.ajax({
        url:"../sipimini/Vistas/Prueba.View.php",
        data:"",
        dataType:"text",
        sucess: function(strData){
            $('#wrap-slider').txt(strData)
        }
    })
})
function modal_coti(){
    $('#modal').modal('show');
};

function imports_dropdowns()
{
    document.getElementById("dropdown_Components").classList.toggle("show");
}

window.onclick = function(event)
{
    if (!event.target.matches('.dropbtn'))
    {  
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}

$('.submenu').click(function(){
    $(this).children('.children').slideToggle();
});
*/
function crear_cotizacion()
{
    precio = document.quick_quote.precio.value;
    envio = document.quick_quote.shipping.value;
    taxes = document.quick_quote.taxes.value;
    cantidad = document.quick_quote.cantidad.value;
    categoria = document.quick_quote.categoria.value;
    tienda = document.quick_quote.tienda.value;
    pais = document.quick_quote.pais.value;
    peso = document.quick_quote.peso.value;
}

/*function muestraDatos( Datos )
                {
                    var html;
                    html = "<h1>" + Datos. + "</h1>";
                    html += "<table class='table'>";
                    html +=     "<thead>";
                    html +=         "<tr>";
                    html +=             "<th style='display:none;'>ID</th>"
                    html +=             "<th>Nombre</th>";
                    html +=             "<th>Direcci&oacuten;</th>";
                    html +=             "<th>Contacto</th>";
                    html +=             "<th>Estado</th>";
                    html +=             "<th colspan='2';></th>";
                    html +=         "</tr>";
                    html +=     "</thead>";
                    for( var contador=0; contador < Datos.length; contador++ )
                    {
                        html += "<tr>";
                        html += "<td style='display:none;'>" + Datos[contador].ID + "</td>";
                        html += "<td>" + Datos[contador].Nombre + "</td>";
                        html += "<td>" + Datos[contador].Direccion + "</td>";
                        html += "<td>" + Datos[contador].Contacto + "</td>";
                        html += "<td>" + Datos[contador].Estado + "</td>";
                        html += "<td class='bg-primary' style='text-align:center'><a href='#' class='editPoBox' style='color:#fff;'><i class='fa fa-eye'></i></a></td>";
                        html += "<td class='bg-alert' style='text-align:center'><a href='#' class='coti_buy' style='#fff'><i class='fa fa-shopping-cart'></i></a></td>";
                        html += "</tr>";
                    }
                    html += "</table>";
                    $("#wrap-slider").html( html );
                }*/
                /* {
                                            var html='';
                                            // si la consulta ajax devuelve datos
                                            if(list.length > 0){
                                            } 
                                            // si no hay datos mostramos mensaje de no encontraron registros
                                            if(html == '') html = '<tr><td colspan="6"></td></tr>'
                                            // añadimos  a nuestra tabla todos los datos encontrados mediante la funcion html
                                            $("#wrap-slider tbody").html(html);  
                                       } */
function get_Response(controller = '', method = 'index', data = '')
    {
        $.ajax({ 
            url: 'sipimini/fido.php',
            data: {controller: controlador, method: metodo, data: datos},
            type: 'post',
            success: function(respuesta)
            {
                $("#wrap-slider").html(respuesta);
            }
        });
    }