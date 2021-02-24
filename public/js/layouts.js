/// <reference path="../js/jquery.min.js"/>
$(document).ready(function () {
    var medidaVentanaMax = window.matchMedia("max-width:768px");
    var medidaVentanaMin = window.matchMedia("min-width:410px");
    if (medidaVentanaMax.matches || medidaVentanaMin.matches) {
        $("nav ul li:nth-child(1) a").innerHTML = "<span><i class='la la-home'></i></span>";
    }
});
