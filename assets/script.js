/*let tiposDatos = {id:"number", nombre:"text"};
window.onload = function(){
    if(sessionStorage.getItem("opcionMarcada") === "nombre"){
        $('input[name=opcionBuscar]')[1].checked=true;
        $('#alumnoBuscar').attr("name",$('input[name=opcionBuscar]:checked').val());
        $('#alumnoBuscar').attr("placeholder",`Introduzca su ${$('input[name=opcionBuscar]:checked').val()}`);
        $('#alumnoBuscar').attr("type",tiposDatos.nombre);
    }else if(sessionStorage.getItem("opcionMarcada") === "id"){
        $('input[name=opcionBuscar]')[0].checked=true;
        $('#alumnoBuscar').attr("name",$('input[name=opcionBuscar]:checked').val());
        $('#alumnoBuscar').attr("placeholder",`Introduzca su ${$('input[name=opcionBuscar]:checked').val()}`);
        $('#alumnoBuscar').attr("type",tiposDatos.id);
    }else{
        $('input[name=opcionBuscar]')[1].checked=true;
        $('#alumnoBuscar').attr("name",$('input[name=opcionBuscar]:checked').val());
        $('#alumnoBuscar').attr("placeholder",`Introduzca su ${$('input[name=opcionBuscar]:checked').val()}`);
        $('#alumnoBuscar').attr("type",tiposDatos.nombre);
    }
}
$('input[name=opcionBuscar]').change(function(){
    sessionStorage.setItem("opcionMarcada",`${$(this).val()}`);
    console.log($(this).val());
    $('#alumnoBuscar').attr("name",$(this).val());
    $('#alumnoBuscar').attr("placeholder",`Introduzca su ${$(this).val()}`);
    $('#alumnoBuscar').attr("type",tiposDatos[$(this).val()]);
});*/