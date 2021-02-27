///<reference path="../js/jquery.min.js"/>
$(document).ready(function () {
});
function actualizarTarea(id) {
    $.ajax({
        url: "/actualizarTarea/" + id,
        method: "get",
        success: function (response) {
            $(".tarea" + response).removeClass("alert-warning");
            $(".tarea" + response).addClass("alert-success");
            $(".btn" + response).remove();
        }
    });
}
function borrarTarea(id) {
    $.ajax({
        url: "/borrarTarea/" + id,
        method: "get",
        success: function (response) {
            $(".borrarTarea" + response).remove();
        }
    });
}
