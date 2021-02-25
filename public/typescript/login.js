"use strict";
/// <reference path="../js/jquery.min.js"/>
$(document).ready(function () {
    validacionInicioSesion();
    validacionesRegistro();
});
function validacionesRegistro() {
    try {
        var contador = 0;
        focusout($("#name"), "^[a-z-A-Z\D]+$");
        focusout($("#surname"), "^[a-z-A-Z\D]+$");
        focusout($("#e-mail"), "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$");
        focusout($("#pass"), "^[A-z0-9]{6,}$");
        focusout($("#password-confirm"), "^[A-z0-9]{6,}$");
    }
    catch (Exception) {
        alert(Exception);
    }
}
function focusout(input, regex) {
    input.on("focusout", function () {
        var variable = $(this).attr("name");
        var inputReg = new RegExp(regex);
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).addClass('placeholderred');
            $("." + variable).css("display", "block");
            $("." + variable).text("No se pueden dejar campos vacios");
        }
        else {
            if (inputReg.test(String(input.val()))) {
                $(this).css("border", "1px solid grey");
                $(this).css("color", "grey");
                $(this).removeClass('placeholderred');
                $("." + variable).css("display", "none");
                if ($(this).attr("name") == $("#password-confirm").attr("name")) {
                    validarContrasena();
                }
            }
            else {
                $(this).css("border", "1px solid red");
                $(this).css("color", "red");
                $("." + variable).css("display", "block");
                $("." + variable).text("El/La " + variable + " no cumple con los parametros establecidos");
            }
        }
    });
}
function validarContrasena() {
    if ($("#password-confirm").val() != $("#pass").val()) {
        $(".password_confirmation").css("display", "block");
        $("#password-confirm").css("border", "1px solid red");
        $(".password_confirmation").text("La constraseña no coincide");
    }
    else {
        $(".password_confirmation").css("display", "none");
        $(".password_confirmation").css("border", "1px solid grey");
    }
}
function validacionInicioSesion() {
    try {
        var email_1 = $("#email");
        var contra_1 = $("#password");
        $("#tab-1 form").on("submit", function (e) {
            e.preventDefault();
            if (email_1.val() == "" || contra_1.val() == "") {
                $(".elogin").css("display", "block");
                $(".elogin").text("No se pueden dejar campos vacios");
                email_1.css("border", "1px solid red");
                contra_1.css("border", "1px solid red");
            }
            else {
                $(".errorLogin").css("display", "none");
                contra_1.css("border", "1px solid grey");
                email_1.css("border", "1px solid grey");
            }
        });
    }
    catch (Exception) {
    }
}
