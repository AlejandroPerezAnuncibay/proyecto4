/// <reference path="../js/jquery.min.js"/>
$(document).ready(function (){
})

function validarFecha(e){

        e.preventDefault();
        let fecha:string = $("#fechaVencimiento");
        console.log(fecha);


        if (fecha== null){

            $("#fecha").append("<small style='color: red'>No puedes de jar la fecha de vencimiento vacia</small>");
        }

}
