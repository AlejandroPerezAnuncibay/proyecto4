/// <reference path="../js/jquery.min.js"/>


import placeholder = require("lodash/fp/placeholder");

$(document).ready(function (){
    validacionInicioSesion();
    validacionesRegistro();

})

function validacionesRegistro(): void {
    try{
        let contador:number=0;

        focusout($("#name"),"^[a-z-A-Z\D]+$");
        focusout($("#surname"), "^[a-z-A-Z\D]+$");
        focusout($("#e-mail"), "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$");
        focusout($("#pass"), "^[A-z0-9]{6,}$");
        focusout($("#password-confirm"),"^[A-z0-9]{6,}$");

    }
    catch (Exception){
        alert(Exception);
    }
}

function focusout(input, regex):void{
      input.on("focusout", function () {
          let variable= $(this).attr("name")

          let inputReg: RegExp = new RegExp(regex);
        if ($(this).val() == "") {

            $(this).css("border", "1px solid red");
            $(this).addClass('placeholderred');
            $("."+variable).css("display","block")
            $("." + variable).text( "No se pueden dejar campos vacios");


        } else {

            if (inputReg.test(String(input.val()))) {

                $(this).css("border", "1px solid grey");
                $(this).css("color", "grey");

                $(this).removeClass('placeholderred');
                $("."+variable).css("display","none")

                if ($(this).attr("name")== $("#password-confirm").attr("name")){

                    validarContrasena();
                }


            } else {

                $(this).css("border", "1px solid red");
                $(this).css("color", "red");

                $("."+variable).css("display","block")
                $("." + variable).text( "El/La "+variable+" no cumple con los parametros establecidos");

            }
        }

    });
}

function validarContrasena(){
        if ($("#password-confirm").val()!= $("#pass").val()){
            $(".password_confirmation").css("display","block")
            $("#password-confirm").css("border","1px solid red")
            $(".password_confirmation").text("La constraseña no coincide");

        }
        else{
            $(".password_confirmation").css("display","none")
            $(".password_confirmation").css("border","1px solid grey")

        }

}

function validacionInicioSesion():void{

    try{
        let email= $("#email");
        let contra= $("#password");


        $("#tab-1 form").on("submit",function (e){
            if (email.val()== "" || contra.val() == ""){
                e.preventDefault();

                $(".elogin").css("display","block");
                $(".elogin").text("No se pueden dejar campos vacios");
                email.css("border","1px solid red");
                contra.css("border","1px solid red");

            }
            else{
                $(".errorLogin").css("display","none");
                contra.css("border","1px solid grey");
                email.css("border","1px solid grey");


            }

        })

    }
    catch (Exception){

    }


}


